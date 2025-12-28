<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function redirect;
use function view;

//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;
use App\Chatwork\PushChatwork;

/**
 * 店頭買取用のページコントロールクラス
 */
class Shop_frontController extends Controller
{
    public function dummy(){

    }

    /**
     * スタート画面
     */
    public function startPage(Request $request)
    {
        return view("shopFrontBackend.index");
    }

    /**
     * ID生成処理＋お客様入力画面の開始
     */
    public function input_start()
    {
        $date = date("YmdHi");
        $random_int = "";
        for ($i = 0; $i < 3; $i++) {
            $random_int .= mt_rand(0, 9);
        }
        $send_id = $date.$random_int;

        $ecc_id = htmlspecialchars($_POST["ecc_id"]);

        $start_time = date("Y-m-d H:i:s");

        $insertArray = array(
            "send_id" => $send_id,
            "ecc_id" => $ecc_id,
            "start_time" => $start_time,
        );

        $id = DB::table('shop_front_details')->insertGetId($insertArray);
        $chat_text_body = "店頭入力開始しました"."\n";
        $chat_text_body .= env("APP_URL") . "/shop_front/check_contents?shop_front_id={$id}\n";
        $cw = new PushChatwork;
        $msg = $chat_text_body;
        $room='265915716';
        $token='takeuchi';
        $cw->Push($msg,$room,$token);

        return redirect("shop_front?send_id={$send_id}");
    }

    /**
     * 店頭買取入力
     */
    public function shop_front(Request $request)
    {
        return view("shop_front.shop_front");
        // return redirect("shop_front/iddocment_image_upload");
    }

    /**
     * 店頭入力 DB保存
     */
    public function shop_front_update(Request $request)
    {
        $save_array = array();
        if(isset($_POST["send_id"])) {
            $_POST["send_id"] = htmlspecialchars($_POST["send_id"], ENT_QUOTES, "UTF-8");
            $save_array["send_id"] = $_POST["send_id"];
        }
        if(isset($_POST["is_owner"])) {
            $_POST["is_owner"] = htmlspecialchars($_POST["is_owner"], ENT_QUOTES, "UTF-8");
            if($_POST["is_owner"] === 'はい'){
                $save_array["is_own"] = 1;
            }else{
                $save_array["is_own"] = 0;
            }
        }
        if(isset($_POST["identification_type"])) {
            $_POST["identification_type"] = htmlspecialchars($_POST["identification_type"], ENT_QUOTES, "UTF-8");
            $save_array["iddocment_category"] = $_POST["identification_type"];
        }
        if(isset($_POST["purchase_achievement"])) {
            $_POST["purchase_achievement"] = htmlspecialchars($_POST["purchase_achievement"], ENT_QUOTES, "UTF-8");
            if($_POST["purchase_achievement"] === '初めて利用する'){
                $save_array["is_first"] = 1;
            }else{
                $save_array["is_first"] = 0;
            }
        }
        if(isset($_POST["before_two_years"])) {
            $_POST["before_two_years"] = htmlspecialchars($_POST["before_two_years"], ENT_QUOTES, "UTF-8");
            if($_POST["before_two_years"] === 'はい'){
                $save_array["before_two_years"] = 1;
            }else{
                $save_array["before_two_years"] = 0;
            }
        }
        if(isset($_POST["has_changed_profile"])) {
            $_POST["has_changed_profile"] = htmlspecialchars($_POST["has_changed_profile"], ENT_QUOTES, "UTF-8");
            if($_POST["has_changed_profile"] === 'はい'){
                $save_array["has_changed_profile"] = 1;
            }else{
                $save_array["has_changed_profile"] = 0;
            }
        }
        if(isset($_POST["lastname"])) {
            $_POST["lastname"] = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
            $save_array["lastname"] = $_POST["lastname"];
        }
        if(isset($_POST["firstname"])) {
            $_POST["firstname"] = htmlspecialchars($_POST["firstname"], ENT_QUOTES, "UTF-8");
            $save_array["firstname"] = $_POST["firstname"];
        }
        if(isset($_POST["furigana_lastname"])) {
            $_POST["furigana_lastname"] = htmlspecialchars($_POST["furigana_lastname"], ENT_QUOTES, "UTF-8");
            $save_array["furigana_lastname"] = $_POST["furigana_lastname"];
        }
        if(isset($_POST["furigana_firstname"])) {
            $_POST["furigana_firstname"] = htmlspecialchars($_POST["furigana_firstname"], ENT_QUOTES, "UTF-8");
            $save_array["furigana_firstname"] = $_POST["furigana_firstname"];
        }
        if(isset($_POST["gender"])) {
            $_POST["gender"] = htmlspecialchars($_POST["gender"], ENT_QUOTES, "UTF-8");
            $save_array["gender"] = $_POST["gender"];
        }
        if(
            (isset($_POST["profile_birthday_year"]))
            and (isset($_POST["profile_birthday_month"]))
            and (isset($_POST["profile_birthday_day"]))
        ){
            $_POST["profile_birthday_year"] = htmlspecialchars($_POST["profile_birthday_year"], ENT_QUOTES, "UTF-8");
            $_POST["profile_birthday_month"] = htmlspecialchars($_POST["profile_birthday_month"], ENT_QUOTES, "UTF-8");
            $_POST["profile_birthday_day"] = htmlspecialchars($_POST["profile_birthday_day"], ENT_QUOTES, "UTF-8");
            $save_array["birthday"] = $_POST["profile_birthday_year"] . '-' . $_POST["profile_birthday_month"] . '-' . $_POST["profile_birthday_day"];
        }
        if(isset($_POST["prefecture"])) {
            $_POST["prefecture"] = htmlspecialchars($_POST["prefecture"], ENT_QUOTES, "UTF-8");
            $save_array["prefecture"] = $_POST["prefecture"];
        }
        if(isset($_POST["city"])) {
            $_POST["city"] = htmlspecialchars($_POST["city"], ENT_QUOTES, "UTF-8");
            $save_array["city"] = $_POST["city"];
        }
        if(isset($_POST["town"])) {
            $_POST["town"] = htmlspecialchars($_POST["town"], ENT_QUOTES, "UTF-8");
            $save_array["town"] = $_POST["town"];
        }
        if(isset($_POST["building_types"])) {
            $_POST["building_types"] = htmlspecialchars($_POST["building_types"], ENT_QUOTES, "UTF-8");
            $save_array["building_types"] = $_POST["building_types"];
        }
        if(isset($_POST["dwelling_types"])) {
            $_POST["dwelling_types"] = htmlspecialchars($_POST["dwelling_types"], ENT_QUOTES, "UTF-8");
            $save_array["dwelling_types"] = $_POST["dwelling_types"];
        }
        if(isset($_POST["tel"])) {
            $_POST["tel"] = htmlspecialchars($_POST["tel"], ENT_QUOTES, "UTF-8");
            $save_array["tel"] = $_POST["tel"];
        }
        if(isset($_POST["email"])) {
            $_POST["email"] = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
            $save_array["email"] = $_POST["email"];
        }
        if(isset($_POST["job_category"])) {
            $_POST["job_category"] = htmlspecialchars($_POST["job_category"], ENT_QUOTES, "UTF-8");
            $save_array["job_category"] = $_POST["job_category"];
        }
        if(isset($_POST["job_category_freetext"])) {
            $_POST["job_category_freetext"] = htmlspecialchars($_POST["job_category_freetext"], ENT_QUOTES, "UTF-8");
            $save_array["job_category_freetext"] = $_POST["job_category_freetext"];
        }


        $CREATED_AT = date("Y-m-d H:i:s");
        $save_array["created_at"] = $CREATED_AT;

        $error_massage = "";

        $shop_front_details = DB::table("shop_front_details")->where("send_id", $_POST["send_id"])->first();
        if($shop_front_details == null){
            DB::table("shop_front_details")->insert($save_array);
        }else{
            DB::table("shop_front_details")->where("send_id", $_POST["send_id"])->update($save_array);
        }

//        return view("shop_front.shop_front");
    }



    /**
     * アップロードファイルのチェック
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
     * 商品の画像アップロードの画面
     */
    public function products_image_upload_display()
    {
        $shop_front_id = htmlspecialchars($_GET["shop_front_id"], ENT_QUOTES, "UTF-8");
        $array = array(
            "shop_front_id" => $shop_front_id,
        );
        return view("shopFrontBackend.products", $array);
    }

    /**
     * 商品の画像アップロード
     */
    public function products_image_upload(Request $request)
    {
        $files = $_FILES;
        $CREATED_AT = date("Y-m-d H:i:s");
        $shop_front_id = htmlspecialchars($_GET["shop_front_id"], ENT_QUOTES, "UTF-8");
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
            $msg_type = 'danger';
            $dashboard_msg = $errMessage;
            $request->session()->flash('dashboard_msg', $dashboard_msg);
            $request->session()->flash('msg_type', $msg_type);
            return redirect("shop_front/products_image_upload");
        }

        /**
         * ファイルのアップロード
         */
        foreach($fileSuccessArray as $file)
        {
            $checkdata = $file["checkdata"];

            // $file["info"]でtmp_nameなど取得してfile_get_contentsに使う
            $content = file_get_contents($checkdata["info"]);

            // アップロードディレクトリの作成
            // フォルダ名を作成時間(yyyymm)にする
            $folder_name = date("Ymd", strtotime($CREATED_AT));
            $put_dir = __DIR__ . "/../../../storage/app/public/shop_front_uploads/".$folder_name;
            if (!file_exists($put_dir)) {
                mkdir($put_dir);
            }

            // ファイル名をランダムな文字列２０文字+yyyymmddhhiiss.拡張子にする
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $rand_str = substr(str_shuffle($str), 0, 20);
            $fileName = $rand_str.date("YmdHis", strtotime($CREATED_AT)).$checkdata["file_type"];
            $full_path = $put_dir."/".$fileName;
            file_put_contents($full_path, $content);
            $products_image_path = "/../../../storage/app/public/shop_front_uploads/".$folder_name."/".$fileName;
        }
        $created_at = $CREATED_AT;
        $save_array  = array(
            "products_image_path" => $products_image_path,
            "created_at" => $created_at,
        );
        DB::table("shop_front_details")->where("shop_front_id", $shop_front_id)->update($save_array);


        return redirect("/shop_front/confirm_new_image?shop_front_id={$shop_front_id}");
    }

    /**
     * 商品画像確認画面
     */
    public function confirm_image(Request $request)
    {
        $shop_front_id = $_GET["shop_front_id"];
        $shop_front_detail = DB::table("internet_test.shop_front_details")->where("shop_front_id", array($shop_front_id))->first();
        $products_image_path = $shop_front_detail->products_image_path;
        $products_image_path = str_replace("/../../../storage/app/public", env("APP_URL")."/storage", $products_image_path);
        $products_image_path = str_replace(array("\r\n", "\r"), "\n", $products_image_path);
        $products_image_path_array = explode("\n", $products_image_path);

        $array = array();
        $array['shop_front_id'] = $shop_front_id;
        $array['products_image_path_array'] = $products_image_path_array;

        return view("shopFrontBackend.confirm", $array);
    }

    /**
     * 画像確認画面の"はい"を押下したあとの処理
     */
    public function confirm_image_yes(Request $request){
        $shop_front_id = $_POST["shop_front_id"];
        $save_array  = array(
            "is_img_confirmed_products" => 1,
        );
        DB::table("shop_front_details")->where("shop_front_id", array($shop_front_id))->update($save_array);

        //完了ページへ処理まだ　shop_front_idは引き継ぐ処理はこれから作成する
        return redirect("/shop_front/thanks?shop_front_id={$shop_front_id}");
    }




    /**
     * 本人確認書類画像アップロードの画面
     */
    public function iddocment_image_upload_display()
    {
        $shop_front_id = htmlspecialchars($_GET["shop_front_id"], ENT_QUOTES, "UTF-8");
        $array = array(
            "shop_front_id" => $shop_front_id,
        );
        return view("shopFrontBackend.iddocment", $array);
    }

    /**
     * 本人確認書類画像アップロード
     */
    public function iddocment_image_upload(Request $request)
    {
        $files = $_FILES;
        $CREATED_AT = date("Y-m-d H:i:s");
        $UPDATED_AT = date("Y-m-d H:i:s");
        $shop_front_id = htmlspecialchars($_GET["shop_front_id"], ENT_QUOTES, "UTF-8");
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
            $msg_type = 'danger';
            $dashboard_msg = $errMessage;
            $request->session()->flash('dashboard_msg', $dashboard_msg);
            $request->session()->flash('msg_type', $msg_type);
            return redirect("shop_front/iddocment_image_upload");
        }

        /**
         * 本人確認画像ファイルのアップロード
         */
        foreach($fileSuccessArray as $file)
        {
            $checkdata = $file["checkdata"];

            // $file["info"]でtmp_nameなど取得してfile_get_contentsに使う
            $content = file_get_contents($checkdata["info"]);

            // アップロードディレクトリの作成
            // フォルダ名を作成時間(yyyymm)にする
            $folder_name = date("Ymd", strtotime($CREATED_AT));
            $put_dir = __DIR__ . "/../../../storage/app/public/shop_front_uploads/".$folder_name;
            if (!file_exists($put_dir)) {
                mkdir($put_dir);
            }

            // ファイル名をランダムな文字列２０文字+yyyymmddhhiiss.拡張子にする
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $rand_str = substr(str_shuffle($str), 0, 20);
            $fileName = $rand_str.date("YmdHis", strtotime($CREATED_AT)).$checkdata["file_type"];
            $full_path = $put_dir."/".$fileName;
            file_put_contents($full_path, $content);
            $iddocment_image_path = "/../../../storage/app/public/shop_front_uploads/".$folder_name."/".$fileName;
        }
        $created_at = $CREATED_AT;
        $updated_at = $UPDATED_AT;
        $save_array  = array(
            "iddocment_image_path" => $iddocment_image_path,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        );
        DB::table("shop_front_details")->where("shop_front_id", $shop_front_id)->update($save_array);


        return redirect("/shop_front/products_image_upload/?shop_front_id={$shop_front_id}");
    }

    /**
     * 本人確認書類の確認画面
     */
    public function confirm_iddocment_image(Request $request)
    {
        $shop_front_id = $_GET["shop_front_id"];
        $shop_front_detail = DB::table("internet_test.shop_front_details")->where("shop_front_id", array($shop_front_id))->first();
        $iddocment_image_path = $shop_front_detail->iddocment_image_path;
        $iddocment_image_path = str_replace("/../../../storage/app/public", env("APP_URL")."/storage", $iddocment_image_path);
        $iddocment_image_path = str_replace(array("\r\n", "\r"), "\n", $iddocment_image_path);
        $iddocment_image_path_array = explode("\n", $iddocment_image_path);

        $array = array();
        $array['shop_front_id'] = $shop_front_id;
        $array['iddocment_image_path_array'] = $iddocment_image_path_array;
        $array['shop_front_id'] = $shop_front_id;

        return view("shopFrontBackend.confirm_iddocment", $array);
    }

    /**
     * 本人確認書類の確認画面の"はい"を押下したあとの処理
     */
    public function confirm_iddocment_image_yes(Request $request)
    {
        $shop_front_id = $_POST["shop_front_id"];
        $save_array  = array(
            "is_img_confirmed_iddocment" => 1,
        );
        DB::table("shop_front_details")->where("shop_front_id", array($shop_front_id))->update($save_array);
        return redirect("/shop_front/products_image_upload?shop_front_id={$shop_front_id}");
    }

    /**
     * 本人確認書類&商品画像の撮影確認画面
     */
    public function confirm_new_image(Request $request)
    {
        $shop_front_id = $_GET["shop_front_id"];
        $shop_front_detail = DB::table("internet_test.shop_front_details")->where("shop_front_id", array($shop_front_id))->first();

        $iddocment_image_path = $shop_front_detail->iddocment_image_path;
        $iddocment_image_path = str_replace("/../../../storage/app/public", env("APP_URL")."/storage", $iddocment_image_path);
        $iddocment_image_path = str_replace(array("\r\n", "\r"), "\n", $iddocment_image_path);
        $iddocment_image_path_array = explode("\n", $iddocment_image_path);

        $products_image_path = $shop_front_detail->products_image_path;
        $products_image_path = str_replace("/../../../storage/app/public", env("APP_URL")."/storage", $products_image_path);
        $products_image_path = str_replace(array("\r\n", "\r"), "\n", $products_image_path);
        $products_image_path_array = explode("\n", $products_image_path);

        $array = array();
        $array['shop_front_id'] = $shop_front_id;
        $array['iddocment_image_path_array'] = $iddocment_image_path_array;
        $array['products_image_path_array'] = $products_image_path_array;

        return view("shopFrontBackend.confirm_new_image", $array);
    }

    /**
     * 本人確認書類&商品画像の撮影確認画面の"はい"を押下したあとの処理
     */
    public function confirm_new_image_yes(Request $request)
    {
        $shop_front_id = $_POST["shop_front_id"];
        $save_array  = array(
            "is_img_confirmed_products" => 1,
        );
        DB::table("shop_front_details")->where("shop_front_id", array($shop_front_id))->update($save_array);
        return redirect("/shop_front/thanks?shop_front_id={$shop_front_id}");
    }

    /**
     *  完了ページ
     */
    public function thanks()
    {
        $shop_front_id = $_GET["shop_front_id"];

        $array = array();
        $array['shop_front_id'] = $shop_front_id;
        return view("shopFrontBackend.thanks", $array);
    }

    /**
     * タブレッドをスタッフに渡す画面
     */
    public function staff()
    {
        $shop_front_id = $_GET["shop_front_id"];

        $array = array();
        $array['shop_front_id'] = $shop_front_id;
        return view("shopFrontBackend.staff", $array);
    }









}
