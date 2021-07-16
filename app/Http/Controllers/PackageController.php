<?php

namespace App\Http\Controllers;

use App\Callback;
use App\Package;
use App\Stk;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Prophecy\Call\Call;
use Safaricom\Mpesa\Mpesa;
use safaricom\Mpesa\TransactionCallbacks;
use Session;
use Auth;
use function MongoDB\BSON\toJSON;

class PackageController extends Controller
{


    /**
     * Get a validator for an incoming payment form request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => ['required', 'string', 'min:10', 'max:12'],
        ]);
    }
    public function sendRequest(Request $request)
    {
        $this->validator($request->all())->validate();

        $request->phone   = (substr($request->phone, 0, 1) == '+') ? str_replace('+', '', $request->phone) : $request->phone;
        $request->phone   = (substr($request->phone, 0, 1) == '0') ? preg_replace('/^0/', '254', $request->phone) : $request->phone;
        $ref = Str::random(9);
        $data['user_id'] = $request->user_id;
        $data['amount'] = $request->amount;
        $data['package'] = $request->package;
        $data['msisdn'] = $request->phone;
        $data['ref'] = $ref;

        $request->session()->put('PayInit', $data);

        $mpesa= new Mpesa();
        $stkPushSimulation = $mpesa->STKPushSimulation(env('MPESA_SHORT_CODE'), env('MPESA_PASSKEY'), env('MPESA_TRANSACTION_TYPE'),
            $data['amount'], $data['msisdn'], env('MPESA_SHORT_CODE'), $data['msisdn'], env('MPESA_CALLBACK_URL'), env('MPESA_ACCOUNT_REF'),$data['package'] ,
            "Recieved");

        $trimStkPushSimulation = json_decode($stkPushSimulation);

        $stkArrayResponse[] = (array)$trimStkPushSimulation;
        Log::info('stkResponse', $stkArrayResponse);

        $respCode = $trimStkPushSimulation->ResponseCode;

        if ($respCode == "0") {
            $request->session()->put('PayProcessing', $respCode);
            $stk = new Stk();
            $stk->ResponseCode = $trimStkPushSimulation->ResponseCode;
            $stk->MerchantRequestID = $trimStkPushSimulation->MerchantRequestID;
            $stk->CheckoutRequestID = $trimStkPushSimulation->CheckoutRequestID;
            $stk->ResponseDescription = $trimStkPushSimulation->ResponseDescription;
            $stk->CustomerMessage = $trimStkPushSimulation->CustomerMessage;
            $stk->user_id = Auth::user()->id;
            $stk->save();

            sleep(20);

            $phone = $request->phone;

            $callBack = Callback::latest('PhoneNumber',$phone )->first();

            $result = $callBack['ResultCode'];

            //save to subscription
            $sub['user_id'] = $request->user_id;
            $sub['amount'] = $request->amount;
            $sub['package_name'] = $request->package;
            $sub['msisdn'] = $request->phone;
            $sub['txn_ref'] = $ref;
            $time = Carbon::now();
            $mytime= $time->toDateTimeString();
            $sub['subscription_date'] = $mytime;
            $timeTo = Carbon::now()->addDays(30);
            $mytimeto= $timeTo->toDateTimeString();
            $sub['expire_date'] = $mytimeto;
            $sub['subscription_status'] = "Active";

            Subscription::create($sub);

            if($result == 1)
            {
                return redirect()->route('packages')->with('success','Check your Mpesa account and try again');
            }

            return redirect()->route('subscriptions')->with('success','Payment Recieved!');

        } elseif ($trimStkPushSimulation->errorCode == "500.001.1001") {
            Session::put('PayProcessingError', $stkPushSimulation->errorCode);
            $stk = new Stk();
            $stk->requestId = $trimStkPushSimulation->requestId;
            $stk->errorCode = $trimStkPushSimulation->errorCode;
            $stk->errorMessage = $trimStkPushSimulation->errorMessage;
            $stk->user_id = Auth::user()->id;
            $stk->save;
            return view('home');
        }
        return view('home');
    }

    public function callback(Request $request){
        Log::info("Received callback", $request->all());


        $callbackJSONData=file_get_contents('php://input');
        $callbackData=json_decode($callbackJSONData);
        $resultCode=$callbackData->Body->stkCallback->ResultCode;
        $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
        $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
        $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;

        $amount=$callbackData->Body->stkCallback->CallbackMetadata->Item[0]->Value;
        $mpesaReceiptNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
        //$balance=$callbackData->Body->stkCallback->CallbackMetadata->Item[2]->Value;
        $transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
        $phoneNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;

        $result=[
            "ResultDesc"=>$resultDesc,
            "ResultCode"=>$resultCode,
            "MerchantRequestID"=>$merchantRequestID,
            "CheckoutRequestID"=>$checkoutRequestID,
            "amount"=>$amount,
            "MpesaReceiptNumber"=>$mpesaReceiptNumber,
            "TransactionDate"=>$transactionDate,
            "PhoneNumber"=>$phoneNumber
        ];

        Callback::create($result);

        return true;


    }


}
