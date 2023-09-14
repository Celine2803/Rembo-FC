<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    // password
    public function lipaNaMpesaPassword()
    {
        $timestamp = Carbon::now()->format('YmdHms');
        $passKey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $businessShortCOde =174379;
        $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

        return $mpesaPassword;
        
    }

    public function newAccessToken()
    {
        $consumer_key="D1AfrzO2BMsrnkcLGiYuDwRFABMK280t";
        $consumer_secret="3gu3dXGNisflswSC";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);
        return $access_token->access_token;  
        
    }

    public function stkPush(Request $request)
    {  
      
            $user = $request->user;
            $amount = $request->amount;
            $phone =  $request->phone_number;
            $formatedPhone = substr($phone, 1);
            $code = "254";
            $phoneNumber = $code.$formatedPhone;
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl_post_data = [
            'BusinessShortCode' =>174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::now()->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' =>  $amount,
            'PartyA' =>  $phoneNumber, 
            'PartyB' => 174379,
            'PhoneNumber' =>  $phoneNumber, 
            'CallBackURL' => 'https://mydomain.com/path',
            'AccountReference' => "RFC",
            'TransactionDesc' => "Pay player"
        ];


        $data_string = json_encode($curl_post_data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->newAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        
        return $curl_response;
    }
}
