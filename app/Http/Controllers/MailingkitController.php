<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Rules\SimpleMail;
use App\Chatwork\PushChatwork;

//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;

use App\Eoc_takuhai;
use App\Models\RefastaMypage2022\User_profile;
use App\Models\RefastaMypage2022\Delivery_form_token;
use App\Mypage\ServiceUser;// todo 使用していないので整理する

use Crypt;
use Illuminate\Support\Facades\Log;

class MailingkitController extends Controller
{
    use Send_sagawa_shuukairai;
  public $todouhuken = array(
    "北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県",
    "新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県",
    "奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県",
    "長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県"
  );

  public $ankeeto_word = array(
        "金",
        "プラチナ",
        "買取",
        "地金",
        "相場",
        "ダイヤ",
        "宝石",
        "宝飾",
        "売却",
        "売る",
        "東京",
        "池袋",
        "宅配",
        "見積もり",
        "高い",
        "安心",
        "業者",
        "ヴィトン",
        "シャネル",
        "エルメス",
        "ブランド品",
        "バッグ",
        "財布",
        "洋服",
        "アパレル品",
        "リサイクル",
        "不用品",
        "中古",
  );

  public $user_info_column_arr = array(
    'user_name' => 'user_name',
    'user_name_kana' => 'user_name_kana',
    'user_tel' => 'user_tel',
    'user_mail' => 'email',
    'user_yuubinn' => 'user_yuubinn',
    'user_todou' => 'address_1',
    'user_sikutyouson' => 'address_2',
    'user_banti' => 'address_3',
    'user_building' => 'address_4'
  );

  public $contract_at;

  public function make_3days_param()
  {
      //utm_source=3days_app&utm_medium=app&utm_campaign=3days
      if((isset($_GET["utm_campaign"])) && (($_GET["utm_campaign"]) === "3days")){
        $this->contract_at = Crypt::encryptString(date("Y-m-d"));
        return true;
      }else{
        return false;
      }
  }

  public function index(Request $request)
  {
    if(isset($_GET["test"])){
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        var_dump($_SERVER['HTTP_X_FORWARDED_FOR']);
      }
    }

    // $user = ServiceUser::user($request);
    $this->make_3days_param();

//    $service_user_id = $request->session()->get('service_user_id');
//    $user_info_arr = array();
//    if($service_user_id != ''){
//      $ServiceUser = ServiceUser::select('address_1', 'address_2', 'address_3', 'address_4', 'email', 'user_name', 'user_name_kana', 'user_yuubinn', 'user_tel')->where("id", $service_user_id)->first();
//
//      $ServiceUser->user_name = $this->decrypt_mypage($ServiceUser->user_name);
//      $ServiceUser->user_name_kana = $this->decrypt_mypage($ServiceUser->user_name_kana);
//      $ServiceUser->user_tel = $this->decrypt_mypage($ServiceUser->user_tel);
//      $ServiceUser->address_1 = $this->decrypt_mypage($ServiceUser->address_1);
//      $ServiceUser->address_2 = $this->decrypt_mypage($ServiceUser->address_2);
//      $ServiceUser->address_3 = $this->decrypt_mypage($ServiceUser->address_3);
//      $ServiceUser->address_4 = $this->decrypt_mypage($ServiceUser->address_4);
//
//      foreach($this->user_info_column_arr as $column_key => $column_name)
//      {
//        $user_info_arr[$column_key] = $ServiceUser->$column_name;
//      }
//    }
      $user_info_arr = $this->links_mypage_data($request);

    $wday_array = array("日","月","火","水","木","金","土");
    $year = date("Y");
    $hours = date("G");
    $minit = date("i");

    $month[1] = date("n");
    $day[1] = date("j");
    $wday[1] = $wday_array[date("w")];
    $kongetu = "{$year}年{$month[1]}月";
    $basic_nissuu = 14; // ベーシックのカレンダー表示日数
    for ($i = 0; $i <= $basic_nissuu; $i++) {
      $month[$i+2] = date("n", strtotime('+'.($i+1).' day'));
      $day[$i+2] = date("j", strtotime('+'.($i+1).' day'));
      $wday[$i+2] = $wday_array[date("w", strtotime('+'.($i+1).' day'))];
      $td_day[($i+1)] = "{$day[($i+1)]}日<br>({$wday[($i+1)]})";
    }
    $sel[1] = "9～12時";
    $sel[2] = "12～15時";
    $sel[3] = "15～18時";
    $sel[4] = "18～21時";
    $sel[5] = ""; // apiの区分により廃止
    // if(isset($_GET["sg_test"])){
    //     $sel[1] = "9～12時";
    //     $sel[2] = "12～15時";
    //     $sel[3] = "15～18時";
    //     $sel[4] = "18～21時";
    //     $sel[5] = ""; // apiの区分により廃止
    // }else{
    $basic_sel[1] = "午前中";
    $basic_sel[2] = "12～14時";
    $basic_sel[3] = "14～16時";
    $basic_sel[4] = "16～18時";
    $basic_sel[5] = "18～21時";
    // }
    // 当日計算
    // 午前中⇨デフォルトアウト
    // 12～14時⇨12時でアウト
    // 14時以降、全てアウト
    // 4月9日 11:45

    if($hours < 12){//12時まで
      $nowtime = 1;//1つ目までアウト
    }elseif($hours < 14){//12~14時まで
      $nowtime = 2;//2つ目までアウト
    }else{//16時以降
      $nowtime = 5;//5つ目まで全てアウト
    }

    for ($i=1; $i <= 5; $i++) {
      if($i <= $nowtime){
        $today_time[$i] = "<span class='out_time'>×</span>";
      }else{
        //いったん当日全てアウト
        $today_time[$i] = "<span class='out_time'>×</span>";
        // $today_time[$i] = "<span class='ok_time'>◎</span>";
      }
    }
    if($nowtime == 5){
      $today_time[5] = "<span class='out_time'>×</span>";
    }


    $today_time[1] = "<span class='out_time'>×</span>";

    // // スピード
    //15時以降は、全てアウト
    $tomorroww_morning = "<span class='ok_time'>◎</span>";
    $tomorroww_all = "<span class='ok_time'>◎</span>";
    $tomorroww_12 = "<span class='ok_time'>◎</span>"; // 12〜15時
    $two_days_later_morning = "<span class='ok_time'>◎</span>";
    $two_days_later_all = "<span class='ok_time'>◎</span>";
    $two_days_later_12 = "<span class='ok_time'>◎</span>";  // 12〜15時
    $three_days_later_morning = "<span class='ok_time'>◎</span>";
    $three_days_later_all = "<span class='ok_time'>◎</span>";
    $three_days_later_12 = "<span class='ok_time'>◎</span>";  // 12〜15時

    // 佐川API
    // 前日の17時までの取り込みでOKの為、余裕をもって16時に締め切り
    // 16時以降は、翌日不可。
    if ($hours >= 16) {
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_all = "<span class='out_time'>×</span>";
    }

        /**
     * キット無し 2023GW
     */


     if((date("ymd") == "230505" && ($hours >= 16))){
      for($stop_i = 0; $stop_i < 5; $stop_i++) {
        $today_time[$stop_i] = "<span class='out_time'>×</span>";
      }
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_all = "<span class='out_time'>×</span>";
      $two_days_later_morning = "<span class='out_time'>×</span>";
      $two_days_later_all = "<span class='out_time'>×</span>";
      $three_days_later_morning = "<span class='out_time'>×</span>";
      $three_days_later_12 = "<span class='out_time'>×</span>";
    }

    if(date("ymd") == "230506"){
      for($stop_i = 0; $stop_i < 5; $stop_i++) {
        $today_time[$stop_i] = "<span class='out_time'>×</span>";
      }
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_all = "<span class='out_time'>×</span>";
      $two_days_later_morning = "<span class='out_time'>×</span>";;
      $two_days_later_12 = "<span class='out_time'>×</span>";
    }

    if(date("ymd") == "230507"){
      for($stop_i = 0; $stop_i < 5; $stop_i++) {
        $today_time[$stop_i] = "<span class='out_time'>×</span>";
      }
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_12 = "<span class='out_time'>×</span>";
    }

    if(date("ymd") == "230508"){
        $today_time[2] = "<span class='out_time'>×</span>";
    }



    // 日:0  月:1  火:2  水:3  木:4  金:5  土:6
    // ベーシック
    $basic_all_list = array();
    for ($i = 0; $i <= $basic_nissuu; $i++) {
      $basic_all_list[] = "<span class='ok_time'>◎</span>";
    }


    /**
     * 2023 GWベーシック(キット有り)対応
     * 1. 5/3(金) 12:00以降になったら5/3〜5/6まで選択出来ないようにする
     */
    if(date("ymd") == "240503"){
      if($hours >= 12){
        for($stop_i = 0; $stop_i < 2; $stop_i++) {
          $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
      }
    }
    if(date("ymd") == "240504"){
      for($stop_i = 0; $stop_i < 1; $stop_i++) {
        $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
      }
    }



    // =========================================
    // 年末年始対応（テスト機能付き）
    // 年末年始ベーシック制御（キットあり）
    //　毎年自動で更新できる、確認したい場合は$is_testをtrueに変更して確認して下さい。
    // =========================================

    // ★★★ 切り替え ★★★
    // テスト時：true  本番時：false
    $is_test = false;

    $date = date("md");  // 月日のみ（例：1227, 0101）
    $basic_first_available_time_index = 1;

    if ($is_test) {
        $hours = 12;
        $date = "1227";  // 月日のみでテスト

        // 日付配列を12/27基準で再生成
        $test_base_date = date("Y") . "-12-27";  // 現在の年を自動取得
        $month[1] = date("n", strtotime($test_base_date));
        $day[1] = date("j", strtotime($test_base_date));
        $wday[1] = $wday_array[date("w", strtotime($test_base_date))];
        
        for ($i = 0; $i <= $basic_nissuu; $i++) {
            $month[$i+2] = date("n", strtotime($test_base_date . ' +'.($i+1).' day'));
            $day[$i+2] = date("j", strtotime($test_base_date . ' +'.($i+1).' day'));
            $wday[$i+2] = $wday_array[date("w", strtotime($test_base_date . ' +'.($i+1).' day'))];
            $td_day[($i+1)] = "{$day[($i+1)]}日<br>({$wday[($i+1)]})";
        }
    }

    // 年末年始制御（月日のみで判定 → 毎年自動対応）
    if ($date == "1227" && $hours >= 12) {
        for ($stop_i = 0; $stop_i < 10; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "1228") {
        for ($stop_i = 0; $stop_i < 9; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "1229") {
        for ($stop_i = 0; $stop_i < 8; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "1230") {
        for ($stop_i = 0; $stop_i < 7; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "1231") {
        for ($stop_i = 0; $stop_i < 6; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "0101") {
        for ($stop_i = 0; $stop_i < 5; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "0102") {
        for ($stop_i = 0; $stop_i < 4; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "0103") {
        for ($stop_i = 0; $stop_i < 3; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    if ($date == "0104") {
        for ($stop_i = 0; $stop_i < 2; $stop_i++) {
            $basic_all_list[$stop_i] = "<span class='out_time'>×</span>";
        }
        $basic_first_available_time_index = 4;
    }
    // １２時以降
    if($hours >= 12){
      // 翌日全てアウト
      $basic_all_list[0] = "<span class='out_time'>×</span>";
      //土曜日 翌々日がアウト
      if(date('w')==6){
        $basic_all_list[1] = "<span class='out_time'>×</span>";
      }
    }
    //　日曜日
    // いつでも翌日アウト
    if(date('w')==0){
      $basic_all_list[0] = "<span class='out_time'>×</span>";
    }


    // =========================================
    // 年末年始スピード制御（キット無し）
    // 12/27 12:00以降〜1/4 → 1/6 15~18時から
    // =========================================
    $speed_first_available_time_index = 1;
    $nenmatsu_speed_dates = ["1228", "1229", "1230", "1231", "0101", "0102", "0103", "0104"];

    // テスト時は $date と $hours は既に上で設定済み
    $is_nenmatsu_speed = ($date == "1227" && $hours >= 12) || in_array($date, $nenmatsu_speed_dates);

    if ($is_nenmatsu_speed) {
        // 翌日〜3日後を全て×
        $tomorroww_morning = "<span class='out_time'>×</span>";
        $tomorroww_all = "<span class='out_time'>×</span>";
        $tomorroww_12 = "<span class='out_time'>×</span>";
        $two_days_later_morning = "<span class='out_time'>×</span>";
        $two_days_later_all = "<span class='out_time'>×</span>";
        $two_days_later_12 = "<span class='out_time'>×</span>";
        $three_days_later_morning = "<span class='out_time'>×</span>";
        $three_days_later_all = "<span class='out_time'>×</span>";
        $three_days_later_12 = "<span class='out_time'>×</span>";
        $speed_first_available_time_index = 3; // 15~18時
    }


    $haisou_hosyou = array();
    for ($i=400000; $i <= 50000000; $i+=100000) {
    $haisou_hosyou[] = number_format($i);
    }
    $ankeeto_word = $this->ankeeto_word;

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
    try {
      $pp_url = "https://urlounge.co.jp/policy_notice/policy_notice.php";
      $pp_html = file_get_contents($pp_url, false, $context);
    } catch (\Exception $e) {
      $pp_url = "http://urlounge.co.jp/policy_notice/policy_notice.php";
      $pp_html = file_get_contents($pp_url, false, $context);
    }


    $todouhuken = $this->todouhuken;


    $holiday_url = "https://rifa.life/refastaProject/get_wp_posts/35043?block_id=40825";
    try {
        $holiday_banner = file_get_contents($holiday_url, false, $context);
    } catch (\Exception $e) {
        Log::error("休日バナー取得エラー: " . $e->getMessage());
        $holiday_banner = ""; // デフォルト値
    }

    if(isset($_GET["takuhaitest"])){
      $view_file = "mailingkit.test";
    }else{
      $view_file = "mailingkit.index";
    }

    return view($view_file,[
      "holiday_banner" => $holiday_banner,
      "todouhuken" => $todouhuken,
      "user_info_arr" => $user_info_arr,
      "month" => $month,
      "day" => $day,
      "wday" => $wday,
      "kongetu" => $kongetu,
      "td_day" => $td_day,
      "sel" => $sel,
      "basic_sel" => $basic_sel,
      "today_time" => $today_time,
      "tomorroww_morning" => $tomorroww_morning,
      "tomorroww_all" => $tomorroww_all,
      "tomorroww_12" => $tomorroww_12,
      "two_days_later_morning" => $two_days_later_morning,
      "two_days_later_all" => $two_days_later_all,
      "two_days_later_12" => $two_days_later_12,
      "three_days_later_morning" => $three_days_later_morning,
      "three_days_later_all" => $three_days_later_all,
      "three_days_later_12" => $three_days_later_12,
      "haisou_hosyou" => $haisou_hosyou,
      "ankeeto_word" => $ankeeto_word,
      "pp_html" => $pp_html,
      "kiyaku_html" => $kiyaku_html,
      "basic_all_list" => $basic_all_list,
      "contract_at" =>  $this->contract_at,
      "basic_nissuu" => $basic_nissuu,
      "basic_first_available_time_index" => $basic_first_available_time_index,
      "speed_first_available_time_index" => $speed_first_available_time_index,
      "is_nenmatsu_speed" => $is_nenmatsu_speed,
    ]);
  }

  public function submit(Request $request)
  {
    Log::info('=== MailingkitController@submit 開始 ===');
    Log::info('リクエストデータ:', $request->all());

    $aaaaaaaaaa = $_SERVER["HTTP_X_FORWARDED_HOST"] ?? "";
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      if (isset($_SERVER["REMOTE_ADDR"])) {
          $ip = $_SERVER["REMOTE_ADDR"];
      } else {
          $ip = "1.1.1.1"; // dummy
      }

      $ip = str_replace(" ", "", $ip);

      // Honeypot field check：入力されてたら処理中止：ロボット対策
      if ($request->filled('hp_field')) {
          return redirect('/info');
      }

      // Stream contextを作成
      $context = stream_context_create([
          'ssl' => [
              'verify_peer'      => false,
              'verify_peer_name' => false
          ]
      ]);

      $kaigai_url = "https://rifa.life/refastaProject/kaigaiiphanbetsu/{$ip}";
      try {
          $kaigai_html = file_get_contents($kaigai_url, false, $context);
      } catch (\Exception $e) {
          Log::error("海外IP判定エラー: " . $e->getMessage());
          $kaigai_html = "JP"; // デフォルト値
      }

      if(
          ($kaigai_html !== "")
          &&
          ($kaigai_html !== "JP")
      ){
          return redirect("/404/");
      }

    //sessionにservice_user_idがあればmypage情報を更新する処理
    $service_user_id = $request->session()->get('service_user_id');
    $insert_service_user_id = null;
    if($service_user_id > 0){
      $ServiceUser = ServiceUser::find($service_user_id);
      if($ServiceUser != false){
        foreach($this->user_info_column_arr as $column_key => $column_name)
        {
          if(
            ($column_name == 'user_name')
            or($column_name == 'user_name_kana')
            or($column_name == 'user_tel')
            or($column_name == 'address_1')
            or($column_name == 'address_2')
            or($column_name == 'address_3')
            or($column_name == 'address_4')
          ){
            $update_data = $this->encrypt_mypage($request->$column_key);
          }else{
            $update_data = $request->$column_key;
          }
          $ServiceUser->$column_name = $update_data;
        }
        $ServiceUser->save();
        $insert_service_user_id = $service_user_id;
      }
    }

    if(isset($request->brand_confirm)){
      $brand_confirm = '同意する';
    }else{
      $brand_confirm = '';
    }

    $user_name = $request->user_name;
    // $user_name = str_replace(' ','　',$user_name);
    // $user_name = trim($user_name, "　");
    $user_name = preg_replace("/\A[\x20\xE3\x80\x80]++|[\x20\xE3\x80\x80]++\z/u", '', $user_name);
    $user_name = mb_convert_kana($user_name,'KVa');

    $user_name_kana = $request->user_name_kana;
    // $user_name_kana = str_replace(' ','　',$user_name_kana);
    // $user_name_kana = trim($user_name_kana, "　");
    $user_name_kana = preg_replace("/\A[\x20\xE3\x80\x80]++|[\x20\xE3\x80\x80]++\z/u", '', $user_name_kana);
    $user_name_kana = mb_convert_kana($user_name_kana,'KVa');

    $user_tel = $request->user_tel;
    $user_tel = preg_replace("/[^0-9]/","","$user_tel");
    $user_yuubinn = $request->user_yuubinn;
    $user_yuubinn = preg_replace("/[^0-9]/","","$user_yuubinn");

    $user_mail = $request->user_mail;
    $user_mail = mb_convert_kana($user_mail,'a');
    if ($user_mail == "sample@email.tst") {
      return redirect("/404/");
    }

    $angouka_mailaddress = md5(htmlspecialchars($user_mail));
    $angouka_mailaddress = substr($angouka_mailaddress, 0, 8);

    $user_sikutyouson = $request->user_sikutyouson;
    $user_sikutyouson = mb_convert_kana($user_sikutyouson,'KVA');
    $user_banti = $request->user_banti;
    $user_banti = mb_convert_kana($user_banti,'KVA');
    $user_banti_only = $user_banti;//番地をそのまま使うため
    $user_building = $request->user_building;
    $user_building = mb_convert_kana($user_building,'KVA');
    $user_banti = $user_banti.$user_building;

    $need_kit = $request->need_kit;//梱包キット
    $time_select_none = $request->time_select_none;//配送日時指定
    $insurance = $request->insurance;//配送補償
    $date_and_time_hidden = $request->date_and_time_hidden;//集荷希望日時
    $date_select_hidden = "";
    $time_select_hidden = "";
    $time_select_hidden = $request->time_select_hidden;//配送日時希望日時
    if($time_select_hidden != ""){
      $select_hidden_array = explode(' ',$time_select_hidden);
      $date_select_hidden_array = explode('(',$select_hidden_array[0]);
      $date_select_hidden = $date_select_hidden_array[0];
      $date_select_hidden = explode('/',$date_select_hidden);
      if($date_select_hidden[0]<10){
        $date_select_hidden[0] = "0".$date_select_hidden[0];
      }
      if($date_select_hidden[1]<10){
        $date_select_hidden[1] = "0".$date_select_hidden[1];
      }
      $date_select_hidden = $date_select_hidden[0].$date_select_hidden[1];
      $date_select_hidden = date('Y').$date_select_hidden;
      $date_select_hidden = date('Y-m-d',strtotime("$date_select_hidden"));
      $time_select_hidden = $select_hidden_array[1];
    }
    $number_of_times = $request->number_of_times;//ご利用回数
    $user_todou = $request->user_todou;//都道府県
    $tel_mail_line = $request->tel_mail_line;//希望連絡方法
    $bikou = $request->bikou;//備考欄
    $line_satei = $request->line_satei;//事前査定

    // 配送補償金額
    $insurance_kingaku = $request->insurance_kingaku;
     $user_building = $request->user_building;//建物名
    $speed_box = $request->speed_box;//発送予定箱数

    if($need_kit=='希望する'){
      $speed_box = '';
      $date_and_time_hidden = '';
      $kit_denpyou = 1;
      $kit_huutou = $request->kit_count_k;
      $kit_S = $request->kit_count_s;
      $kit_M = $request->kit_count_m;
      $kit_L = $request->kit_count_l;
      if($insurance=='なし'){
        $insurance_kingaku = '0';
      }
      if($time_select_none=='指定しない'){
        $date_select_hidden = '';
        $time_select_hidden = '';
      }
    }else{
      $kit_denpyou = '0';
      $kit_huutou = '0';
      $kit_S = '0';
      $kit_M = '0';
      $kit_L = '0';
      $insurance = '';
      $time_select_none = '';
      $insurance_kingaku = '0';
      $date_select_hidden = '';
      $time_select_hidden = '';
    }



    $kit_detail_insert = "";
    if($need_kit == '希望する'){
      $kit_detail_insert .= 'クッション封筒：'.$kit_huutou;
      $kit_detail_insert .= 'ダンボールS：'.$kit_S;
      $kit_detail_insert .= 'ダンボールM：'.$kit_M;
      $kit_detail_insert .= 'ダンボールL：'.$kit_L;
    }
    $datetime = date("Y/m/d H:i:s");

    // $ankeeto_word = $this->ankeeto_word;
    // $anke_3 = "";
    // $index = 0;
    // foreach($ankeeto_word as $val){
    //   $item_name = 'anke_3_'.$index;
    //   if($request->$item_name != ''){
    //     if($anke_3 != ""){
    //       $anke_3 .= ",";
    //     }
    //     $anke_3 .= $val;
    //   }
    //   $index++;
    // }

    // $anke_2 = $request->anke_2;
    // $anke_1 = $request->anke_1;
    // $anke_3_text = $request->anke_3_text;
    // $anke_2_text = $request->anke_2_text;
    // $anke_1_text = $request->anke_1_text;

    // $insert_anke_1 = "";
    // if($anke_1!=""){
    //   $insert_anke_1 .= $anke_1;
    // }
    // if($anke_1_text!=""){
    //   if($insert_anke_1 != ""){
    //     $insert_anke_1 .= "\n";
    //   }
    //   $insert_anke_1 .= $anke_1_text;
    // }
    // $insert_anke_2 = "";
    // if($anke_2!=""){
    //   $insert_anke_2 .= $anke_2;
    // }
    // if($anke_2_text!=""){
    //   if($insert_anke_2 != ""){
    //     $insert_anke_2 .= "\n";
    //   }
    //   $insert_anke_2 .= $anke_2_text;
    // }
    // $insert_anke_3 = "";
    // if($anke_3!=""){
    //   $insert_anke_3 .= $anke_3;
    // }
    // if($anke_3_text!=""){
    //   if($insert_anke_3 != ""){
    //     $insert_anke_3 .= "\n";
    //   }
    //   $insert_anke_3 .= $anke_3_text;
    // }

    $cv_site = "";
    if(isset($_SERVER["HTTP_X_FORWARDED_HOST"])){
      $cv_site = $_SERVER["HTTP_X_FORWARDED_HOST"];
    }

    //validation
    //validation定義
    // nameの値　：　validationルール

    // validation laravel 5.5 日本語リファレンス
    // https://readouble.com/laravel/5.5/ja/validation.html
    // validationの中身も妥当かチェックしておく。emailはとくに注意。
    $kit_detail_array = array();
    if($need_kit=="希望する"){
      $kit_detail_array['kit_sum'] = 'min:1';
      if($time_select_none == "指定する"){
        $kit_detail_array['time_select_hidden'][] = 'required';
        if($user_mail == "s.tamiya@urlounge.co.jp"){
          $kit_detail_array['time_select_hidden'][] = function ($attribute, $value, $fail)
          {
            $fail_word = '集荷可能な時間ではありません。再度集荷日時の選択をお願いします。';
            if(date("H") > 11){
              $tommorow = date("n/d", strtotime("+1 day"));
              if(strpos($value, $tommorow) !== false){
                return $fail($fail_word);
              }
              if(date('w')==6){
                // if(date('w')==1){
                $two_days_later = date("n/d", strtotime("+2 day"));
                if(strpos($value, $two_days_later) !== false){
                  return $fail($fail_word);
                }
              }
            }
            if(date('w')==0){
              $tommorow = date("n/d", strtotime("+1 day"));
              if(strpos($value, $tommorow) !== false){
                return $fail($fail_word);
              }
            }
          };
        }
      }

      if($insurance == "あり"){
        $kit_detail_array['insurance_kingaku'] = 'required';
      }

      $type_selection = 'ベーシックタイプ';
      $ttl_type = 'ベーシック';
    }else{
      $kit_detail_array['speed_box'] = 'required';
      $kit_detail_array['date_and_time_hidden'][] = 'required';
      if($user_mail == "s.tamiya@urlounge.co.jp"){
        $kit_detail_array['date_and_time_hidden'][] = function ($attribute, $value, $fail)
        {
          $fail_word = '集荷可能な時間ではありません。再度集荷日時の選択をお願いします。';
          if(date("H") > 13){
            $tommorow = date("n/d", strtotime("+1 day"));
            if(strpos($value, $tommorow) !== false){
              return $fail($fail_word);
            }
            if(date('w')==6){
              // if(date('w')==1){
              $two_days_later = date("n/d", strtotime("+2 day"));
              if(strpos($value, $two_days_later) !== false){
                return $fail($fail_word);
              }
            }
          }
          if(date('w')==0){
            $tommorow = date("n/d", strtotime("+1 day"));
            if(strpos($value, $tommorow) !== false){
              return $fail($fail_word);
            }
          }

        };
      }
      $type_selection = 'スピードタイプ';
      $ttl_type = 'スピード';
    }
    // var_dump($kit_detail_array);

    $validate_rule = [
      'user_name' => 'required',
      'user_name_kana' => 'required',
      'user_tel' => [
        'required',
        'numeric',
      ],
      'user_mail' => ['required' , new SimpleMail],
      'user_yuubinn' => [
        'required',
        'numeric',
      ],
      'user_todou' => 'required',
      'user_sikutyouson' => 'required',
      'user_banti' => 'required',
      'kiyaku_check' => 'accepted',
    ];


    $validate_rule = array_merge($validate_rule, $kit_detail_array);
    // var_dump($validate_rule);

    if(isset($_SERVER['HTTP_X_FORWARDED_HOST'])){
      if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com")){
        $validate_rule = array_merge($validate_rule, ['brand_confirm' => 'accepted']);
      }
    }

    //validation実行
    Log::info('バリデーションルール:', $validate_rule);
    $this->validate($request,$validate_rule);
    Log::info('バリデーション通過');

    // エラー検知が終わった後


    // メール送信
    // Mailクラスを利用する。設定は.env
    if(isset($_SERVER['HTTP_X_FORWARDED_HOST'])){
      $HTTP_X_FORWARDED_HOST = $_SERVER['HTTP_X_FORWARDED_HOST'];
      if(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "diakaimasu.jp")){
        $store_title = '【宅配申込】diakai';
      }elseif(stristr($_SERVER['HTTP_X_FORWARDED_HOST'], "brandkaimasu.com")){
        $store_title = '【宅配申込】brakai';
      }else{
        $store_title = '【宅配申込】kinkai';
      }
    }else{
      $HTTP_X_FORWARDED_HOST = '';
      $store_title = '【宅配申込】（買取サイト以外）';
    }

    $headers = getallheaders();
    if(isset($headers["User-Agent"])){
      $user_agent = $headers["User-Agent"];
    }elseif(isset($headers["user-agent"])){
      $user_agent = $headers["user-agent"];
    }
    // ユーザーエージェント判別
    if ((strpos($user_agent, 'iPhone') !== false) || ((strpos($user_agent, 'Android') !== false) && (strpos($user_agent, 'Mobile') !== false))
    || (strpos($user_agent, 'Windows Phone') !== false)
    || (strpos($user_agent, 'BlackBerry') !== false) || (strpos($user_agent, 'BB10') !== false) || (strpos($user_agent, 'Passport') !== false)) {
    $ua_data = "sp";
    $cv_device = 'SP';
    }else{
    $ua_data ="pc";
    $cv_device = 'PC';
    }
    $cv_page = 'delivery';
    if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
      $REMOTE_ADDR = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else{
      $REMOTE_ADDR = "";
    }

    $store_title .= $ttl_type.'/'.$cv_device;



    $kit_detail = "";
    //////////////////////chat//////////////////////
    $chat_txt = "";
    $chat_txt .= "●ご利用回数：{$number_of_times}\n";
    $chat_txt .= "●梱包キット：{$need_kit}\n";

    if($need_kit == '希望する'){
      $kit_detail .= 'クッション封筒：'.$kit_huutou."\n";
      $kit_detail .= 'ダンボールS：'.$kit_S."\n";
      $kit_detail .= 'ダンボールM：'.$kit_M."\n";
      $kit_detail .= 'ダンボールL：'.$kit_L;
      $chat_txt .= "●キット詳細:\n".$kit_detail."\n";
      $chat_txt .= "●配送希望日時：{$time_select_hidden}\n";
    }else{
      $chat_txt .= "●発送予定箱数：{$speed_box}\n";
      $chat_txt .= "●希望集荷日時：{$date_and_time_hidden}\n";
    }
    if($request->contract_at != ""){
      $request->contract_at = Crypt::decryptString($request->contract_at);
      $chat_txt .= "●3days利用：あり\n";
    }else{
      $request->contract_at = NULL;
      $chat_txt .= "●3days利用：なし\n";
    }
    $chat_txt .= "●お名前：{$user_name} 様\n";
    $chat_txt .= "●備考：{$bikou}\n";
    $chat_txt .= "●都道府県：{$user_todou}\n";
    $chat_txt .= "●事前査定：{$line_satei}\n";
    $chat_txt .= "●市区町村：{$user_sikutyouson}\n";
    $chat_txt .= "●配送補償：{$insurance}\n";
    if($insurance=='あり'){
      $chat_txt .= "●配送補償対象金額：{$insurance_kingaku}円\n";
    }


    if(preg_match("/kinkai/",$cv_site)){
      $stamp = "(F)";
      $domain = 'kinkai';
    }elseif(preg_match("/brand/",$cv_site)){
      $stamp = "(beer)";
      $domain = 'brakai';
    }elseif(preg_match("/diakai/",$cv_site)){
      $stamp = "(devil)";
      $domain = 'diakai';
    }elseif(preg_match("/kimono/",$cv_site)){
      $stamp = "(eat)";
      $domain = 'kimono';

    }else{
      $stamp = "〇";
      $domain = 'localhost';
    }

    if($type_selection == "スピードタイプ"){
      $speed_flag = '(h)';
      $ttl_type = 'スピード';
    }else{
      $speed_flag = '';
      $ttl_type = 'ベーシック';
    }
    // スピードの時のみ、佐川API自動集荷発動
    // テスト送信パラメータがあったら、APIを発射しない
    $send_opt = htmlspecialchars($request->send_opt ?? '', ENT_QUOTES, "UTF-8");

    if($send_opt != 'test'){
      if ($type_selection == "スピードタイプ") {
        try {
          $this->send_sagawa_shuukairai(
            $user_todou,
            $user_sikutyouson,
            $user_banti_only,
            $user_building,
            $user_name_kana,
            $user_yuubinn,
            $user_tel,
            $user_mail,
            $speed_box,
            $date_and_time_hidden
          );
        } catch (\Throwable $th) {
          //throw $th;
        }
      }
    }

    $chat_txt = str_replace("&","＆",$chat_txt);
    $chat_text_body = "[info][title]{$stamp}【宅配申込】{$domain}{$ttl_type}/{$cv_device} {$datetime} {$speed_flag}[/title]";
    $chat_text_body .= $chat_txt;
    $chat_text_body .= "[/info]";
    $cw = new PushChatwork;
    $msg = $chat_text_body;
    if(env("APP_DEBUG", false) == true){
        $room='68102709';
    }else{
        $room='84134721';
    }

    $token='bot';
    // $cw->Push($msg,$room,$token);

    $options = array(
      // HTTPコンテキストオプションをセット
      'http' => array(
        'method'=> 'POST',
        'header'=> 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query(array(
          "text" => "【宅配申込】{$domain}{$ttl_type}/{$cv_device} {$datetime} {$speed_flag}\n" . $chat_txt,
        ), "", "&")
      ),
      'ssl' => array(
        'verify_peer'      => false,
        'verify_peer_name' => false
      )
    );
    $context = stream_context_create($options);
    $send_space = 'AAAAcclcL3M';
    try{
      file_get_contents('https://rifa.life/refastaProject/pushGoogleChatSpace/' . $send_space , false, $context);
    }catch(\Exception $e){
      Log::error("Google Chat通知エラー: " . $e->getMessage());
    }

// ▼▼▼▼▼▼▼▼▼ n8n 追加コード ここから (cURL使用) ▼▼▼▼▼▼▼▼▼
    // 1. Webhook URLの定義（このURLは変更しないでください）
    $n8n_url = 'https://hoshinosubaru-web-mitsui.hf.space/webhook/38e84cd8-943d-4b4e-9921-0803c5b2db26'; 
    
    // 2. n8nに送るデータ（JSON形式で送りやすいように配列化）
    $n8n_payload = array(
        "text" => "【宅配申込】{$domain}{$ttl_type}/{$cv_device} {$datetime} {$speed_flag}\n" . $chat_txt,
        "raw_data" => array(
            "user_name" => $user_name,
            "email" => $user_mail,
            "tel" => $user_tel,
            "pref" => $user_todou,
            "site_domain" => $domain,
            "device" => $cv_device,
            "type" => $ttl_type
        )
    );

    // 3. cURLを使った安定的なリクエスト送信
    $ch = curl_init($n8n_url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($n8n_payload)); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($n8n_payload)))
    );
    // タイムアウトを短く設定し、n8n側のエラーでフォーム送信が止まらないようにする
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); 

    try{
        // リクエスト実行
        curl_exec($ch);
    }catch(\Exception $e){
        // n8nへの送信が失敗しても、メインの処理は止めない
        // 必要であればログ出力など
    }finally {
        // cURLセッションを閉じる
        curl_close($ch);
    }

// ▲▲▲▲▲▲▲▲▲ n8n 追加コード ここまで ▲▲▲▲▲▲▲▲▲


    //////////////////////end chat//////////////////////


    //////////////////////DB保存//////////////////////
    Log::info('DB保存開始');
    Log::info('insurance_kingaku値:', ['insurance_kingaku' => $insurance_kingaku, 'type' => gettype($insurance_kingaku)]);

    // 現在のmailingkit同様、買取サーバーDBへ。モデル作って保存するだけ。
    try {
    $Eoc_takuhai = Eoc_takuhai::insert([
      'brand_confirm' => $brand_confirm,
       'number_of_times' => $number_of_times,
       'time_select_hidden' => $time_select_hidden,
       'date_select_hidden' => "$date_select_hidden",
       'speed_box' => $speed_box,
       'date_and_time_hidden' => "$date_and_time_hidden",
       'user_name' => $user_name,
       'user_name_kana' => $user_name_kana,
       'user_tel' => $user_tel,
       'user_mail' => $user_mail,
       'user_yuubinn' => $user_yuubinn,
       'user_todou' => $user_todou,
       'user_sikutyouson' => $user_sikutyouson,
       'user_banti' => $user_banti,
       'tel_mail_line' => $tel_mail_line,
       'bikou' => $bikou,
       'insurance' => $insurance,
       'line_satei' => $line_satei,
       'insurance_kingaku' => $insurance_kingaku,
       'kit_denpyou' => $kit_denpyou,
       'kit_huutou' => $kit_huutou,
       'kit_S' => $kit_S,
       'kit_M' => $kit_M,
       'kit_L' => $kit_L,
       'kit_detail' => $kit_detail_insert,
      //  'anke_1' => $insert_anke_1,
      //  'anke_2' => $insert_anke_2,
      //  'anke_3' => $insert_anke_3,
       'cv_time' => $datetime,
       'cv_site' => $cv_site,
       'key_code' => $angouka_mailaddress,
       'USER_AGENT' => $user_agent,
       'REMOTE_ADDR' => $REMOTE_ADDR,
       'cv_device' => $cv_device,
       'cv_page' => $cv_page,
       'type_selection' => $type_selection,
       'service_users_id' => $request->input('service_users_id', null),
       'contract_at' => $request->contract_at,
       'ad_param' => $request->ad_param,
    ]);
    Log::info('DB保存完了');
    } catch (\Exception $e) {
      Log::error('DB保存エラー:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
      throw $e;
    }
//////////////////////end DB保存//////////////////////

    $input_values = $request;
    $to = env("MAIL_FROM_ADDRESS");
    $title = $store_title;
    $type = 'mailingkit';
    $send_type = 'shop';
    Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type));

    $input_values = $request;
    $to = $user_mail;
    $title = 'リファスタです【宅配買取申込完了】';
    $type = 'mailingkit';
    $send_type = 'visitor';
    Mail::to($to)->send(new PushMessage($input_values,$title,$type,$send_type));

    // 処理エラーが無ければ完了画面の表示
    // ブラウザリロード等での二重送信防止
    $request->session()->regenerateToken();


    //フォームから受け取ったすべてのinputの値を取得
    $inputs = $request->all();

    // LINE cv用のフラグ
    $success_cv = true;
    //入力内容確認ページのviewに変数を渡して表示
    return view('mailingkit.thanks', [
        'inputs' => $inputs,
        'angouka_mailaddress' => $angouka_mailaddress,
        'HTTP_X_FORWARDED_HOST' => $HTTP_X_FORWARDED_HOST,
        'success_cv' => $success_cv,
    ]);
  }//end submit

    /**
     * refasta_mypage_2022のユーザーデータ連携
    * @param Request $request
    * @return false|void
    */
  public function links_mypage_data(Request $request)
  {
    $token = $request->input('token', null);
    if ($token === null) return false;

    $now = Carbon::now();
    $deliveryFormToken = Delivery_form_token::where('token', $token)->where('token_limit', '>=', $now)->first();
    if ($deliveryFormToken === null) return false;

    $userProfile = User_profile::where('user_id', $deliveryFormToken->user_id)->first();
    if ($userProfile === null) return false;

    $user_info_arr = array();
    $user_info_arr['service_users_id'] = $userProfile->user_id;
    $user_info_arr['user_name'] = $userProfile->lastname . '　' . $userProfile->firstname;
    $user_info_arr['user_name_kana'] = $userProfile->furigana_lastname . '　' . $userProfile->furigana_firstname;
    $user_info_arr['user_tel'] = $userProfile->tel;
    $user_info_arr['user_mail'] = $userProfile->email;
    $user_info_arr['user_yuubinn'] = $userProfile->yubinnumber;
    $user_info_arr['user_todou'] = $userProfile->prefecture;
    $user_info_arr['user_sikutyouson'] = $userProfile->city;
    $user_info_arr['user_banti'] = $userProfile->town;
    $user_info_arr['user_building'] = $userProfile->below_address;
    return $user_info_arr;
  }

  //複号
  public function decrypt_mypage($val)
  {
    $base_uri = "https://rifa.life";
    $endpoint = "/refasta_master/api/crypt_func/decrypt";
    // POSTデータ
    $data = array(
        "data" => $val
    );
    // $data = http_build_query($data, "", "&");
    $data = json_encode($data);
    // header
    $header = array(
        "Content-Type: application/json",
        "Content-Length: ".strlen($data)
    );
    $context = array(
        "http" => array(
            "method"  => "POST",
            "header"  => implode("\r\n", $header),
            "content" => $data
        ),
        "ssl" => array(
            "verify_peer"      => false,
            "verify_peer_name" => false
        )
    );
    try {
        return file_get_contents($base_uri.$endpoint, false, stream_context_create($context));
    } catch (\Exception $e) {
        Log::error("Decrypt API エラー: " . $e->getMessage());
        return $val;
    }
  }

  public function encrypt_mypage($val)
  {
    $base_uri = "https://rifa.life";
    $endpoint = "/refasta_master/api/crypt_func/encrypt";
    // POSTデータ
    $data = array(
        "data" => $val
    );
    // $data = http_build_query($data, "", "&");
    $data = json_encode($data);
    // header
    $header = array(
        "Content-Type: application/json",
        "Content-Length: ".strlen($data)
    );
    $context = array(
        "http" => array(
            "method"  => "POST",
            "header"  => implode("\r\n", $header),
            "content" => $data
        ),
        "ssl" => array(
            "verify_peer"      => false,
            "verify_peer_name" => false
        )
    );
    try {
        return file_get_contents($base_uri.$endpoint, false, stream_context_create($context));
    } catch (\Exception $e) {
        Log::error("Encrypt API エラー: " . $e->getMessage());
        return $val;
    }
  }

}//end class
