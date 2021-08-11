<?php

namespace App\Http\Controllers;

use App\Callback;
use App\Package;
use App\RequestCon;
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
use function PHPUnit\Framework\arrayHasKey;

class PackageController extends Controller
{


    /**
     * Get a validator for an incoming payment form request.
     *
     * @param array $data
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

        $request->phone = (substr($request->phone, 0, 1) == '+') ? str_replace('+', '', $request->phone) : $request->phone;
        $request->phone = (substr($request->phone, 0, 1) == '0') ? preg_replace('/^0/', '254', $request->phone) : $request->phone;
        $ref = Str::random(9);
        $data['user_id'] = $request->user_id;
        $data['amount'] = $request->amount;
        //$data['amount'] = 1000;
        $data['package'] = $request->package;
        $data['msisdn'] = $request->phone;
        $data['ref'] = $ref;

        $request->session()->put('PayInit', $data);

        $mpesa = new Mpesa();
        $stkPushSimulation = $mpesa->STKPushSimulation(env('MPESA_SHORT_CODE'), env('MPESA_PASSKEY'), env('MPESA_TRANSACTION_TYPE'),
            $data['amount'], $data['msisdn'], env('MPESA_SHORT_CODE'), $data['msisdn'], env('MPESA_CALLBACK_URL'), env('MPESA_ACCOUNT_REF'), $data['package'],
            "Recieved");

        $trimStkPushSimulation = json_decode($stkPushSimulation);

        $stkArrayResponse[] = (array)$trimStkPushSimulation;

        Log::info('stkResponse', $stkArrayResponse);


        if ($trimStkPushSimulation->ResponseCode == "0") {
            if ($trimStkPushSimulation->ResponseCode == "0") {

                $request->session()->put('PayProcessing', $trimStkPushSimulation->ResponseCode);
                $stk = new Stk();
                $stk->ResponseCode = $trimStkPushSimulation->ResponseCode;
                $stk->MerchantRequestID = $trimStkPushSimulation->MerchantRequestID;
                $stk->CheckoutRequestID = $trimStkPushSimulation->CheckoutRequestID;
                $stk->ResponseDescription = $trimStkPushSimulation->ResponseDescription;
                $stk->CustomerMessage = $trimStkPushSimulation->CustomerMessage;
                $stk->user_id = Auth::user()->id;
                $stk->save();
                Log::info("we are saving stk");

                $callBack = Callback::latest('PhoneNumber', $request->phone)->first();

                if ($callBack != null) {
                    $result = $callBack['ResultCode'];
                    $resultDesc = $callBack['ResultDesc'];

                    if ($result == 1 && $resultDesc == "The balance is insufficient for the transaction" || $callBack == null) {
                        return redirect()->route('packages')->with('error', 'The balance is insufficient for the transaction');
                    }
                }


                sleep(20);

                $phone = $request->phone;

                $callBack = Callback::latest('PhoneNumber', $phone)->first();

                $result = $callBack['ResultCode'];

                //save to subscription
                $sub['user_id'] = $request->user_id;
                $sub['amount'] = $request->amount;
                $sub['package_name'] = $request->package;
                $sub['msisdn'] = $request->phone;
                $sub['txn_ref'] = $ref;
                $time = Carbon::now();
                $mytime = $time->toDateTimeString();
                $sub['subscription_date'] = $mytime;
                $timeTo = Carbon::now()->addDays(30);
                $mytimeto = $timeTo->toDateTimeString();
                $sub['expire_date'] = $mytimeto;
                $sub['subscription_status'] = "Payed";

                $existingSub = Subscription::where('user_id', $sub['user_id'])->get();
                if ($existingSub->isEmpty()) {
                    $requestCon['amount'] = $request->amount;
                    $requestCon['phone'] = $request->phone;
                    $requestCon['username'] = auth()->user()->email;
                    $requestCon['package'] = $request->package;
                    $requestCon['status'] = "Pending Connection";
                    Log::info("new user create connection request");
                    RequestCon::create($requestCon);
                    Log::info("new user save subscription request");
                    Subscription::create($sub);
                    return redirect()->route('subscriptions')->with('success', 'Payment Received!');
                } else {
                    $subscription = Subscription::find($existingSub->id);
                    if ($subscription != null) {
                        $sub['subscription_status'] = "Deactivated";
                        $subscription->update($sub);
                    }

                    $sub['subscription_status'] = "Active";
                    Log::info("user has sub Deactivated old activate new");
                    Subscription::create($sub);
                    return redirect()->route('subscriptions')->with('success', 'Payment Received!');
                }

            }
        } elseif ($trimStkPushSimulation->errorCode == "500.001.1001") {
            if ($trimStkPushSimulation->errorCode == "500.001.1001") {
                Log::info('PayProcessingError', $trimStkPushSimulation);
                $stk = new Stk();
                $stk->requestId = $trimStkPushSimulation->requestId;
                $stk->errorCode = $trimStkPushSimulation->errorCode;
                $stk->errorMessage = $trimStkPushSimulation->errorMessage;
                $stk->user_id = Auth::user()->id;
                $stk->save;
                return redirect()->route('packages')->with('error', $trimStkPushSimulation->errorMessage);
            }
            //Session::put('PayProcessingError', $stkPushSimulation->errorCode);

            //return view('home');
        }
        return redirect()->route('packages');
    }


}
