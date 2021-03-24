<?php

namespace App\Http\Controllers;

use App\Stk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Safaricom\Mpesa\Mpesa;
use Session;
use Auth;

class PackageController extends Controller
{
    public function buy_packages(Request $request)
    {
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

            return view('payments');

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
        $res=Session::put('response', $request->all());
        Log::info("Received callback", $request->all());
        $responseData = $request->all();
        var_dump($responseData);
        exit();
        return view('payments');

    }
}
