<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Rules\SimpleMail;
use App\Chatwork\PushChatwork;
use App\Mail\PushMessage;


class shopFrontBackendController extends Controller
{
    public function dummy(){

    }



    /**
     * 入力内容確認画面
     */
    public function check_contents_display(Request $request)
    {
        $shop_front_id = $_GET["shop_front_id"];
        $shop_front_detail = DB::table("internet_test.shop_front_details")->where("shop_front_id", array($shop_front_id))->first();
        $array = array();
        $array['shop_front_detail'] = $shop_front_detail;

        if($shop_front_detail == false){
            echo "該当データなし";
        }else{
            return view("shopFrontBackend.check", $array);
        }
    }

    /**
     * 入力内容確認画面でのPOST送信
     */
    public function check_contents()
    {

    }

    /**
     * 一覧画面
     */
    public function list_display()
    {
        $shop_front_id = "0";
        $shop_front_lists = DB::table("shop_front_details")->orderBy("shop_front_id", "desc")->get();
        $array = array();
        $array['shop_front_lists'] = $shop_front_lists;
        return view("shopFrontBackend.list", $array);
    }

    /**
     * メール送信
     */
    public function send_mail(Request $request)
    {
        $domain = "";
        $referer = "";
        $files_path = "";
        $angouka_mailaddress = "";

        // ******************************重複送信の防止*************************
        $request->session()->regenerateToken();
        $errorArray=array();
        $pathArray=array();
        $parent_file_array = array();
        $count = 0;
        $file_all_array=array();

        // ************OK→メールの送信***********
        // 店側
        $input_values= $request;
        $files_path = $pathArray;
        $to = 'rifa@urlounge.co.jp';
        $title = '【お問合せ通知】'.$domain;
        $type = 'info';
        $send_type = 'shop';
        $reply_email = $request->mail;
        Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type,$referer, $files_path, $angouka_mailaddress, $reply_email));
        // Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type,$referer, $files_path,$angouka_mailaddress));

        // お客様用
        $input_values = $request;
        $files_path = $pathArray;
        $to = $request->mail;
        $title = 'リファスタです【お問合せ完了通知】';
        $type = 'info';
        $send_type = 'visitor';
        Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type,$referer, $files_path,$angouka_mailaddress));

    }

    /**
     * チャットワーク送信
     */
    public function send_chatwork(Request $request)
    {
        // ******************************重複送信の防止*************************
        $request->session()->regenerateToken();
        $errorArray=array();
        $pathArray=array();
        $parent_file_array = array();
        $count = 0;
        $file_all_array=array();

        //*************チャットワークの送信********
        //$file_array=array();
        //$pathArray[]=$file_array['path']."\n";
        $stamp = "";
        $cv_device = "";
        $domain = "";

        $chat_txt = '●お問い合わせ内容：'."\n";
        $chat_txt .= $request->input('text')."\n";
        $chat_txt .= '●画像：'."\n";
        $chat_txt .= implode("",$pathArray);
        $chat_txt .= "---------------------------------------------------------"."\n";
        $chat_txt .= '【REMOTE_ADDR】'.$request->ip()."\n";
        $chat_txt .= '【USER_AGENT】'.$request->header('User-Agent')."\n";
        $chat_txt .= '';
        $chat_text_body = "{$stamp}お問い合わせフォーム-{$cv_device} 【{$domain}】"."\n";
        $chat_text_body .= $chat_txt."\n";
        $chat_text_body .= "";
        $cw = new PushChatwork;
        $msg = $chat_text_body;
        $room='265915716';
        $token='takeuchi';
        $cw->Push($msg,$room,$token);
        exit();
        return redirect("shop_front/send_chatwork");

    }

    /**
     * 店頭入力結果のPDFを作成
     */
    public function make_pdf()
    {
        $shop_front_id = $_GET["shop_front_id"];
        $shop_front_detail = DB::table("internet_test.shop_front_details")->where("shop_front_id", array($shop_front_id))->first();
        $array = array();
        $array['shop_front_detail'] = $shop_front_detail;

        if($shop_front_detail == false){
            echo "該当データなし";
        }else{
            return view("shopFrontBackend.pdf_customer", $array);
        }

        $array = array();
        $page_1 = view('shopFrontBackend.pdf_customer', $array)->render();
        $page_2 = view('shopFrontBackend.pdf_products_detail', $array)->render();
        $page_3 = view('shopFrontBackend.pdf_image', $array)->render();

        $html = $page_1 . $page_2 . $page_3;
        //return $html;
        return view("shopFrontBackend.pdf_customer");



        $setPager = ""; // 用紙サイズ
        $margin_top = ""; // 上マージン
        $margin_bottom = ""; // 下マージン
        $margin_left = ""; // 左マージン
        $margin_right = ""; // 右マージン
        $orientation = "Portrait"; // 横向き
        $header_font_size = ""; // ヘッダーフォントサイズ
        $footer_font_size = ""; // フッターフォントサイズ


        $pdf = \PDF::loadHTML($html)
            ->setPaper($setPager ?: 'A4')// 用紙サイズ
            ->setOption('encoding', 'utf-8')// Encoding
            ->setOption('margin-top', $margin_top ?: 10)// 上マージン
            ->setOption('margin-bottom', $margin_bottom ?: 10)// 下マージン
            ->setOption('margin-left', $margin_left ?: 10)// 左マージン
            ->setOption('margin-right', $margin_right ?: 10)// 右マージン
            ->setOption('orientation', $orientation ?: 'Landscape')// 横向き
            ->setOption('header-font-size', $header_font_size ?: 16)// ヘッダーフォントサイズ
            ->setOption('footer-font-size', $footer_font_size ?: 12);// フッターフォントサイズ
//            ->setOption('footer-html', \View::make('many_satei.print_footer')->render());
        $fileName = date("YmdHis") . '.pdf';
        $res = $pdf->inline($fileName);
        return $res;



    }





}