<?php

namespace App\Notifications;

class SendToGoogleChats
{
    public static function send($message)
    {
        $webhook_url = 'https://chat.googleapis.com/v1/spaces/AAQAVwxLXuU/messages?key=AIzaSyDdI0hCZtE6vySjMm-WEfRq3CPzqKqqsHI&token=s0b-8HQx_4n8NU0r_v28_zLvTq2D7HNGqiQ1VDNH9BA'; 

        $data = ['text' => $message];

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\n",
                'content' => json_encode($data),
            ]
        ];

        $context = stream_context_create($options);

        $maxRetries = 3;
        $retryDelay = 2; // 秒
    
        for ($i = 0; $i < $maxRetries; $i++) {
            $result = @file_get_contents($webhook_url, false, $context);
            if ($result !== FALSE) {
                error_log("送信成功: " . $result);
                return;
            }
            // 429対応のため、再試行まで待機
            sleep($retryDelay);
            $retryDelay *= 2; // 指数バックオフ
        }
    
        error_log("送信失敗（再試行後）");
    }
}


