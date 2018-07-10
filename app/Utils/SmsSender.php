<?php

namespace App\Utils;

abstract class SmsSender
{
    public static function sendSMS($phone, $message)
    {
        return self::sendBulkSMS([$phone], $message);
    }

    public static function sendBulkSMS(array $recipients, $message)
    {
        $PROT = env('SMS_API_PROT');
        $HOST = env('SMS_API_HOST');
        $PORT = env('SMS_API_PORT');
        $PATH = env('SMS_API_PATH');
        $USERNAME = env('SMS_API_USER');
        $PASSWORD = env('SMS_API_PSWD');
        $SENDER_NAME = env('SMS_API_SENDER');
        $live_url = $PROT . "://" . $HOST;

        $live_url .= !is_null($PORT) ? ":" . $PORT : "";
        $live_url .= !is_null($PATH) ? "/" . trim($PATH, "/") : "";

        $params = [
            'username' => $USERNAME,
            'password' => $PASSWORD,
            'sender' => $SENDER_NAME,
            'recipient' => implode(',', $recipients),
            'message' => $message,
        ];

        $params = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $live_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($ch);
        curl_close($ch);

        $status = starts_with($result, 'OK');
        if (!$status) {
            report(new \Exception($result));
        }

        return $status;
    }
}