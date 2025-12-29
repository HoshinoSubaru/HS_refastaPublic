<?php

namespace App\Http\Controllers;

use App\Chatwork\PushChatwork;
use App\Eoc_refining_v1;
use App\Mail\PushMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\IngotDetail;
use Illuminate\Support\Facades\DB;
//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\RefiningInfoShop;
use App\Mail\RefiningInfoVisitor;

class RefiningInfoController extends Controller
{

    public function index($formData = [])
    {
        try {
            $tb_gold = DB::table("kinkai.tb_gold")
                        ->where("gold_item", "ingot_100over")
                        ->select("gold_price")
                        ->first();

            $tb_gold_k24 = DB::table("kinkai.tb_gold")
                        ->where("gold_item", "k24")
                        ->select("gold_price as k24_gold_price")
                        ->first();
                        
            $ingot_gold_1000g = $tb_gold ? intval($tb_gold->gold_price) * 1000 : 0;
            $ingot_gold_100g = $tb_gold ? intval($tb_gold->gold_price) * 100 : 0;
            $ingot_k24_1g = $tb_gold_k24 ? intval($tb_gold_k24->k24_gold_price) : 0;


            $tb_platinum = DB::table("kinkai.tb_platinum")
                        ->where("platinum_item", "ingot_100over")
                        ->select("platinum_price")
                        ->first();
                        
            $ingot_platinum_1000g = $tb_platinum ? intval($tb_platinum->platinum_price) * 1000 : 0;
            $ingot_platinum_100g = $tb_platinum ? intval($tb_platinum->platinum_price) * 100 : 0;
        } catch (\Exception $e) {
            \Log::error('RefiningInfoController index: kinkai DB取得エラー', [
                'error' => $e->getMessage(),
            ]);
            // 万が一のデータベース接続失敗時はデフォルト値を使用（ローカル環境対応）
            $tb_gold = null;
            $tb_gold_k24 = null;
            $tb_platinum = null;
            $ingot_gold_1000g = 0;
            $ingot_gold_100g = 0;
            $ingot_k24_1g = 0;
            $ingot_platinum_1000g = 0;
            $ingot_platinum_100g = 0;
        }

        $context = stream_context_create([
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false
            ]
        ]);

        // ご利用規約のインポート
        $kiyaku_url = "https://kinkaimasu.jp/kiyaku_text/kiyaku_for_rifa.php";
        $kiyaku_html = file_get_contents($kiyaku_url, false, $context);

        // プライバシーポリシーのインポート
        try {
            $pp_url = "https://urlounge.co.jp/policy_notice/policy_notice.php";
            $pp_html = file_get_contents($pp_url, false, $context);
        } catch (\Exception $e) {
            $pp_url = "http://urlounge.co.jp/policy_notice/policy_notice.php";
            $pp_html = file_get_contents($pp_url, false, $context);
        }

        return view('refining_info.index', [
            "kiyaku_html" => $kiyaku_html,
            "pp_html" => $pp_html,
            "formData" => $formData,

            // ローカル環境用（nullチェックあり）
            //"gold_price" => $tb_gold ? intval($tb_gold->gold_price) : 0,
            // 本番環境用（nullチェック不要）
             "gold_price" => intval($tb_gold->gold_price),

            "ingot_gold_1000g" => $ingot_gold_1000g,
            "ingot_gold_100g" => $ingot_gold_100g,

            // ローカル環境用（nullチェックあり）
            //"k24_gold_price" => $tb_gold_k24 ? intval($tb_gold_k24->k24_gold_price) : 0,
            // 本番環境用（nullチェック不要）
             "k24_gold_price" => intval($tb_gold_k24->k24_gold_price),
            
            "ingot_k24_1g" => $ingot_k24_1g,
            "ingot_platinum_1000g" => $ingot_platinum_1000g,
            "ingot_platinum_100g" => $ingot_platinum_100g
        ]);
    }

    public function sendEmail(Request $request)
    {
         // 不正送信（ボット）チェック：hp_field に値がある場合は送信拒否
        if ($request->filled('hp_field')) {
            abort(403, 'スパム検出：不正な送信を中断しました。');
        }

        $angouka_mailaddress = "";
        $input_values = $request->all();
       // 2. データをDBに保存
       // JSONデータの受け取り
       // HTTPリクエストからインゴット詳細を受け取る

       $ingotDetailsJSON = $request->input('ingot_details');

       $ingotDetails = json_decode($ingotDetailsJSON, true);
       
       // $ingotDetails が配列であることを確認する
        if (!is_array($ingotDetails)) {
            $ingotDetails = [];
        }
        
        // ingotDetails のバリデーション: null や不正なデータをフィルタリング
        $ingotDetails = array_filter($ingotDetails, function($detail) {
            return is_array($detail) && !empty($detail['_type']);
        });
        
        // バリデーション: 有効なデータが1つもない場合はエラー
        if (empty($ingotDetails)) {
            \Log::warning('精錬加工申込：ingotDetails が空または不正', [
                'ingotDetailsJSON' => $ingotDetailsJSON,
                'email' => $request->input('email'),
            ]);
            return back()->withErrors(['ingot_details' => 'インゴット詳細のデータがありません。もう一度入力してください。'])->withInput();
        }
        
        // インデックスをリセット（配列のキーを0から連番にする）
        $ingotDetails = array_values($ingotDetails);
        
        // データが存在する場合の処理
        foreach ($ingotDetails as $detail) {
            if (empty($detail['_type'])){
                continue; 
            }
               // 各要素の処理
            $type = $detail['_type'] ?? null;
            $is_gdb = $detail['_is_gdb'] ?? null;
            // $is_overseas_brand = $detail['_is_overseas_brand'] ?? null;
            $gram = $detail['_gram'] ?? null;
            $immediate_split_count_100g = $detail['_immediate_split_count_100g'] ?? null;
            $splits_count_100g = $detail['_splits_count_100g'] ?? null;
            $splits_count_50g = $detail['_splits_count_50g'] ?? null;
            $fee_total_price = $detail['_fee_total_price'] ?? null;
        }
        // 売却立替を希望しない場合、selected_sale_gとselected_sale_immediate_split_100gはnullになる
        $selected_sale_g = $request->input('selected_sale_g') ?? $request->input('selected_sale_immediate_split_100g');
        $saleRebuildingPrice = $request->input('saleRebuildingPricefee');
        $deliveryservice = $request->input('deliveryservicefee');
        $barchargefeefee = $request->input('barchargefeefee');
        $totalTransferAmount = $request->input('totalTransferAmountfee');
        $sale_advance_input = $request->input('sale_advance_input');
        $service_selection = $request->input('service_selection');
        $usage = $request->input('usage');
        $name = $request->input('name');
        $kana = $request->input('kana');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $angouka_mailaddress = md5(htmlspecialchars($email));
        $angouka_mailaddress = substr($angouka_mailaddress, 0, 8);
        $contact_method = $request->input('contact_method');
        $user_yuubinn = $request->input('user_yuubinn');
        $user_todou = $request->input('user_todou');
        $user_sikutyouson = $request->input('user_sikutyouson');
        $user_banti = $request->input('user_banti');
        $user_building = $request->input('user_building');
        $is_applicant = $request->input('is_applicant');
        $same_address = $request->input('same_address');
        $content_inquiry = $request->input('content_inquiry', '');
        // todo DBに保存する
        // URL用のuuidを保存しuuidをベースにDB取得する（個人情報保護のため）
        try {
        $Eoc_refining_v1 = Eoc_refining_v1::create([
            'selected_sale_g' => $selected_sale_g,
            'saleRebuildingPrice' => $saleRebuildingPrice,
            'deliveryservice' => $deliveryservice,
            'totalTransferAmount' => $totalTransferAmount,
            'ingot_details' => json_encode($ingotDetails),
            'angouka_mailaddress' => $angouka_mailaddress,
            'service_selection' => $service_selection,
            'sale_advance_input' => $sale_advance_input,
            'usage' => $usage,
            'name' => $name,
            'kana' => $kana,
            'phone_number' => $phone_number,
            'email' => $email,
            'contact_method' => $contact_method,
            'user_yuubinn' => $user_yuubinn,
            'user_todou' => $user_todou,
            'user_sikutyouson' => $user_sikutyouson,
            'user_banti' => $user_banti,
            'user_building' => $user_building,
            'is_applicant' => $is_applicant,
            'same_address' => $same_address,
            'content_inquiry' => $content_inquiry,
            ]);
        } catch (\Exception $e) {
            // DB保存エラー（ローカル環境でテーブルが存在しない場合など）
            \Log::error('精錬加工申込：DB保存エラー', [
                'error' => $e->getMessage(),
                'email' => $email ?? 'unknown',
            ]);
            // エラーが発生してもメール送信は継続
        }
        //////////////////////start chat//////////////////////
        $chat_txt = '【金地金精錬分割加工サービス申込完了】'. "\n";
        $iteration = 1;
        foreach ($ingotDetails as $detail) {
            if (empty($detail['_type'])) {
                continue; // Skip this iteration if '_type' is empty
            }
            $chat_txt .= "●入力内容{$iteration}\n";
            $chat_txt .= "タイプ ：" . ($detail['_type'] ?? '') . "\n";
            $chat_txt .= "GDB   ：" . ($detail['_is_gdb'] ?? '') . "\n";
            //$chat_txt .= "海外ブランド ：" . ($detail['_is_overseas_brand'] ?? '') . "\n";
            $chat_txt .= "重量 ：" . ($detail['_gram'] ?? '')."g". "\n";
            $chat_txt .= "分割50gバー  ：" . (($detail['_splits_count_50g'] ?? 0) ? $detail['_splits_count_50g'] . "枚" : '0枚') . "\n";
            $chat_txt .= "分割100gバー ：" . (($detail['_splits_count_100g'] ?? 0) ? $detail['_splits_count_100g'] . "枚" : '0枚') . "\n";
            $chat_txt .= "即分割100gバー ：" . (($detail['_immediate_split_count_100g'] ?? 0) ? $detail['_immediate_split_count_100g'] . "枚" : '0枚') . "\n";
            $chat_txt .= "スクラップのグラム ：" . (($detail['_splits_scrap_100g'] ?? 0) ? $detail['_splits_scrap_100g'] . "g" : '0g') . "\n";
            $chat_txt .= "加工費用：" . number_format($detail['_fee_total_price'] ?? 0, 0, '.', ',') . "円" . "\n";
            $iteration++;
            $chat_txt .= "------------" . "\n";
        }
        // $chat_txt .= "●売却立替：" . $sale_advance_input . "\n";
        // $chat_txt .= "●売却立替詳細：" . (isset($selected_sale_g) ? $selected_sale_g . "g" : "ない") . "\n";
        // $chat_txt .= "●本日のインゴット売却価格：" . (isset($saleRebuildingPrice) ? $saleRebuildingPrice : "0") . "\n";
        $chat_txt .= "●売却立替：" . $sale_advance_input . "\n";
        $chat_txt .= "●売却立替詳細：" . ($sale_advance_input === 'いいえ' ? 'ない' : (isset($selected_sale_g) ? $selected_sale_g . "g" : "ない")) . "\n";
        $numericSalePrice = isset($saleRebuildingPrice) ? (float)preg_replace('/[^\d.]/', '', $saleRebuildingPrice) : 0;
        $chat_txt .= "●本日のインゴット売却価格：" .($sale_advance_input === 'いいえ' ? "0" : number_format($numericSalePrice)) . "円\n";
        $chat_txt .= "●インゴットのお持ち込み方法：" . $service_selection . "\n";
        $chat_txt .= "●配送料(税込)：" . $deliveryservice . "\n";
        $chat_txt .= "●バーチャージ(税込)：" . $barchargefeefee . "\n";
        $chat_txt .= "●ご請求金額：" . $totalTransferAmount . "\n";
        $chat_txt .= "-----------------------------------" . "\n";
        $chat_txt .= "●弊社ご利用回数 ：" . $usage . "\n";
        $chat_txt .= "●お名前(姓 名)：" . $name . "\n";
        $chat_txt .= "●希望連絡方法  ：" . $contact_method . "\n";
        $chat_txt .= "●郵便番号：" . $user_yuubinn . "\n";
        $chat_txt .= "●都道府県：" . $user_todou . "\n";
        $chat_txt .= "●市区町村群 ：" . $user_sikutyouson . "\n";
        $chat_txt .= "●ご本人さまのお申込みですか？    ：" . $is_applicant . "\n";
        $chat_txt .= "●身分証の住所と現住所は同一ですか？：" . $same_address . "\n";
        
        $chat_txt .= "●暗号化メールアドレス：" . $angouka_mailaddress . "\n";
        $chat_txt = str_replace("&", "＆", $chat_txt);
        
        $chat_text_body = $chat_txt;
        $chat_text_body .= $chat_txt;
        $chat_text_body .= "";
        $options = array(
          // HTTPコンテキストオプションをセット
          'http' => array(
            'method'=> 'POST',
            'header'=> 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query(array(
              "text" => $chat_txt,
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
        //////////////////////end chat//////////////////////

        //メール送信
        $input_values = $request->toArray();
        $input_values['ingotDetails'] = $ingotDetails; // デコードしたデータ

        $input_values['angouka_mailaddress'] = $angouka_mailaddress;
        
        // デバッグ：送信データをログに記録
        \Log::info('精錬加工申込：メール送信データ確認', [
            'has_ingotDetails' => isset($input_values['ingotDetails']),
            'ingotDetails_type' => gettype($input_values['ingotDetails']),
            'ingotDetails_count' => is_array($input_values['ingotDetails']) ? count($input_values['ingotDetails']) : 'not array',
            'email' => $email ?? 'not set',
            'MAIL_FROM_ADDRESS' => env("MAIL_FROM_ADDRESS"),
        ]);
        
        // 店舗側へのメール送信（エラーハンドリング追加）
        $mail_error_shop = null;
        try {
            $to = env("MAIL_FROM_ADDRESS");
            $title = '【精錬加工申込】';
            $type = 'refining_info';
            $send_type = 'shop';
            Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type));
        } catch (\Exception $e) {
            $mail_error_shop = $e->getMessage();
            \Log::error('精錬加工申込メール送信エラー（店舗側）', [
                'to' => $to ?? 'unknown',
                'error' => $mail_error_shop,
                'trace' => $e->getTraceAsString()
            ]);
            
            // GoogleChatにもエラー通知
            try {
                $error_chat_txt = "⚠️【メール送信エラー】精錬加工申込（店舗側）\n";
                $error_chat_txt .= "宛先: " . ($to ?? 'unknown') . "\n";
                $error_chat_txt .= "エラー: " . substr($mail_error_shop, 0, 200);
                
                $options = array(
                    'http' => array(
                        'method'=> 'POST',
                        'header'=> 'Content-Type: application/x-www-form-urlencoded',
                        'content' => http_build_query(array("text" => $error_chat_txt), "", "&")
                    )
                );
                $context = stream_context_create($options);
                file_get_contents('https://rifa.life/refastaProject/pushGoogleChatSpace/AAAAcclcL3M', false, $context);
            } catch (\Exception $chat_e) {
                // GoogleChat通知失敗は無視
            }
        }

        // お客様側へのメール送信（エラーハンドリング追加）
        $mail_error_visitor = null;
        try {
            $to = $email;
            $title = '【金地金精錬分割加工サービス申込完了】リファスタ';
            $type = 'refining_info';
            $send_type = 'visitor';
            Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type));
        } catch (\Exception $e) {
            $mail_error_visitor = $e->getMessage();
            \Log::error('精錬加工申込メール送信エラー（お客様側）', [
                'to' => $to ?? 'unknown',
                'error' => $mail_error_visitor,
                'trace' => $e->getTraceAsString()
            ]);
            
            // GoogleChatにもエラー通知
            try {
                $error_chat_txt = "⚠️【メール送信エラー】精錬加工申込（お客様側）\n";
                $error_chat_txt .= "宛先: " . ($to ?? 'unknown') . "\n";
                $error_chat_txt .= "エラー: " . substr($mail_error_visitor, 0, 200);
                
                $options = array(
                    'http' => array(
                        'method'=> 'POST',
                        'header'=> 'Content-Type: application/x-www-form-urlencoded',
                        'content' => http_build_query(array("text" => $error_chat_txt), "", "&")
                    )
                );
                $context = stream_context_create($options);
                file_get_contents('https://rifa.life/refastaProject/pushGoogleChatSpace/AAAAcclcL3M', false, $context);
            } catch (\Exception $chat_e) {
                // GoogleChat通知失敗は無視
            }
        }
        
        // 重複送信防止のため、セッションのregenerate
        // ブラウザリロード等での二重送信防止
        $request->session()->regenerateToken();

        // todo thanksページへリダイレクトさせる
        // thanksページはGETの静的ページで作成する。その時に、DBから情報取得して、必要情報を表示させる。
        // return redirect(......);
        return redirect('/refining_info/thanks?param=' . $angouka_mailaddress);

    }

    public function thanks()
    {
    // thankページにデータを渡す
    return view('refining_info.thanks', [
            'angouka_mailaddress' => $_GET['param'],
            ]);
    }
}
