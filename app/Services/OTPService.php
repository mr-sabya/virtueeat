<?php

namespace App\Services;

use Twilio\Rest\Client;

class OTPService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendOTP($to, $otp)
    {
        $message = "Your OTP code is: " . $otp;

        return $this->twilio->messages->create(
            $to,
            [
                'from' => env('TWILIO_PHONE'),
                'body' => $message
            ]
        );
    }
}
