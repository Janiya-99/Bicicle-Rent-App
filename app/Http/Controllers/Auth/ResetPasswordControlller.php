<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\PasswordResetRequest;

class ResetPasswordControlller extends Controller
{
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function passwordForget(ForgetPasswordRequest $request)
    {
        $input = $request->only('email');
        $user = User::where('email', $input)->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        $url = 'https://fcm.googleapis.com/fcm/send';

        //$userId = Auth::user()->user_id;

        $FcmToken = $user->device_token;

        $otp = $this->otp->generate($user->email, 4, 60);


        $data = [
            "to" => $FcmToken,
            "notification" => [
                "body" => serialize($otp) . "The following OTP will be expired within 60 seconds",
                "title" => "Bicycle Sharing System Password Reset",
                "subtitle" => "Password Reset Progress",
            ]
        ];

        $encodedData = json_encode($data);
        $fireBaseServerKey = 'AAAAPmviOvc:APA91bF6Yj4f5w8MZQOgMBjbpRIxMO0h01IgluyHt-VjHneOlbjq70b0yL3JUk_lW4D-J5iBDula26El93F6W5iDmCpS61uqjBw0dZhePJkqLCt5sz7hc5hLjAPFwYOvfnLkWCaT_1YQ';


        $headers = [
            'Authorization:key=' . $fireBaseServerKey,
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
            $data,
            $otp
        ]);
    }

    public function passwordReset(PasswordResetRequest $request)
    {

        $otp2 = $this->otp->validate($request->email, $request->otp);

        if (!$otp2->status) {
            return response()->json([
                'error' => $otp2
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Password Reset Successfully'
        ], 200);
    }
}
