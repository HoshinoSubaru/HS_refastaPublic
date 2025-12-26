<?php

namespace App\Chatwork;


class PushChatwork
{


    /**
     * Build the message.
     *
     * @return $this
     */
    public function Push($msg,$room='67058874',$token='nishitani')
    {


        //本番ルーム
        // $room = "";
        //テスト用個人ルーム
        // $room = "67058874";

        //誰から発行するか
        $sugisan = "4207431dc4eb42bb1e13befa2f6657fe";
        $bot = "ed472827b8dda0ba81ba586c8b0e4bd9";
        $nakashima = 'f13186f2995e8bfdfa4db6519ef61b11';
        $hosokawa = 'efb7916791697206e187ac8e35f4cb35';

        $nishitani = $bot;
        $tamiya = $bot;
        $takeuchi = '41312af426234bdcea206395a22eb3a8';

        $token = $$token;
        $msg = str_replace("&","＆",$msg);

        $c = system('curl -X POST -H "X-ChatWorkToken:'.$token.'" -d "body='.$msg.'" "https://api.chatwork.com/v2/rooms/'.$room.'/messages" -O',$c);


        if(!$c){
            return '送信失敗しました。';
        }else{
            return '送信成功！';
        }
    }
}
