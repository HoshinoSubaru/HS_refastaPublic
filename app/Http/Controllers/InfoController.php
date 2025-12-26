<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Rules\SimpleMail;
use App\Chatwork\PushChatwork;
use App\Notifications\SendToGoogleChats;
//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;
use Illuminate\Support\Facades\Log;
use SplFileInfo;


use App\Models\MstToiawase;
use App\Models\Toiawase;
use App\Models\Info;

use Symfony\Component\VarDumper\VarDumper;

use Illuminate\Support\Facades\Crypt;

class InfoController extends Controller
{
    public function index()
    {

        $context = stream_context_create([
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false
            ]
        ]);
        //ご利用規約のインポート
        $kiyaku_url = "https://kinkaimasu.jp/kiyaku_text/kiyaku_for_rifa.php";
        $kiyaku_html = file_get_contents($kiyaku_url, false, $context);
        // プライバシーポリシーのインポート
        $pp_url = "https://urlounge.co.jp/policy_notice/policy_notice.php";
        $pp_html = file_get_contents($pp_url, false, $context);

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        // mst_toiawase_detail tableからテンプレートを取得して配列に追加
        $templates = array();
        $mst_table = MstToiawase::get();
        foreach ($mst_table as $item ) {
            $templates[] = $item->template;
        }
        $MstToiawase =MstToiawase::orderBy('sort')->get();
        // data配列に上記３つのデータを追加して、index.blade.phpに渡す
        $view_file ='info.index';
        $data = array();
        $data["kiyaku_html"]=$kiyaku_html;
        $data["pp_html"]=$pp_html;
        $data["templates"]=$templates;
        $data['MstToiawase']= $MstToiawase;
        $data['kaigai_html'] = "";
        return view($view_file, $data);
    }

    public function submit(Request $request)
    {

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (isset($_SERVER["REMOTE_ADDR"])) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } else {
            $ip = "1.1.1.1"; // dummy
        }
        $ip = str_replace(' ', '', $ip);

         // Honeypot field check：入力されてたら処理中止：ロボット対策
        if ($request->filled('hp_field')) {
            return redirect('/info');
        }

        $kaigai_url = "https://rifa.life/refastaProject/kaigaiiphanbetsu/{$ip}";
        $kaigai_html = file_get_contents($kaigai_url);
        Log::info("IPチェック: $ip / レスポンス: $kaigai_html");
        
        // if(
        //     ($kaigai_html !== "")
        //     &&
        //     ($kaigai_html !== "JP")
        // ){
        //     return redirect("/404/");
        // }
        // 海外IPなら404ページにリダイレクトし、チャット通知を送信
        if (($kaigai_html !== "") && ($kaigai_html !== "JP")) {
            // チャット通知内容
            $msg = "[info][title]海外IPアクセス[/title]{$ip}\n国コード「{$kaigai_html}」\n▼詳細▼\n[code]{$kaigai_html}[/code][/info]";

            // チャットワークへ送信
            SendToGoogleChats::send($msg);

            // 404ページにリダイレクト
            return redirect("/404/");
        }

        // var_dump($kaigai_html);
  

        // ******************************重複送信の防止*************************
        $request->session()->regenerateToken();
        $errorArray=array();
        $pathArray=array();
        $parent_file_array = array();
        $count = 0;
        $file_all_array=array();

        // *******************************入力内容チェック*****************************************
        $rules = [
            // ********メールアドレス形式チェック********
            'mail' => ['required' , new SimpleMail],
            'text' => 'required',
            'kiyaku_check' => 'required',
        ];

        $messages = [
            'mail.required' => 'メールアドレスを入力してください',
            'text.required' => 'お問い合わせ内容を入力してください',
            'kiyaku_check.required' => '同意されていません',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        //まとめる
        if ($validator->fails()) {
            return redirect('/info')
            ->withErrors($validator)
            ->withInput();
        }
        // *******************************ファイル中身チェック*******************************
        $fileNum = 0;
        $user_agent = $request->header('User-Agent');
        if ((strpos($user_agent, 'iPhone') !== false) || ((strpos($user_agent, 'Android') !== false) && (strpos($user_agent, 'Mobile') !== false))
        || (strpos($user_agent, 'Windows Phone') !== false)
        || (strpos($user_agent, 'BlackBerry') !== false) || (strpos($user_agent, 'BB10') !== false) || (strpos($user_agent, 'Passport') !== false)) {
        $cv_device = 'SP';
        }else{
        $cv_device = 'PC';
        }

        $cv_site = "";
        if(isset($_SERVER["HTTP_X_FORWARDED_HOST"])){
        $cv_site = $_SERVER["HTTP_X_FORWARDED_HOST"];
        }

        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;

        $angouka_mailaddress = md5(htmlspecialchars($request->mail));
        $angouka_mailaddress = substr($angouka_mailaddress, 0, 8);

        if(preg_match("/brand/",$cv_site)){
            $stamp = "(beer)";
            $domain = 'brakai';
            $kaitori_url = 'https://brandkaimasu.com/info';
            }elseif(preg_match("/diakai/",$cv_site)){
            $stamp = "(devil)";
            $domain = 'diakai';
            $kaitori_url = 'https://diakaimasu.jp/info';
            }elseif(preg_match("/kinkai/",$cv_site)){
            $stamp = "(F)";
            $domain = 'kinkai';
            $kaitori_url = 'https://kinkaimasu.jp/info';
            }else{
            $stamp = "〇";
            $domain = 'rifa.life';
            $kaitori_url = 'http://rifa.life/refasta_public';
            }

        foreach ($_FILES as $item) {
            $fileNum++;
            $info = new SplFileInfo($item['tmp_name']);
            // *************エラー時の処理**************
            if($item['error']!="0"){
                // UPLOAD_ERR_OK
                // 値: 0; エラーはなく、ファイルアップロードは成功しています。
                // UPLOAD_ERR_INI_SIZE
                // 値: 1; アップロードされたファイルは、php.ini の upload_max_filesize ディレクティブの値を超えています。
                // UPLOAD_ERR_FORM_SIZE
                // 値: 2; アップロードされたファイルは、HTML フォームで指定された MAX_FILE_SIZE を超えています。
                // UPLOAD_ERR_PARTIAL
                // 値: 3; アップロードされたファイルは一部のみしかアップロードされていません。
                // UPLOAD_ERR_NO_FILE
                // 値: 4; ファイルはアップロードされませんでした。
                // UPLOAD_ERR_NO_TMP_DIR
                // 値: 6; テンポラリフォルダがありません。PHP 5.0.3 で導入されました。
                // UPLOAD_ERR_CANT_WRITE
                // 値: 7; ディスクへの書き込みに失敗しました。PHP 5.1.0 で導入されました。
                // UPLOAD_ERR_EXTENSION
                // 値: 8; PHP の拡張モジュールがファイルのアップロードを中止しました。 どの拡張モジュールがファイルアップロードを中止させたのかを突き止めることはできません。 読み込まれている拡張モジュールの一覧を phpinfo() で取得すれば参考になるでしょう。 PHP 5.2.0 で導入されました。
                switch ($item['error']) {
                case '1':
                    $dev_msg = "ファイルサイズが大きいためアップロード出来ませんでした。";
                    break;
                case '2':
                    $dev_msg = "アップロードされたファイルは、HTML フォームで指定された容量を超えています。";
                    break;
                case '3':
                    $dev_msg = "アップロードされたファイルは一部のみしかアップロードされていません。";
                    break;
                case '4':
                    $dev_msg = "ファイルはアップロードされませんでした。";
                    break;
                case '6':
                    $dev_msg = "テンポラリフォルダがありません。";
                    break;
                case '7':
                    $dev_msg = "ディスクへの書き込みに失敗しました。";
                    break;
                case '8':
                    $dev_msg = "ファイルのアップロードを中止しました。";
                    break;
                default:
                    $dev_msg = "";
                    break;
                }

                // ***********not solved yet*****************
                //ゼロバイトの場合、ファイルを選択していない状態と仮定し、エラーログだけ出して、ユーザ側には何も表示しない
                if($item["size"] == 0){
                //nameがあった場合は、meta情報だけ成功したと仮定し、ゼロバイトアップされたと仮定。
                    if($item["name"] != ''){

                    }else{
                        //nameもない場合は単純に選択していないものと仮定する。
                        continue;
                    }
                }
                $errorArray['up_img'.$fileNum ] = '↓'.$dev_msg;
                $count ++;
            }// end if error

            $jsonfiles_data = json_encode($item);
            $jsonfiles = "{\n";
            $jsonfiles .= "\"_FILES\":\n".$jsonfiles_data."\n";
            if($info != false){
                $file_info = ", \"SplFileInfo\":\n{\n";
                $file_info .= '"getATime": "'.$info->getATime()."\"\n";
                $file_info .= ', "getBasename": "'.$info->getBasename()."\"\n";
                $file_info .= ', "getCTime": "'.$info->getCTime()."\"\n";
                $file_info .= ', "getExtension": "'.$info->getExtension()."\"\n";
                $file_info .= ', "getFileInfo": "'.$info->getFileInfo()."\"\n";
                $file_info .= ', "getFilename": "'.$info->getFilename()."\"\n";
                $file_info .= ', "getGroup": "'.$info->getGroup()."\"\n";
                $file_info .= ', "getInode": "'.$info->getInode()."\"\n";
                $file_info .= ', "getMTime": "'.$info->getMTime()."\"\n";
                $file_info .= ', "getOwner": "'.$info->getOwner()."\"\n";
                $file_info .= ', "getPath": "'.$info->getPath()."\"\n";
                $file_info .= ', "getPathInfo": "'.$info->getPathInfo()."\"\n";
                $file_info .= ', "getPathname": "'.$info->getPathname()."\"\n";
                $file_info .= ', "getPerms": "'.$info->getPerms()."\"\n";
                $file_info .= ', "getRealPath": "'.$info->getRealPath()."\"\n";
                $file_info .= ', "getSize": "'.$info->getSize()."\"\n";
                $file_info .= ', "getType": "'.$info->getType()."\"\n";
                $file_info .= "}\n";
                $jsonfiles .= $file_info;
            }
            $jsonfiles .= '}';

            // ***************アップロードに成功しているか確認******************
            $msg_type='';
            $extension_type = $item['type'];
            if($extension_type=='image/jpeg'){
                $file_type = '.jpg';
            }elseif($extension_type=='image/png'){
                $file_type = '.png';
            }elseif($extension_type=='image/gif'){
                $file_type = '.gif';
            }else{
                $msg_type = 'warning';
                $msg = 'ファイルの拡張子が間違っています。（*送信可能 jpeg/png/gif）';
                $errorArray['file_type'] = $msg;
                $count ++;
            }//end if

            if ($msg_type !== 'warning') {
                $random = str_random(10);
                $file_path =$random.$file_type;
                $file_all_array["$file_path"][] = $item['tmp_name'];
                $file_all_array["$file_path"][] = $item['name'];
            }
        }// end foreach

    $date = 'month_'.date("m");
    if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.env("APP_DIR").'/public/imgs/info/'.$date)) {
        mkdir($_SERVER['DOCUMENT_ROOT'].'/'.env("APP_DIR").'/public/imgs/info/'.$date);
    }
    foreach($file_all_array as $file_path => $tmp_name){
        // $file_path =$random.$file_type;
        $content = file_get_contents($tmp_name[0]);
        $server_path =$_SERVER['DOCUMENT_ROOT'].'/'.env("APP_DIR").'/public/imgs/info/'.$date.'/'.$file_path;
        file_put_contents( $server_path , $content);
        // ************File情報をデータベースに保存***********
        if ($tmp_name[1] !== '' ) {
            $file_array=array();
            $file_array['name'] = $tmp_name[1];
            $file_array['path'] = $kaitori_url.'/upimgs/'.$date.'/'.$file_path;
            $parent_file_array[] = $file_array;
        }
        $pathArray[]=$file_array['path']."\n";
    }


        //********ファイルエラー時にinfoにredirectしてエラーメッセージを表示**********
        if ($count > 0) {
            return redirect('/info')->withErrors($errorArray)->withInput();
        }

         // ************user情報をデータベースに保存***********
        $db_toiawase = new Toiawase();
        $db_toiawase->mail = $request->input('mail');
        $db_toiawase->exsample = $request->input('exsample');
        $db_toiawase->text = $request->input('text');
        $db_toiawase->ip = $request->ip();
        $db_toiawase->cv_site = $cv_site;
        $db_toiawase->save();


        // ▼▼▼▼▼▼▼▼▼ n8n Webhook連携コード ここから (cURL使用) ▼▼▼▼▼▼▼▼▼
        // 1. Webhook URLの定義 (※ここはご自身のn8nのWebhook URLに置き換えてください)
        $n8n_url = 'https://hoshinosubaru-web-mitsui.hf.space/webhook/d848e564-1421-478a-9564-afa9e6c063e0'; 

        // 2. n8nに送るデータ（JSON形式で送りやすいように配列化）
        $n8n_payload = array(
            // AI記事生成のトリガーとして最も重要な「お問い合わせ内容」
            "text_to_generate_article" => $request->input('text'), 
            "raw_data" => array(
                "mail" => $request->input('mail'),
                "domain_type" => $domain,
                "cv_site" => $cv_site,
                "device" => $cv_device,
                "ip_address" => $request->ip(),
                "toiawase_id" => $db_toiawase->id // 紐付け用にDB IDも送る
            )
        );

        // 3. cURLを使った安定的なリクエスト送信
        $ch = curl_init($n8n_url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($n8n_payload, JSON_UNESCAPED_UNICODE)); // 日本語対応
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($n8n_payload, JSON_UNESCAPED_UNICODE)))
        );
        // タイムアウトを短く設定し、フォーム送信が止まらないようにする
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); 

        try{
            // リクエスト実行
            curl_exec($ch);
        }catch(\Exception $e){
            // n8nへの送信が失敗しても、メインの処理は止めない
            // 必要であればログ出力など
            // \Illuminate\Support\Facades\Log::error("n8n Webhookへの送信に失敗しました。エラー: " . $e->getMessage());
        }finally {
            // cURLセッションを閉じる
            curl_close($ch);
        }

        // ▲▲▲▲▲▲▲▲▲ n8n Webhook連携コード ここまで ▲▲▲▲▲▲▲▲▲


        foreach ($parent_file_array as $file_data) {
            $toiawase_files = new Info();
            $toiawase_files->name = $file_data['name'];
            $toiawase_files->path = $file_data['path'];
            $toiawase_files->toiawase_id = $db_toiawase->id;
            $toiawase_files->save();
        }

        // return 'aaaaaa';

        // *************チャットワークの送信********
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
        //テスト
        // $room='68102709';
        $room='119634780';
        $token='bot';
        // $cw->Push($msg,$room,$token);
        $options = array(
          // HTTPコンテキストオプションをセット
          'http' => array(
            'method'=> 'POST',
            'header'=> 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query(array(
              "text" => "お問い合わせフォーム-{$cv_device} 【{$domain}】"."\n" . $chat_txt,
            ), "", "&")
          )
        );
        $context = stream_context_create($options);
        $send_space = 'AAAAcclcL3M';
        try{
          file_get_contents('https://rifa.life/refastaProject/pushGoogleChatSpace/' . $send_space , false, $context);
        }catch(\Exception $e){
          // echo $e->getMessage();
        }


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

        // ***********thank youページの表示************
        // ブラウザリロード等での二重送信防止
        $request->session()->regenerateToken();
        // 処理エラーが無ければ完了画面の表示
        $http_user_agent = '';
        $HTTP_X_FORWARDED_HOST = '';
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $http_user_agent = $_SERVER['HTTP_USER_AGENT'];
        }
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            $HTTP_X_FORWARDED_HOST = $_SERVER['HTTP_X_FORWARDED_HOST'];
        }

        return view('info.thanks'  ,[
        'http_user_agent' => $http_user_agent,
        'HTTP_X_FORWARDED_HOST' => $HTTP_X_FORWARDED_HOST,
    ]);
    }
}
