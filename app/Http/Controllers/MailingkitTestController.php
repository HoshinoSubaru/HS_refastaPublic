<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\SimpleMail;
use App\Chatwork\PushChatwork;

//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;

use App\Eoc_takuhai;

use App\Mypage\ServiceUser;

use Crypt;
class MailingkitTestController extends Controller
{
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
//        utm_source=3days_app&utm_medium=app&utm_campaign=3days
        if(isset($_GET["utm_campaign"]) != "3days"){
            return false;
        }
        $this->contract_at = Crypt::encryptString(date("Y-m-d"));
        return true;
    }


  public function index(Request $request)
  {
    // $user = ServiceUser::user($request);
    $this->make_3days_param();

    $service_user_id = $request->session()->get('service_user_id');
    $user_info_arr = array();
    if($service_user_id != ''){
      $ServiceUser = ServiceUser::select('address_1', 'address_2', 'address_3', 'address_4', 'email', 'user_name', 'user_name_kana', 'user_yuubinn', 'user_tel')->where("id", $service_user_id)->first();

      $ServiceUser->user_name = $this->decrypt_mypage($ServiceUser->user_name);
      $ServiceUser->user_name_kana = $this->decrypt_mypage($ServiceUser->user_name_kana);
      $ServiceUser->user_tel = $this->decrypt_mypage($ServiceUser->user_tel);
      $ServiceUser->address_1 = $this->decrypt_mypage($ServiceUser->address_1);
      $ServiceUser->address_2 = $this->decrypt_mypage($ServiceUser->address_2);
      $ServiceUser->address_3 = $this->decrypt_mypage($ServiceUser->address_3);
      $ServiceUser->address_4 = $this->decrypt_mypage($ServiceUser->address_4);

      foreach($this->user_info_column_arr as $column_key => $column_name)
      {
        $user_info_arr[$column_key] = $ServiceUser->$column_name;
      }
    }



    $wday_array = array("日","月","火","水","木","金","土");
    $year = date("Y");
    $hours = date("G");
    $minit = date("i");

    $month[1] = date("n");
    $month[2] = date("n", strtotime('+1 day'));
    $month[3] = date("n", strtotime('+2 day'));
    $month[4] = date("n", strtotime('+3 day'));
    $month[5] = date("n", strtotime('+4 day'));
    $month[6] = date("n", strtotime('+5 day'));
    $month[7] = date("n", strtotime('+6 day'));
    $month[8] = date("n", strtotime('+7 day'));
    $month[9] = date("n", strtotime('+8 day'));
    $day[1] = date("j");
    $day[2] = date("j", strtotime('+1 day'));
    $day[3] = date("j", strtotime('+2 day'));
    $day[4] = date("j", strtotime('+3 day'));
    $day[5] = date("j", strtotime('+4 day'));
    $day[6] = date("j", strtotime('+5 day'));
    $day[7] = date("j", strtotime('+6 day'));
    $day[8] = date("j", strtotime('+7 day'));
    $day[9] = date("j", strtotime('+8 day'));
    $wday[1] = $wday_array[date("w")];
    $wday[2] = $wday_array[date("w", strtotime('+1 day'))];
    $wday[3] = $wday_array[date("w", strtotime('+2 day'))];
    $wday[4] = $wday_array[date("w", strtotime('+3 day'))];
    $wday[5] = $wday_array[date("w", strtotime('+4 day'))];
    $wday[6] = $wday_array[date("w", strtotime('+5 day'))];
    $wday[7] = $wday_array[date("w", strtotime('+6 day'))];
    $wday[8] = $wday_array[date("w", strtotime('+7 day'))];
    $wday[9] = $wday_array[date("w", strtotime('+8 day'))];

    $kongetu = "{$year}年{$month[1]}月";
    $td_day[1] = "{$day[1]}日<br>({$wday[1]})";
    $td_day[2] = "{$day[2]}日<br>({$wday[2]})";
    $td_day[3] = "{$day[3]}日<br>({$wday[3]})";
    $td_day[4] = "{$day[4]}日<br>({$wday[4]})";
    $td_day[5] = "{$day[5]}日<br>({$wday[5]})";
    $td_day[6] = "{$day[6]}日<br>({$wday[6]})";
    $td_day[7] = "{$day[7]}日<br>({$wday[7]})";
    $td_day[8] = "{$day[8]}日<br>({$wday[8]})";
    $td_day[9] = "{$day[9]}日<br>({$wday[9]})";

    $sel[1] = "午前中";
    $sel[2] = "12～14時";
    $sel[3] = "14～16時";
    $sel[4] = "16～18時";
    $sel[5] = "18～21時";

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
    // // 15時以降は、翌日午前中アウト
    // $tomorroww_morning = "<span class='ok_time'>◎</span>";
    // if($hours >= 15){
    //   $tomorroww_morning = "<span class='out_time'>×</span>";
    // }
    // // 17時以降は、全てアウト
    // $tomorroww_all = "<span class='ok_time'>◎</span>";
    // if($hours >= 17){
    //   $tomorroww_all = "<span class='out_time'>×</span>";
    // }

    //15時以降は、全てアウト
    $tomorroww_morning = "<span class='ok_time'>◎</span>";
    $tomorroww_all = "<span class='ok_time'>◎</span>";
    $two_days_later_morning = "<span class='ok_time'>◎</span>";
    $two_days_later_all = "<span class='ok_time'>◎</span>";
    $three_days_later_morning = "<span class='ok_time'>◎</span>";
    $three_days_later_all = "<span class='ok_time'>◎</span>";
    if($hours >= 15){
      // if($hours >= 10){
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_all = "<span class='out_time'>×</span>";
      if(date('w')==6){
        // if(date('w')==1){
        $two_days_later_morning = "<span class='out_time'>×</span>";
        $two_days_later_all = "<span class='out_time'>×</span>";
      }
    }else{
      if(date('w')==0){
        $tomorroww_morning = "<span class='out_time'>×</span>";
        $tomorroww_all = "<span class='out_time'>×</span>";
      }
    }

    if(date("ymd") == "210430"){
      if($hours >= 15){
        $tomorroww_morning = "<span class='out_time'>×</span>";
        $tomorroww_all = "<span class='out_time'>×</span>";
        $two_days_later_morning = "<span class='out_time'>×</span>";
        $two_days_later_all = "<span class='out_time'>×</span>";
        $three_days_later_morning = "<span class='out_time'>×</span>";
        $three_days_later_all = "<span class='out_time'>×</span>";
      }
    }
    if(date("ymd") == "210501"){
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_all = "<span class='out_time'>×</span>";
      $two_days_later_morning = "<span class='out_time'>×</span>";
      $two_days_later_all = "<span class='out_time'>×</span>";
    }

    if(date("ymd") == "210502"){
      $tomorroww_morning = "<span class='out_time'>×</span>";
      $tomorroww_all = "<span class='out_time'>×</span>";
    }


    // 日:0  月:1  火:2  水:3  木:4  金:5  土:6
    // ベーシック
    // 翌日
    $basic_tomorroww_all = "<span class='ok_time'>◎</span>";
    // 翌々日
    $basic_two_days_later_all = "<span class='ok_time'>◎</span>";
    // 翌翌々日
    $basic_three_days_later_all = "<span class='ok_time'>◎</span>";

    $basic_four_days_later_all = "<span class='ok_time'>◎</span>";

    $basic_five_days_later_all = "<span class='ok_time'>◎</span>";

    // １２時以降
    if($hours >= 12){
      // 翌日全てアウト
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
      //土曜日 翌々日がアウト
      if(date('w')==6){
        $basic_two_days_later_all = "<span class='out_time'>×</span>";
      }
    }
    //　日曜日
    // いつでも翌日アウト
    if(date('w')==0){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
    }

    if(date("ymd") == "210721"){
      if($hours >= 12){
        $basic_tomorroww_all = "<span class='out_time'>×</span>";
        $basic_two_days_later_all = "<span class='out_time'>×</span>";
        $basic_three_days_later_all = "<span class='out_time'>×</span>";
        $basic_four_days_later_all = "<span class='out_time'>×</span>";
        $basic_five_days_later_all = "<span class='out_time'>×</span>";
      }
    }
    if(date("ymd") == "210722"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
      $basic_two_days_later_all = "<span class='out_time'>×</span>";
      $basic_three_days_later_all = "<span class='out_time'>×</span>";
      $basic_four_days_later_all = "<span class='out_time'>×</span>";
    }
    if(date("ymd") == "210723"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
      $basic_two_days_later_all = "<span class='out_time'>×</span>";
      $basic_three_days_later_all = "<span class='out_time'>×</span>";
    }
    if(date("ymd") == "210724"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
      $basic_two_days_later_all = "<span class='out_time'>×</span>";
    }
    if(date("ymd") == "210725"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
    }


    // ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
    // ###### 21/02/10　清長休み ######
    //2/10 => 12時以降は11、12の選択できない
    //2/11 => 12の選択ができない
    if(date("ymd") == "210222"){
      if($hours >= 12){
        $basic_tomorroww_all = "<span class='out_time'>×</span>";
        $basic_two_days_later_all = "<span class='out_time'>×</span>";
      }
    }
    if(date("ymd") == "210223"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
    }


    if(date("ymd") == "210625"){
      if($hours >= 12){
        $basic_tomorroww_all = "<span class='out_time'>×</span>";
        $basic_two_days_later_all = "<span class='out_time'>×</span>";
      }
    }
    if(date("ymd") == "210226"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
    }


    // ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼

    // ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
    // ###### 21/04/29　清長休み ######
    //4/28 => 12時以降は29、30の選択できない
    //4/29 => 30の選択ができない
    if(date("ymd") == "210428"){
      if($hours >= 12){
        $basic_tomorroww_all = "<span class='out_time'>×</span>";
        $basic_two_days_later_all = "<span class='out_time'>×</span>";
      }
    }
    if(date("ymd") == "210429"){
      $basic_tomorroww_all = "<span class='out_time'>×</span>";
    }
    // ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼



    // ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
    // ###### 20/07/23・24　清長休み ######
    // if(
    //   (date("ymd") == "200723")
    // ){
    //   $basic_two_days_later_all = "<span class='out_time'>×</span>";
    // }
    // if(
    //   (date("ymd") == "200724")
    // ){
    //   $basic_tomorroww_all = "<span class='out_time'>×</span>";
    // }
    // ▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

    // ▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲
    // ###### 20/11/03　清長休み ######
    // 2日は、翌日(3)、12時以降翌々日(4)までアウト
    // if(date('ymd')==201102){
    //   $basic_tomorroww_all = "<span class='out_time'>×</span>";
    //   if($hours >= 12){
    //     $basic_two_days_later_all = "<span class='out_time'>×</span>";
    //   }
    // }
    //
    // // 3日は、翌日(4)までアウト
    // if(date('ymd')==201103){
    //   $basic_tomorroww_all = "<span class='out_time'>×</span>";
    // }
    // ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
    //休日から翌々日を選択できるように変更
    // ###### 20/09/21~22　清長休み ######
    // !!!!!!!!! 休み明けにコメントアウトして使い回す !!!!!!!!!
    // 19日は、１２時以降は翌々日(21)と翌翌々日(22)もアウト
    // if(date('ymd')==200919){
    //   if($hours >= 12){
    //     $basic_two_days_later_all = "<span class='out_time'>×</span>";
    //     $basic_three_days_later_all = "<span class='out_time'>×</span>";
    //   }
    // }
    // // // 20日は、翌日(21)、翌々日(22)までアウト
    // if(date('ymd')==200920){
    //   $basic_tomorroww_all = "<span class='out_time'>×</span>";
    //   $basic_two_days_later_all = "<span class='out_time'>×</span>";
    // }
    // // // 21日は、翌日(22)、翌々日(23)までアウト
    // if(date('ymd')==200921){
    //   $basic_tomorroww_all = "<span class='out_time'>×</span>";
    //   $basic_two_days_later_all = "<span class='out_time'>×</span>";
    // }
    // ▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

    $haisou_hosyou = array();
    for ($i=400000; $i <= 50000000; $i+=100000) {
    $haisou_hosyou[] = number_format($i);
    }
    $ankeeto_word = $this->ankeeto_word;

    //ご利用規約のインポート
    $kiyaku_url = "https://kinkaimasu.jp/kiyaku_text/kiyaku_for_rifa.php";
    $kiyaku_html = file_get_contents($kiyaku_url);

    // プライバシーポリシーのインポート
    try {
      $pp_url = "https://urlounge.co.jp/policy_notice/policy_notice.php";
      $pp_html = file_get_contents($pp_url);
    } catch (\Exception $e) {
      $pp_url = "http://urlounge.co.jp/policy_notice/policy_notice.php";
      $pp_html = file_get_contents($pp_url);
    }


    $todouhuken = $this->todouhuken;

    if(isset($_GET["takuhaitest"])){
      $view_file = "mailingkit.test";
    }else{
      $view_file = "mailingkit.index_test";
    }

    return view($view_file,[
      "todouhuken" => $todouhuken,
      "user_info_arr" => $user_info_arr,
      "month" => $month,
      "day" => $day,
      "wday" => $wday,
      "kongetu" => $kongetu,
      "td_day" => $td_day,
      "sel" => $sel,
      "today_time" => $today_time,
      "tomorroww_morning" => $tomorroww_morning,
      "tomorroww_all" => $tomorroww_all,
      "two_days_later_morning" => $two_days_later_morning,
      "two_days_later_all" => $two_days_later_all,
      "three_days_later_morning" => $three_days_later_morning,
      "three_days_later_all" => $three_days_later_all,
      "basic_tomorroww_all" => $basic_tomorroww_all,
      "haisou_hosyou" => $haisou_hosyou,
      "ankeeto_word" => $ankeeto_word,
      "pp_html" => $pp_html,
      "kiyaku_html" => $kiyaku_html,
      "basic_two_days_later_all" => $basic_two_days_later_all,
      "basic_three_days_later_all" => $basic_three_days_later_all,
      "basic_four_days_later_all" => $basic_four_days_later_all,
      "basic_five_days_later_all" => $basic_five_days_later_all,
      "contract_at" =>  $this->contract_at,
    ]);
  }

  public function submit(Request $request)
  {

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
    $user_name = str_replace(' ','　',$user_name);
    $user_name = mb_convert_kana($user_name,'KVa');

    $user_name_kana = $request->user_name_kana;
    $user_name_kana = str_replace(' ','　',$user_name_kana);
    $user_name_kana = mb_convert_kana($user_name_kana,'KVa');

    $user_tel = $request->user_tel;
    $user_tel = preg_replace("/[^0-9]/","","$user_tel");
    $user_yuubinn = $request->user_yuubinn;
    $user_yuubinn = preg_replace("/[^0-9]/","","$user_yuubinn");

    $user_mail = $request->user_mail;
    $user_mail = mb_convert_kana($user_mail,'a');
    $angouka_mailaddress = md5(htmlspecialchars($user_mail));
    $angouka_mailaddress = substr($angouka_mailaddress, 0, 8);

    $user_sikutyouson = $request->user_sikutyouson;
    $user_sikutyouson = mb_convert_kana($user_sikutyouson,'KVA');
    $user_banti = $request->user_banti;
    $user_banti = mb_convert_kana($user_banti,'KVA');
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
    $insurance_kingaku = $request->insurance_kingaku;//配送補償対象金額
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
        $insurance_kingaku = '';
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
      $insurance_kingaku = '';
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

    $ankeeto_word = $this->ankeeto_word;
    $anke_3 = "";
    $index = 0;
    foreach($ankeeto_word as $val){
      $item_name = 'anke_3_'.$index;
      if($request->$item_name != ''){
        if($anke_3 != ""){
          $anke_3 .= ",";
        }
        $anke_3 .= $val;
      }
      $index++;
    }

    $anke_2 = $request->anke_2;
    $anke_1 = $request->anke_1;
    $anke_3_text = $request->anke_3_text;
    $anke_2_text = $request->anke_2_text;
    $anke_1_text = $request->anke_1_text;

    $insert_anke_1 = "";
    if($anke_1!=""){
      $insert_anke_1 .= $anke_1;
    }
    if($anke_1_text!=""){
      if($insert_anke_1 != ""){
        $insert_anke_1 .= "\n";
      }
      $insert_anke_1 .= $anke_1_text;
    }
    $insert_anke_2 = "";
    if($anke_2!=""){
      $insert_anke_2 .= $anke_2;
    }
    if($anke_2_text!=""){
      if($insert_anke_2 != ""){
        $insert_anke_2 .= "\n";
      }
      $insert_anke_2 .= $anke_2_text;
    }
    $insert_anke_3 = "";
    if($anke_3!=""){
      $insert_anke_3 .= $anke_3;
    }
    if($anke_3_text!=""){
      if($insert_anke_3 != ""){
        $insert_anke_3 .= "\n";
      }
      $insert_anke_3 .= $anke_3_text;
    }

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
    $this->validate($request,$validate_rule);

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
    $user_agent = $headers["User-Agent"];
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

    $chat_txt = str_replace("&","＆",$chat_txt);
    $chat_text_body = "[info][title]{$stamp}【宅配申込】{$domain}{$ttl_type}/{$cv_device} {$datetime} {$speed_flag}[/title]";
    $chat_text_body .= $chat_txt;
    $chat_text_body .= "[/info]";
    $cw = new PushChatwork;
    $msg = $chat_text_body;
    $room='84134721';
    $token='bot';
    $cw->Push($msg,$room,$token);
    //////////////////////end chat//////////////////////


    //////////////////////DB保存//////////////////////
    // 現在のmailingkit同様、買取サーバーDBへ。モデル作って保存するだけ。
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
       'anke_1' => $insert_anke_1,
       'anke_2' => $insert_anke_2,
       'anke_3' => $insert_anke_3,
       'cv_time' => $datetime,
       'cv_site' => $cv_site,
       'key_code' => $angouka_mailaddress,
       'USER_AGENT' => $user_agent,
       'REMOTE_ADDR' => $REMOTE_ADDR,
       'cv_device' => $cv_device,
       'cv_page' => $cv_page,
       'type_selection' => $type_selection,
       'service_users_id' => $insert_service_user_id,
       'contract_at' => $request->contract_at,
    ]);
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
    //入力内容確認ページのviewに変数を渡して表示
    return view('mailingkit.thanks_test', [
        'inputs' => $inputs,
        'angouka_mailaddress' => $angouka_mailaddress,
        'HTTP_X_FORWARDED_HOST' => $HTTP_X_FORWARDED_HOST,
    ]);
  }//end submit

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
        )
    );
    return file_get_contents($base_uri.$endpoint, false, stream_context_create($context));
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
        )
    );
    return file_get_contents($base_uri.$endpoint, false, stream_context_create($context));
  }

}//end class
