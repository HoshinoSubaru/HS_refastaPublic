<?php

namespace App\Notifications;


class PushChatwork
{


    /**
     * Build the message.
     *
     * @return $this
     */
    static function Push($msg,$room='113228487',$token='nishitani')
    {
        //ラウンジ通知ルーム
        $room = "303816082";
        //誰から発行するか
        $nishitani = "7556891648b7dc215099992437aa6589";
        $token = $nishitani;
        exec('curl -X POST -H "X-ChatWorkToken:'.$token.'" -d "body='.$msg.'" "https://api.chatwork.com/v2/rooms/'.$room.'/messages" -O');
    }
}
