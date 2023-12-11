<?php

namespace App\Services\OTP;

use App\Contracts\SendSms;

class Mimsms implements SendSms{
    public function send($to, $from, $text, $template_id)
    {
        $url = env('MIM_BASE_URL') . "/smsapi";
        $data = [
            "api_key" => env('MIM_API_KEY'),
            "type" => "text",
            "contacts" => $to,
            "senderid" => env('MIM_SENDER_ID'),
            "msg" => $text,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}