<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mail_magazine_cancel;

//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;

class Mail_magazine_cancelController extends Controller
{
    public function index(Request $request, $send_mail_id = "", $mailaddress = "")
    {
        return redirect("https://d.bmb.jp/bm/p/f/tf.php?id=bm62029px&task=cancel");
        
        $array = array();
        if (($send_mail_id === "") or ($mailaddress === "")) {
            $array["msg_type"] = "warning";
            $array["msg"] = "解除エラー。URLが正しくありません。";
            return view("mail_magazine_cancel.thanks", $array);
        }
        $array["send_mail_id"] = $send_mail_id;
        $array["mailaddress"] = $mailaddress;
        return view("mail_magazine_cancel.index", $array);
    }

    public function cancel(Request $request, $send_mail_id = "", $mailaddress = "") 
    {
        $array = array();
        $takuhai_line_cta = file_get_contents("https://rifa.life/refastaProject/get_wp_posts/35043?block_id=24679");
        $array["takuhai_line_cta"] = $takuhai_line_cta;

        $Mail_magazine_cancel = Mail_magazine_cancel::whereRaw("mailaddress = ? and send_mail_id = ?", array($mailaddress, $send_mail_id))->first();
        if($Mail_magazine_cancel != false){
            $array["msg_type"] = "success";
            $array["msg"] = "すでに解除申請されております。";
            return view("mail_magazine_cancel.thanks", $array);
        }

        $Mail_magazine_cancel = new Mail_magazine_cancel();
        $Mail_magazine_cancel->requested_at = date("Y-m-d H:i:s");
        $Mail_magazine_cancel->mailaddress = $mailaddress;
        $Mail_magazine_cancel->send_mail_id = $send_mail_id;
        $Mail_magazine_cancel->save();

        $input_values = new \stdClass();
        $input_values->mailaddress = $mailaddress;
        $to = $mailaddress;
        $title = '配信停止を受け付けました | リファスタ';
        $type = 'mail_magazine_cancel';
        $send_type = 'visitor';
        try {
            $mail_data = new PushMessage($input_values,$title,$type,$send_type);
        }catch (\Exception $e){
        }
        try {
            $res = Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type, "","","","noreply.rifa@urlounge.co.jp"));
        }catch (\Exception $e){
        }

        $array["msg_type"] = "success";
        $array["msg"] = "メルマガ解除申請が完了致しました。";
        $array["mailaddress"] = $mailaddress;
        return view("mail_magazine_cancel.thanks", $array);
    }

}
