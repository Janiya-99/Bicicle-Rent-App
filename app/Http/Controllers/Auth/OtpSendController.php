<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\OtpVerificationRequest;
use Illuminate\Support\Facades\Auth;

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

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $serverKey = 'AAAAeypmfso:APA91bE_G5v_1ua1165UpBrauhCBRUxQO-aPcXpOpLAhDhnggX6OU7ACoDRRwY6JNZbH6YQYs_FxAJL3FkD4FQZDYKkFeoHZXJGLUTzDe17uk3gwgVwmzWol1xOb11SIsov_TWrPXd3m'; // ADD SERVER KEY HERE PROVIDED BY FCM


        $otp = $this->otp->generate(Auth::user()->email,6,60);

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => "Your OTP is: " . $otp,
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
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
        dd($result);
    }


    public function verifyOtp(OtpVerificationRequest $request){
        $otp2 = $this->otp->validate($request->email, $request->otp);

        if(!$otp2->status){
            return response()->json([
                'error' => $otp2
            ], 401);
        }
        User::where('email', $request->email)->first();

        $sucsess['success'] = 'Email Verified Succesfully';
        return response()->json($sucsess,200);
    }

}
