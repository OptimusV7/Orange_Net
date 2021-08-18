<?php

namespace App\Http\Controllers;

use App\Callback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    public function callback(Request $request){
        Log::info("Received callback", $request->all());
        PackageController::logCallback($request->all());
        $callbackJSONData=file_get_contents('php://input');
        $callbackData=json_decode($callbackJSONData);
        $resultCode=$callbackData->Body->stkCallback->ResultCode;
        if ($resultCode == 1){
            $resultCode=$callbackData->Body->stkCallback->ResultCode;
            $resultDesc=$callbackData->Body->stkCallback->ResultDesc;
            $merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
            $checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;
            $result=[
                "ResultDesc"=>$resultDesc,
                "ResultCode"=>$resultCode,
                "MerchantRequestID"=>$merchantRequestID,
                "CheckoutRequestID"=>$checkoutRequestID,
            ];
            Callback::create($result);
            return redirect()->route('packages')->with('success','Please check your Mpesa Balance, then try again');


        }else{
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
        }


        return true;
    }

    public function sendBalance(){

    }

    public function callbackBalance(Request $request){
        Log::alert("Received balance callback", $request->all());
    }
}
