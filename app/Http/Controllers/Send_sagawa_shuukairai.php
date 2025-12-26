<?php
namespace App\Http\Controllers;



trait Send_sagawa_shuukairai
{
    /**
     * 佐川集荷依頼のrefaAPIへ必要情報を投げる。
     * 集荷の成功・失敗に関わらず進ませる。
     */
    public function send_sagawa_shuukairai(
        $user_todou = "",
        $user_sikutyouson = "",
        $user_banti_only = "",
        $user_building = "",
        $user_name_kana = "",
        $user_yuubinn = "",
        $user_tel = "",
        $user_mail = "",
        $speed_box = "",
        $date_and_time_hidden = ""
    )
    {

        $postdata["iraiAdd1"] = $user_todou . $user_sikutyouson; // 25文字まで
        $postdata["iraiAdd2"] = $user_banti_only;// 25文字まで
        $postdata["iraiAdd3"] = $user_building;// 25文字まで



        // $user_name,$user_name_kana,
        $postdata["iraiNm1"] = $user_name_kana;
        $postdata["iraiYubin"] = $user_yuubinn;
        $postdata["iraiTel"] = $user_tel;
        $postdata["iraiMailAddress"] = $user_mail;
        $postdata["haisoKosu"] = $speed_box;

        // ex: 9/1(水) 12～14時
        $date_time_array = explode("(", $date_and_time_hidden);
        if(count($date_time_array) > 0){
            $date = $date_time_array[0];
            $date_array = explode("/", $date);
            if (count($date_time_array) > 0) {
                if(date("n") > $date_array[0]){
                    // 指定月が今より小さい場合は、年越しを意味する。
                    $year = date("Y") + 1;
                }else{
                    $year = date("Y");
                }
                $month = sprintf("%02d", $date_array[0]);
                $day = sprintf("%02d", $date_array[1]);
                $shukaIraiShiteiDate = "{$year}{$month}{$day}";// 集荷に伺う日付 yyyymmdd
            }else{
                $shukaIraiShiteiDate = "";// 指定なし
            }
        }else{
            $shukaIraiShiteiDate = "";// 指定なし
        }
        $postdata["shukaIraiShiteiDate"] = $shukaIraiShiteiDate;

        // ex: 9/1(水) 12～14時
        // 時間のところのみ取得する
        $date_time_array = explode(") ", $date_and_time_hidden);
        if(count($date_time_array) > 0){
            $shuuka_time = $date_time_array[1];
            if ($shuuka_time == "9～12時") {
                $shukaIraiShiteiTimeCode = "09";
            } elseif ($shuuka_time == "12～15時") {
                $shukaIraiShiteiTimeCode = "12";
            } elseif ($shuuka_time == "15～18時") {
                $shukaIraiShiteiTimeCode = "15";
            }elseif ($shuuka_time == "18～21時") {
                $shukaIraiShiteiTimeCode = "18";
            } else {
                $shukaIraiShiteiTimeCode = "00";
            }
        }else{
            $shukaIraiShiteiTimeCode = "00";// 集荷に伺う時間帯。指定しない場合「00」
        }
        $postdata["shukaIraiShiteiTimeCode"] = $shukaIraiShiteiTimeCode;

        $url = 'https://rifa.life/refastaProject/sagawa/shuukairai/';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, TRUE);                            //POSTで送信
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));    //データをセット
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);                    //受け取ったデータを変数に
        try {
            curl_exec($ch);
        } catch (\Throwable $th) {
            //throw $th;
        }


    }

}