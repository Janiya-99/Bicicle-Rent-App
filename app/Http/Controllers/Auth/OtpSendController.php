<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OtpVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Mockery\Expectation;
use Illuminate\Support\Str;

class OtpSendController extends Controller
{
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function updateDeviceToken(Request $request)
    {
        Auth::user()->device_token =  $request->token;

        Auth::user()->save();

        return response()->json(['Token successfully stored.'], 200);
    }

    public function sendNotification(Request $request)
    {
       try{

        Auth::user()->device_token =  $request->token;
        Auth::user()->save();

        $url = 'https://fcm.googleapis.com/fcm/send';

        $userId = Auth::user()->user_id;

        $FcmToken = User::where('user_id',$userId)->value('device_token');

        $otp = $this->otp->generate(Auth::user()->email,4,60);


        $data = [
            "to" => $FcmToken,
            "notification" => [
                "body" => serialize($otp)."The following OTP will be expired within 60 seconds" ,
                "title" => "Bicycle Sharing System Registration",
                "subtitle" => "Authentication Confirmation Progress",
            ]
        ];

        $encodedData = json_encode($data);
        $fireBaseServerKey = 'AAAAPmviOvc:APA91bF6Yj4f5w8MZQOgMBjbpRIxMO0h01IgluyHt-VjHneOlbjq70b0yL3JUk_lW4D-J5iBDula26El93F6W5iDmCpS61uqjBw0dZhePJkqLCt5sz7hc5hLjAPFwYOvfnLkWCaT_1YQ';


        $headers = [
            'Authorization:key='.$fireBaseServerKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response

        return response()->json([
           'notification' => $data,
            'otp data' => $otp
        ]);

       }catch( \Exception $e ){return $e->getMessage();}
    }


    public function verifyOtp(OtpVerificationRequest $request){
        $otp2 = $this->otp->validate($request->email, $request->otp);

        if(!$otp2->status){
            return response()->json([
                'error' => $otp2
            ], 401);
        }
        User::where('email', $request->email)->first();
        $userId =  Auth::user()->user_id;

        return response()->json([
            'userId' => $userId,
            'success' => 'Account Succesfully Registered'
        ],200);
    }
}
