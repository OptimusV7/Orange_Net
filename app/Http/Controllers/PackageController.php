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

//        dd($trimStkPushSimulation->ResponseCode);
//        exit();

        $respCode = $trimStkPushSimulation->ResponseCode;

            if ($respCode == "0") {
                $stk = new Stk();
                $stk->ResponseCode = $trimStkPushSimulation->ResponseCode;
                $stk->MerchantRequestID = $trimStkPushSimulation->MerchantRequestID;
                $stk->CheckoutRequestID = $trimStkPushSimulation->CheckoutRequestID;
                $stk->ResponseDescription = $trimStkPushSimulation->ResponseDescription;
                $stk->CustomerMessage = $trimStkPushSimulation->CustomerMessage;
                $stk->user_id = Auth::user()->id;
                $stk->save(); 

                $request->session()->put('PayProcessing', $trimStkPushSimulation);

                return view('packages');

            } elseif ($trimStkPushSimulation->errorCode == "500.001.1001") {
                $stk = new Stk();
                $stk->requestId = $trimStkPushSimulation->requestId;
                $stk->errorCode = $trimStkPushSimulation->errorCode;
                $stk->errorMessage = $trimStkPushSimulation->errorMessage;
                $stk->user_id = Auth::user()->id;
                $stk->save;

                //toastr()->success('Unable to lock subscriber, a transaction is already in process for the current subscriber');
                $request->session()->put('PayProcessingError', $stkPushSimulation);
                return view('home');
            }



        return view('home');
    }

    public function callback(Request $request){

        Log::info("Received callback", $request->all());
        $responseData = $request->all();
        $responseObject = json_decode($responseData);
        $request->session()->put('response', $request->all());
        //dd($request->all());
        //
    }
}
