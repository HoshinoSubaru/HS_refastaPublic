<?php

namespace App\Http\Controllers;

use App\Models\Request_list;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;
use Illuminate\Support\Facades\Log;

//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;
use App\Chatwork\PushChatwork;

/**
 * 見積り用のページコントロールクラス
 */
class EstimateController extends Controller
{

        /**
     * 備考の初期テキスト
     */
    public $bikou_default_text = "";
    /**
     * プロパティのセット
     */
    public function setParam()
    {
        $this->bikou_default_text = "＜補足情報＞\n";
        $this->bikou_default_text .= "・コンディション： (10段階評価厳しめ)\n";
        $this->bikou_default_text .= "・付属品の有無：\n";
        $this->bikou_default_text .= "・ご購入金額：\n";
        $this->bikou_default_text .= "・ご要望等：\n";
        $this->bikou_default_text .= "\n";
        $this->bikou_default_text .= "※ダイヤや宝石の鑑定書はお写真をお送りください。";
        $this->replaced_bikou_default_text = str_replace(array("\r\n","\r","\n"), "", $this->bikou_default_text);

        $this->img_default_text = "＜補足情報＞\n";
        $this->img_default_text .= "地金の品位　:　\n";
        $this->img_default_text .= "全体の重さ　:　\n";
        $this->img_default_text .= "カラット数　:　\n";
        $this->img_default_text .= "ブランド名　:　\n";
        $this->img_default_text .= "宝石の種類　:　\n";
        $this->img_default_text .= "その他備考　:　";

        $this->replaced_img_default_text = str_replace(array("\r\n","\r","\n"), "", $this->img_default_text);


        // 海外IPの判定
        $context = stream_context_create([
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false
            ]
        ]);

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (isset($_SERVER["REMOTE_ADDR"])) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } else {
            $ip = "1.1.1.1"; // dummy
        }
        $ip = str_replace(" ", "", $ip);
        $kaigai_url = "https://rifa.life/refastaProject/kaigaiiphanbetsu/{$ip}";

        try {
            $this->kaigai_html = file_get_contents($kaigai_url, false, $context);
        } catch (\Exception $e) {
            Log::error("海外IP判定エラー: " . $e->getMessage());
            $this->kaigai_html = "JP"; // デフォルト値
        }


    }
     /**
     * メール見積もりフォームの表示
     */
    public function estimate(Request $request)
    {
        // Stream contextを作成
        $context = stream_context_create([
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false
            ]
        ]);
        
        //ご利用規約のインポート
        $kiyaku_url = "https://kinkaimasu.jp/kiyaku_text/kiyaku_for_rifa.php";
        try {
            $kiyaku_html = file_get_contents($kiyaku_url, false, $context);
        } catch (\Exception $e) {
            Log::error("利用規約の取得に失敗: " . $e->getMessage());
            $kiyaku_html = "利用規約の読み込みに失敗しました。";
        }
        $data = array();
        $data["kiyaku_html"]=$kiyaku_html;
        $this->setParam();

        $data['bikou_default_text'] = $this->bikou_default_text;

        return view("estimate.estimate", $data);
    }

    /**
     * 見積送信時の処理
     */
    public function estimate_update(Request $request)
    {
        // Stream contextを作成
        $context = stream_context_create([
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false
            ]
        ]);

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (isset($_SERVER["REMOTE_ADDR"])) {
            $ip = $_SERVER["REMOTE_ADDR"];
        } else {
            $ip = "1.1.1.1"; // dummy
        }
        $ip = str_replace(' ', '', $ip);

        $kaigai_url = "https://rifa.life/refastaProject/kaigaiiphanbetsu/{$ip}";
        try {
            $kaigai_html = file_get_contents($kaigai_url, false, $context);
        } catch (\Exception $e) {
            Log::error("海外IP判定エラー: " . $e->getMessage());
            $kaigai_html = "JP"; // デフォルト値
        }
        Log::info("Estimate IPチェック: $ip / レスポンス: $kaigai_html");

        // メールドメインによる送信拒否（example.com 等）
        // if (preg_match('/@(example\.com|test\.com)$/i', $request->input('mail'))) {
        //     Log::warning("📩 Blocked by email domain", [
        //         'mail' => $request->input('mail'),
        //         'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
        //     ]);
        //     abort(403, 'スパム検出：不正なメールアドレスです。');
        // }

        $this->setParam();// 初期値のセット
        if ( ($this->kaigai_html !== "") && ($this->kaigai_html !== "JP") ){
            return redirect("/404/");
        }

        // setParamの直後など早めの段階で user_agent を取得
        // $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
 
        // ★ ここに追記：NGドメインブロック
        // $ng_domains = ['diakaimasu.jp', 'brandkaimasu.com'];
        // $host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? ($_SERVER['HTTP_HOST'] ?? '');
        // foreach ($ng_domains as $ng_domain) {
        //     if (stripos($host, $ng_domain) !== false) {
        //         Log::warning("🌐 ブロックドメインからのアクセス遮断", [
        //             'ip' => $ip,
        //             'host' => $host,
        //             'user_agent' => $user_agent,
        //             'mail' => $request->input('mail'),
        //         ]);
        //         abort(404, 'このドメインからの送信は許可されていません。');
        //     }
        // }
        // 不正送信（ボット）チェック：hp_field に値がある場合は送信拒否
        if ($request->filled('honeypot')) {
            abort(403, 'スパム検出：不正な送信を中断しました。');
        }

        // ★ メールドメインによる送信拒否
        // if (preg_match('/@example\./', $request->input('mail'))) {
        //     abort(403, 'スパム検出：不正な送信を中断しました。');
        // }

        // validations
        $customAttributes = [
            'tel' => '電話番号',
            'mail' => 'メールアドレス',
            'contact' => '希望連絡方法',
        ];
        $messages = ['required' => ':attributeは必須です。'];
        $validateArray = array(
            'mail' => 'required',
            'contact' => 'required',
        );
        $validator = Validator::make($request->all(), $validateArray, $messages, $customAttributes);
        if ($validator->fails()) {
            return redirect('estimate')->withErrors($validator)->withInput();
        }
        // ブラウザリロード等での二重送信防止
        $request->session()->regenerateToken();
        // escape
        $_POST["tel"] = htmlspecialchars($_POST["tel"] ?? "",ENT_QUOTES,"UTF-8");
        $_POST["mail"] = htmlspecialchars($_POST["mail"] ?? "",ENT_QUOTES,"UTF-8");
        $_POST["contact"] = htmlspecialchars($_POST["contact"] ?? "",ENT_QUOTES,"UTF-8");
        $_POST["bikou"] = htmlspecialchars($_POST["bikou"] ?? "",ENT_QUOTES,"UTF-8");
        $replaced_bikou = str_replace(array("\r\n","\r"), "", $_POST['bikou']);
        if($replaced_bikou == $this->replaced_bikou_default_text){
            $_POST['bikou'] = '';
        }
        $cv_site = "";
        if(isset($_SERVER["HTTP_X_FORWARDED_HOST"])){
            $cv_site = $_SERVER["HTTP_X_FORWARDED_HOST"];
        }else{
            $cv_site = 'kinkaimasu.jp';  
        }
        $cv_time = date("Y-m-d H:i:s");
        $angouka_mailaddress = substr(md5(htmlspecialchars($_POST["mail"])), 0, 8);
        $send_id = $_POST["send_id"];
        $save_array = array();
        $save_array["tel"] = $_POST["tel"];
        $save_array["mail"] = $_POST["mail"];
        $save_array["contact"] = $_POST["contact"];
        $save_array["bikou"] = $_POST["bikou"];
        $save_array["cv_site"] = $cv_site;
        $save_array["cv_time"] = $cv_time;
        $save_array["created_at"] = $cv_time;
        $save_array["send_id"] = $send_id;
        $error_massage = "";
        try {
            DB::table("Eoc_estimate_v3")->insert($save_array);
        } catch(\Exception $e) {
            $error_massage .= $e->getMessage()."\n";
        }
        // 画像テキストの加工
        $chat_txt = "【送信内容】\n";
        for($upload_text_i = 1; $upload_text_i <= 10; $upload_text_i++){
            $upload_text_name = "upload_text_{$upload_text_i}";
            // requestの整理
            if($this->replaced_img_default_text == str_replace(array("\r\n","\r","\n"), "", $request->$upload_text_name)){
                $request->$upload_text_name = '';
            }else{
                // チャットテキストの処理
                $upload_text = $request->$upload_text_name;
                if($upload_text != $this->replaced_img_default_text){ 
                    $chat_txt .= "●送信内容{$upload_text_i} \n" . $_POST["upload_text_{$upload_text_i}"] . "\n";
                }
                // 画像コメント更新
                DB::table("Eoc_estimate_images")->where("send_id", $send_id)->where("image_name", "image_{$upload_text_i}")->update(
                    array("upload_text" => $request->$upload_text_name)
                );
            }
        }
        // スタッフ側タイトル生成
        $store_title = $this->create_store_title();

        /**
         * チャットワーク送信
         */
        $chat_txt .= "お客さま情報\n";
        if($_POST["contact"] != "") { $chat_txt .= "●希望連絡方法：{$_POST["contact"]}\n";}
        if($_POST['bikou'] != ''){
            $chat_txt .= "●備考欄：{$_POST["bikou"]}\n";
        }
        $chat_text_body = "[info][title]{$store_title} " . date("Y/m/d H:i:s") . " [/title]";
        $chat_text_body .= $chat_txt;
        $chat_text_body .= "[/info]";
        $cw = new PushChatwork;
        $msg = $chat_text_body;
        if(env("APP_DEBUG", false) != true){
            $room='68102709';
        }else{
            $room='68102709';
        }
        if(!empty($error_massage)) $msg = "[info][title]【エラー】  {$store_title}" . date("Y/m/d H:i:s") . "[/title]".$error_massage."[/info]";
        $token='bot';
        $cw->Push($msg,$room,$token);

        /**
         * メール送信
         */ 
        $input_values = $request;
        $to = env("MAIL_FROM_ADDRESS");
        $title = $store_title;
        $type = 'estimate';
        $send_type = 'shop';
        try {
            Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type));
            log::info("メール送信完了: {$to} - {$title}");
        } catch(\Exception $e) {
            $error_massage .= $e->getMessage()."\n";
            log::error("メール送信エラー: {$to} - {$title} - {$e->getMessage()}");
        }
        $to = $_POST["mail"];
        $title = '【オンライン見積り送信完了】リファスタ買取事業部';
        $send_type = 'visitor';
        try {
            Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type));
        } catch(\Exception $e) {
            $error_massage .= $e->getMessage()."\n";
        }

        /**
         * 完了画面の表示
         */
        return view("/estimate.thanks")->with([
            "img_default_text" => $this->img_default_text,
            "angouka_mailaddress" => $angouka_mailaddress,
            "upload_text_1" => $_POST["upload_text_1"],
            "upload_text_2" => $_POST["upload_text_2"],
            "upload_text_3" => $_POST["upload_text_3"],
            "upload_text_4" => $_POST["upload_text_4"],
            "upload_text_5" => $_POST["upload_text_5"],
            "upload_text_6" => $_POST["upload_text_6"],
            "upload_text_7" => $_POST["upload_text_7"],
            "upload_text_8" => $_POST["upload_text_8"],
            "upload_text_9" => $_POST["upload_text_9"],
            "upload_text_10" => $_POST["upload_text_10"],
            "tel" => $_POST["tel"], 
            "mail" => $_POST["mail"], 
            "contact" => $_POST["contact"], 
            "bikou" => $_POST['bikou'],
            "cv_site" => $cv_site,
        ]);
    }



    /**
     * 画像アップロード処理
     */
    public function estimate_image_update(Request $request)
    {
        $save_array["send_id"] = $request->send_id;
        $files = $_FILES;
        $CREATED_AT = date("Y-m-d H:i:s");

        $errArray = array();
        $fileSuccessArray = array();
        $index = 0;
        foreach ($files as $name => $image){
            $index++;
            $file_check = $this->file_check($image);
            if($file_check["status"] === "error"){
                $errArray[] = $file_check;
            }else{
                if($file_check["info"] != ""){
                    $fileSuccessArray[] = array(
                        "name" => $name,
                        "checkdata" => $file_check,
                    );
                }
            }
        }

        if(count($errArray) > 0){
            $errMessage = "";
            foreach($errArray as $err){
                // エラーの処理まとめる
                $errMessage .= $err["message"]."\n";
            }
            return json_encode(array(
                "status" => "error",
                "message" => $errMessage,
            ));
        }        

        // 他のバリデーションの処理（必要ないかも）
        // ファイルのエラーとバリデーションの結果を合わせてエラーreturnするかどうか。

        // ファイルのアップロード
        foreach($fileSuccessArray as $file)
        {
            $checkdata = $file["checkdata"];

            // $file["info"]でtmp_nameなど取得してfile_get_contentsに使う
            $content = file_get_contents($checkdata["info"]);

            // アップロードディレクトリの作成
            // フォルダ名を作成時間(yyyymm)にする
            $folder_name = date("Ymd", strtotime($CREATED_AT));
            $put_dir = storage_path() . "/app/public/upload_images/".$folder_name;
            if (!file_exists($put_dir)) {
                mkdir($put_dir);
            }
            if (!file_exists($put_dir)) {
                mkdir($put_dir);
            }
            // ファイル名をランダムな文字列２０文字+yyyymmddhhiiss.拡張子にする
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $rand_str = substr(str_shuffle($str), 0, 20);
            $fileName = $rand_str.date("YmdHis", strtotime($CREATED_AT)).$checkdata["file_type"];
            $full_path = $put_dir."/".$fileName;
            file_put_contents($full_path, $content);
            $save_array["image_url"] = "/storage/upload_images/".$folder_name."/".$fileName;
            $save_array["image_name"] = $file["name"];

        }

       $save_array["created_at"] = $CREATED_AT;
        DB::table("Eoc_estimate_images")->insert($save_array);
        return json_encode(array(
                "status" => "success",
                "message" => "",
        ));

    }

    /**
     * ファイルの内容をチェック
     */
    public function file_check($item)
    {
        $info = new \SplFileInfo($item['tmp_name']);
        $error_msg = array();
        // *************エラー時の処理**************
        if($item['error']!="0"){
            switch ($item['error']) {
                case '1':
                    $error_msg[] = "ファイルサイズが大きいためアップロード出来ませんでした。";
                    break;
                case '2':
                    $error_msg[] = "アップロードされたファイルは、HTML フォームで指定された容量を超えています。";
                    break;
                case '3':
                    $error_msg[] = "アップロードされたファイルは一部のみしかアップロードされていません。";
                    break;
                case '4':
                    $error_msg[] = "ファイルはアップロードされませんでした。";
                    break;
                case '6':
                    $error_msg[] = "テンポラリフォルダがありません。";
                    break;
                case '7':
                    $error_msg[] = "ディスクへの書き込みに失敗しました。";
                    break;
                case '8':
                    $error_msg[] = "ファイルのアップロードを中止しました。";
                    break;
            }

            // ***********not solved yet*****************
            //ゼロバイトの場合、ファイルを選択していない状態と仮定し、エラーログだけ出して、ユーザ側には何も表示しない
            if($item["size"] == 0){
                //nameがあった場合は、meta情報だけ成功したと仮定し、ゼロバイトアップされたと仮定。
                if($item["name"] != ''){
                    $error_msg[] = "ゼロバイトでアップロードされました。";
                }else{
                    //nameもない場合は単純にファイル画像を選択・送信していないものと仮定する。
                    return array(
                        "status" => "success",
                        "file_type" => "",
                        "message" => "",
                        "info" => "",
                    );
                }
            }
        }// end if error

        // ***************拡張子確認******************
        $extension_type = $item['type'];
        if($extension_type=='image/jpeg'){
            $file_type = '.jpg';
        }elseif($extension_type=='image/png'){
            $file_type = '.png';
        }elseif($extension_type=='image/gif'){
            $file_type = '.gif';
        }else{
            $file_type = '';
            $error_msg[] = "ファイルの拡張子が間違っています。（*送信可能 jpeg/png/gif）";
        }//end if

        // 結果
        if(count($error_msg) > 0){
            return array(
                "status" => "error",
                "file_type" => $file_type,
                "message" => implode("\n", $error_msg),
                "info" => "",
            );
        }else{
            return array(
                "status" => "success",
                "file_type" => $file_type,
                "message" => "",
                "info" => $info,
            );
        }
    }
    /**
     * 見積りthanksページ
     */
    public function dummy(){
    }

    /**
     * サンクスページ
     */
    public function estimate_thanks(Request $request)
    {
        return view("estimate.thanks");
    }
    

    public function create_store_title()
    {
        if(isset($_SERVER["HTTP_USER_AGENT"])){
            $user_agent = $_SERVER["HTTP_USER_AGENT"];
        }else{
            $user_agent = "";
        }
        if(isset($_SERVER['HTTP_X_FORWARDED_HOST'])){
            if ((strpos($user_agent, 'iPhone') !== false) || ((strpos($user_agent, 'Android') !== false) && (strpos($user_agent, 'Mobile') !== false))
            || (strpos($user_agent, 'Windows Phone') !== false)
            || (strpos($user_agent, 'BlackBerry') !== false) || (strpos($user_agent, 'BB10') !== false) || (strpos($user_agent, 'Passport') !== false)) {
                if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "diakaimasu.jp")){
                    $store_title = '【お見積り通知】diakai/SP/総合';
                }elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com")){
                    $store_title = '【お見積り通知】brakai/SP/総合';
                }elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "hi-ba-na.conohawing.com")){
                    $store_title = 'テストサーバー';
                }else{
                    $store_title = '【お見積り通知】kinkai/SP/総合';
                }
            }else{
                if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "diakaimasu.jp")){
                    $store_title = '【お見積り通知】diakai/総合';
                }elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com")){
                    $store_title = '【お見積り通知】brakai/総合';
                }elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "hi-ba-na.conohawing.com")){
                    $store_title = 'テストサーバー';
                }else{
                    $store_title = '【お見積り通知】kinkai/総合';
                }
            }
        }else{
            $store_title = '【メール査定】（買取サイト以外）';
        }
        return $store_title;
    }
}//end class