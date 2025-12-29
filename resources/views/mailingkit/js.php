<script type="text/javascript">
// 無効なフィールドがある場合にフォーム送信を無効にするスターターJavaScriptの実例
$(function() {
  'use strict';

  window.addEventListener('load', function() {
    // カスタムブートストラップ検証スタイルを適用するすべてのフォームを取得
    var forms = document.getElementsByClassName('needs-validation');
    // ループして帰順を防ぐ
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
          alert('入力内容に誤りがあるか、必須項目が抜けております。\n恐れ入りますがもう一度ご確認をお願い致します。')
          $('html,body').animate({ scrollTop: 0 }, 'slow');
        } else {
          $('input[type="submit"]').attr("disabled","disabled")
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
});

// エンターキーの制御
$("#delivery_form input").keydown(function(event){
  if (event.isComposing || event.keyCode === 229) {
    return;
  }
  if(event.keyCode === 13){
    return false;
  }
})

// キットの計算
var kit_up = $("#kit_select_area").find(".kit_up");
var kit_down = $("#kit_select_area").find(".kit_down");
kit_up.click(function(){
  var goukei = kit_detail_sum("up")
  if(goukei !== 'out'){
    var up_dt = parseInt($(this).siblings(".kit_number").find(".kit_num_data").val());
    up_dt++;
    $("#kit_sum").val(goukei)
  	$(this).siblings(".kit_number").find(".kit_num_data").val(up_dt);
  }
})
kit_down.click(function(){
  var goukei = kit_detail_sum("down")
  if(goukei !== 'out'){
  	var up_dt = parseInt($(this).siblings(".kit_number").find(".kit_num_data").val());
    up_dt--;
    if(up_dt >= 0){
      if(up_dt == 0){
        $("#kit_sum").val('')
      }else{
        $("#kit_sum").val(goukei)
      }
      $(this).siblings(".kit_number").find(".kit_num_data").val(up_dt);
    }
  }
})
function kit_detail_sum(attr){
  var kosuu_s = parseInt($("#kit_count_s").val())
	var kosuu_m = parseInt($("#kit_count_m").val())
	var kosuu_l = parseInt($("#kit_count_l").val())
	// var kosuu_d = parseInt($("#kit_count_d").val())
	var kosuu_k = parseInt($("#kit_count_k").val())
  // var goukei = kosuu_s + kosuu_m + kosuu_l + kosuu_d + kosuu_k
  var goukei = kosuu_s + kosuu_m + kosuu_l + kosuu_k
  if(attr === "up"){
    goukei++;
  }else{
    goukei--;
  }
  if(goukei < 6){
    return goukei
  }else{
    return 'out'
  }
}

(function() {
    let focusVal;
    $('select.kit_num_data').on('focus', function() {
        focusVal = this.value;
    }).change(function() {
        var kosuu_s = parseInt($("#kit_count_s").val())
        var kosuu_m = parseInt($("#kit_count_m").val())
        var kosuu_l = parseInt($("#kit_count_l").val())
        // var kosuu_d = parseInt($("#kit_count_d").val())
        var kosuu_k = parseInt($("#kit_count_k").val())
        // var goukei = kosuu_s + kosuu_m + kosuu_l + kosuu_d + kosuu_k
        var goukei = kosuu_s + kosuu_m + kosuu_l + kosuu_k

        if(goukei < 4){
            focusVal = this.value;
            if(goukei == 0){
                $("#kit_sum").val("")
            }else{
                $("#kit_sum").val(goukei)
            }

        }else{
            alert("キットの合計個数は3個以内でご選択ください。3個以上ご希望の場合はお電話にてご相談ください。")
            $(this).val(focusVal)
        }
    });
})();

/* ----------------
|||  関数定義  |||
---------------- */
  function toZenkakuSpace(name){
    var un = $("#"+name).val();
  	var ee = un.replace(/\s+/g,"　");
  	$("#"+name).val(ee);
  }
  function val_esc(val){
    var targets = ["&", "<", ">" ,'"', "'"];
    var escapes = ["&amp;", "&lt;", "&gt;", "&quot;", "&#39;"];
    for(var i=0; i<targets.length; i++){
      val = val.replace(new RegExp(targets[i], 'g'), escapes[i]);
    }
    return val;
  }
  //カンマ区切り
  function separate(num){
    num = String(num);
    var separated = '';
    var nums = num.split('');
    var len = nums.length;

    for(var i = 0; i < len; i++){
      separated = nums[(len-1)-i] + separated;
      if((i % 3 === 2) && (i != (len-1))){
        separated = ',' + separated;
      }
      separated = separated.replace("-,","-");
    }

    return separated;
  }//カンマ区切り
  function StringChange(str){
    //検索文字列を変換するための変換文字列配列
    var Kana1 = new Array("ｶﾞ","ｷﾞ","ｸﾞ","ｹﾞ","ｺﾞ","ｻﾞ","ｼﾞ","ｽﾞ","ｾﾞ","ｿﾞ","ﾀﾞ","ﾁﾞ",
      "ﾂﾞ","ﾃﾞ","ﾄﾞ","ﾊﾞ","ﾋﾞ","ﾌﾞ","ﾍﾞ","ﾎﾞ","ﾊﾟ","ﾋﾟ","ﾌﾟ","ﾍﾟ","ﾎﾟ","ｦ","ｧ",
      "ｨ","ｩ","ｪ","ｫ","ｬ","ｭ","ｮ","ｯ","ｰ","ｱ","ｲ","ｳ","ｴ","ｵ","ｶ","ｷ","ｸ","ｹ",
      "ｺ","ｻ","ｼ","ｽ","ｾ","ｿ","ﾀ","ﾁ","ﾂ","ﾃ","ﾄ","ﾅ","ﾆ","ﾇ","ﾈ","ﾉ","ﾊ","ﾋ",
      "ﾌ","ﾍ","ﾎ","ﾏ","ﾐ","ﾑ","ﾒ","ﾓ","ﾔ","ﾕ","ﾖ","ﾗ","ﾘ","ﾙ","ﾚ","ﾛ","ﾜ","ﾝ");
    var Kana2 = new Array("ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ",
      "ヅ","デ","ド","バ","ビ","ブ","ベ","ボ","パ","ピ","プ","ペ","ポ","ヲ","ァ",
      "ィ","ゥ","ェ","ォ","ャ","ュ","ョ","ッ","ー","ア","イ","ウ","エ","オ","カ",
      "キ","ク","ケ","コ","サ","シ","ス","セ","ソ","タ","チ","ツ","テ","ト","ナ",
      "ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ","マ","ミ","ム","メ","モ","ヤ",
      "ユ","ヨ","ラ","リ","ル","レ","ロ","ワ","ン");
    while(str.match(/[ｦ-ﾝ]/)){                              //半角カタカナがある場合
      for(var i = 0; i < Kana1.length; i++){
        str = str.replace(Kana1[i], Kana2[i]);  //文字列置換
      }
    }
    return str;
  }
  function StringChange_hira_kata(str){
  //検索文字列を変換するための変換文字列配列
  var Kana1 = new Array("がﾞ","ぎ","ぐ","げ","ご","ざ","じ","ず","ぜ","ぞ","だ","ぢ",
    "づ","で","ど","ば","び","ぶ","べ","ぼ","ぱ","ぴ","ぷ","ぺ","ぽ","を","ぁ",
    "ぃ","ぅ","ぇ","ぉ","ゃ","ゅ","ょ","っ","ー","あ","い","う","え","お","か","き","く","け",
    "こ","さ","し","す","せ","そ","た","ち","つ","て","と","な","に","ぬ","ね","の","は","ひ",
    "ふ","へ","ほ","ま","み","む","め","も","や","ゆ","よ","ら","り","る","れ","ろ","わ","ん");
  var Kana2 = new Array("ガ","ギ","グ","ゲ","ゴ","ザ","ジ","ズ","ゼ","ゾ","ダ","ヂ",
    "ヅ","デ","ド","バ","ビ","ブ","ベ","ボ","パ","ピ","プ","ペ","ポ","ヲ","ァ",
    "ィ","ゥ","ェ","ォ","ャ","ュ","ョ","ッ","ー","ア","イ","ウ","エ","オ","カ",
    "キ","ク","ケ","コ","サ","シ","ス","セ","ソ","タ","チ","ツ","テ","ト","ナ",
    "ニ","ヌ","ネ","ノ","ハ","ヒ","フ","ヘ","ホ","マ","ミ","ム","メ","モ","ヤ",
    "ユ","ヨ","ラ","リ","ル","レ","ロ","ワ","ン");
  while(str.match(/[ぁ-ん]/)){                              //半角カタカナがある場合
    for(var i = 0; i < Kana1.length; i++){
      str = str.replace(Kana1[i], Kana2[i]);  //文字列置換
    }
  }
  return str;
}

  //全角英数字⇒半角英数字へ変換。スペース削除
  function toHalfWidth(strVal){
    var halfVal = strVal.replace(/[！-～]/g, function( tmpStr ) {return String.fromCharCode( tmpStr.charCodeAt(0) - 0xFEE0 );});
    return halfVal.replace(/”/g, "\"").replace(/’/g, "'").replace(/‘/g, "`").replace(/￥/g, "\\").replace(/・/g, "･").replace(/〜/g, "~").replace(/\s+/g,"");
  }
  //全角英数字⇒半角英数字へ変換のみ。スペースそのまま。
  function toKanaKana(strVal){
    var halfVal = strVal.replace(/[！-～]/g, function( tmpStr ) {return String.fromCharCode( tmpStr.charCodeAt(0) - 0xFEE0 );});
    return halfVal.replace(/”/g, "\"").replace(/’/g, "'").replace(/‘/g, "`").replace(/￥/g, "\\").replace(/・/g, "･").replace(/〜/g, "~");
  }


/* ----------------
|||  処理・スイッチ  |||
---------------- */
  // ユーザーネームのスペース全角変換処理
  $("#user_name").focusout(function(e){
    toZenkakuSpace("user_name_kana");
    toZenkakuSpace("user_name");
  })
  $("#user_name_kana").focusout(function(e){
  	toZenkakuSpace("user_name_kana")
  })
  // ふりがなの自動入力
  $.fn.autoKana('#user_name', '#user_name_kana', {
    katakana : true  //true：カタカナ、false：ひらがな（デフォルト）
  });
  // 郵便番号の補完
  $("#user_yuubinn").focusout(function(){
    $yb = val_esc($(this).val());
    //まず半角変換
    $yb = toHalfWidth($yb);
    //数字以外削除
    $yb = $yb.replace(/[^0-9]/g,"");
    $(this).val($yb);//代入する
    AjaxZip3.zip2addr('user_yuubinn','','user_todou','user_sikutyouson','user_banti');
    $("#user_sikutyouson").focus();
  });
  $("#user_yuubinn").keydown(function(ev) {
    if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
      AjaxZip3.zip2addr('user_yuubinn','','user_todou','user_sikutyouson','user_banti');
      $("#user_building").focus();
    } else {
      return true;
    }
  });
  //半角数字以外、その場で消去
  $("#user_tel").focusout(function() {
    $yb = val_esc($(this).val());
    //まず半角変換
    $yb = toHalfWidth($yb);
    //数字以外削除
    $yb = $yb.replace(/[^0-9]/g,"");
    $(this).val($yb);//代入する
  });
  // スペース残し、全角英数字⇒半角英数字へ変換。
  $("#user_name, #user_name_kana, #user_sikutyouson, #user_banti, #user_building").blur(function() {
    $this_val = val_esc($(this).val());
    $this_val = toKanaKana($this_val);
    $this_val = StringChange($this_val);
    $(this).val($this_val);
  });
  // ひらがなだったらカタカナへ変換
  $("#user_name_kana").blur(function() {
    $this_val = val_esc($(this).val());
    $this_val = StringChange_hira_kata($this_val);
    $(this).val($this_val);
  });



  // メールアドレス補完
  // $(".domain_type_area input").click(function(){
  //   $val = $(this).val();
  //   $user_mail = $("#user_mail").val();
  //   $user_mail = val_esc($user_mail);
  //   if($user_mail == ""){
  //     $("#user_mail").val($val);
  //   }else{
  //     if($user_mail.match(/@/)){
  //       $user_mail = $user_mail.split("@");
  //       $user_mail[1] = $val;
  //       $("#user_mail").val($user_mail[0]+$user_mail[1]);
  //     }else{
  //       $("#user_mail").val($user_mail+$val);
  //     }
  //   }
  //   if(($val == "@docomo.ne.jp") || ($val == "@softbank.ne.jp") || ($val == "@i.softbank.jp") || ($val == "@ezweb.ne.jp") ){
  //     $(".E-mail_scope").slideDown();
  //   }else{
  //     $(".E-mail_scope").slideUp();
  //   }
  //   $("#user_mail").focus().focusout();
  //   $(".domain_type_scope").hide();
  // })
  //
  // $("#E-mail").focusin(function(){
  //   $(".domain_type_scope").hide();
  // })
  //
  // $("#user_mail").keydown(function(e) {
  //   $abc = e.keyCode;
  //   if($abc == 192){
  //     $(".domain_type_scope").show();
  //   }
  //   $abc = $("#user_mail").val();
  //   $abc = val_esc($abc);
  //   if($abc.match(/@/)){
  //     $(".domain_type_scope").show();
  //   }
  //
  // });


  //メールアドレスチェック
  // $("input[class*='custom[email]']").keyup(function(){
  // 	$this_val = val_esc($(this).val());
  // 	if(($this_val.match(/^[a-zA-Z0-9Ａ-Ｚａ-ｚ０-９\@\＠\.\．\_\＿\!\！\#\＃\$\＄\%\％\&\＆\/\=\＝\-\?\？\^\`\{\|\}\~]+$/)) || ($this_val == "")){
  // 		$(this).removeClass('address_err');
  // 		$(this).siblings('.err_box').children(".mail_err").hide().removeClass("real_err");
  // 		$(this).siblings('.err_box').children('.err_arrow').hide();
  // 		$(this).parents(".formerror").removeClass("err_now");
  // 	}else{
  // 		$(this).addClass('address_err');
  // 		$(this).siblings('.err_box').children(".mail_err").show().addClass("real_err");
  // 		$(this).siblings('.err_box').children('.err_arrow').show();
  // 		$(this).parents(".formerror").addClass("err_now");
  // 	}
  // })
  // $("input[class*='custom[email]']").focusout(function(){
  // 	$this_val = val_esc($(this).val());
  // 	$(this).removeClass('address_err');
  // 	if($this_val != ""){
  // 		if($this_val.match(/^([\w\.\/\-]+)[\@\＠]([\w_\/\-]+)\.([\w_\.\/\-]*)[a-z][a-z]$/)){
  // 			$(this).removeClass('notval');
  // 			$(this).siblings('.err_box').children(".mail_err").hide();
  // 			$(this).siblings('.err_box').children('.err_arrow').hide();
  // 			$(this).parents(".formerror").removeClass("err_now");
  // 		}else{
  // 			$(this).addClass('notval');
  // 			$(this).siblings('.err_box').children(".mail_err").show().removeClass("real_err");
  // 			$(this).parents(".formerror").addClass("err_now");
  // 		}
  // 	}else{
  // 		$(this).addClass('notval');
  // 		$(this).siblings('.err_box').children(".mail_err").show().removeClass("real_err");
  // 		$(this).parents(".formerror").addClass("err_now");
  // 	}
  // 	$("#E-mail").removeClass('notval');
  // })
  //
  // $(".domain_type_scope input").change(function(){
  // 	$us_ma = val_esc($("#user_mail").val());
  // 	if($us_ma != ""){
  // 		if($us_ma.match(/^([\w\.\/\-]+)[\@\＠]([\w_\/\-]+)\.([\w_\.\/\-]*)[a-z][a-z]$/)){
  // 			$("#user_mail").removeClass('notval');
  // 			$("#user_mail").siblings('.err_box').children(".mail_err").hide();
  // 			$("#user_mail").parents(".formerror").removeClass("err_now");
  // 		}else{
  // 			$("#user_mail").addClass('notval');
  // 			$("#user_mail").siblings('.err_box').children(".mail_err").show().removeClass("real_err");
  // 			$("#user_mail").parents(".formerror").addClass("err_now");
  // 		}
  // 	}
  // })





//++++++++++++++++++++++++++++++++++++++++++++++配送補償負担金額自動計算++++++++++++++++++++++++++++++++++++++++++++++
$("#insurance_kingaku").change(function(){
	var sel_val = $(this).val();
	var kingaku = sel_val*0.001;
  var user_kingaku = kingaku.toLocaleString()+"円(+税)";
	$("#user_insurance_kingaku").html(user_kingaku);
});
//++++++++++++++++++++++++++++++++++++++++++++++配送補償負担金額自動計算++++++++++++++++++++++++++++++++++++++++++++++

// カレンダーの決定
$("#calender_box .day_time_sel .ok_time").click(function(){
	$("#calender_box .day_time_sel").removeClass("selected")
	$(this).parent(".day_time_sel").addClass("selected")
	$calender_val = $(this).parent(".day_time_sel").attr("id")
	$("#date_and_time_hidden").val($calender_val)
  $("#calender_boxModal").find("button[data-dismiss='modal']").click()
})

$("#time_calender_box .day_time_sel .ok_time").click(function(){
	$("#time_calender_box .day_time_sel").removeClass("selected")
	$(this).parent(".day_time_sel").addClass("selected")
	$calender_val = $(this).parent(".day_time_sel").attr("id")
	$("#time_select_hidden").val($calender_val)
  $("#time_calender_boxModal").find("button[data-dismiss='modal']").click()
})

// カレンダー発生(クリックではモーダルになるが、それ以外の場合)
$("#time_select_hidden, #date_and_time_hidden").keydown(function(event){
  var keyCode = event.keyCode
  // タブとエンター は外す。それ以外はfalse
  if((keyCode === 9) || (keyCode === 13)){
    $(this).focusout()
  }else{
    return false;
  }
})
$("#kit_sum").keydown(function(event){
  return false;
})

// LINEからのリンクの場合、「希望する」のボタンにデフォルトでチェックが入るよう修正 230804
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has("need_kit")) {
    const needKit = document.getElementById("need_kit_2");
    needKit.checked = true;
}
// スピードorベーシック 表示
function need_kit_select(){
  var type_sel = document.getElementById("need_kit_2")

	if(type_sel.checked == true){
    $("#kit_select_area").show()
    $("#insurance_row").show()
    $("#time_select_none_row").show()
    kit_calender_view()
    insurance_select()
    $("#kit_sum").prop("required",true)

    $("#date_and_time_hidden_row").hide()
    $("#date_and_time_hidden").prop("required", false)
    $("#speed_box_row").hide()
    $("#speed_box").prop("required",false)

	}else{
    $("#kit_select_area").hide()
    $("#insurance_row").hide()
    $("#time_select_none_row").hide()
    $("#time_select_hidden_row").hide()
    $("#insurance_kingaku_row").hide()
    $("#insurance_kingaku").prop("required",false)
    $("#kit_sum").prop("required",false)

    $("#date_and_time_hidden_row").show()
    $("#date_and_time_hidden").prop("required", true)
    $("#speed_box_row").show()
    $("#speed_box").prop("required",true)
	}
}

function kit_calender_view(){
  var kit_calender_btn = document.getElementById("time_select_none_2")

	if(kit_calender_btn.checked == true){
    $("#time_select_hidden_row").show()
    $("#time_select_hidden").prop("required",true)
    $("#time_select_hidden").click()
	}else{
    $("#time_select_hidden_row").hide()
    $("#time_select_hidden").prop("required",false)
	}
}
kit_calender_view()

function insurance_select(){
  var insurance_2 = document.getElementById("insurance_2")

	if(insurance_2.checked == true){
    document.getElementById('insurance_label').textContent = "配送保険";
    $("#time_select_none_row").hide()
    $("#insurance_kingaku_row").show()
    $("#time_select_none_1").click()
    $("#insurance_kingaku").prop("required",true)
	}else{
    document.getElementById('insurance_label').textContent = "配送補償";
    $("#time_select_none_row").show()
    $("#insurance_kingaku_row").hide()
    $("#insurance_kingaku").prop("required",false)
	}
}

// 初期実行（順番大事）
insurance_select()
need_kit_select()

function onSubmit(recaptcha) {
    if (recaptcha !== ''){
        // reCAPTHAによるチェックをしたあとは送信ボタンを押せるようにする
        jQuery('.submit_btn').removeAttr('disabled');
    }
}

$(".submit_btn").click(function(){
    if($(this).attr("disabled")){
        return false;
    }
    if($(this).hasClass("clicked")){
        return false;
    }
    $('#hp_field').val('');
    $(".submit_btn").addClass("clicked");
    $(".submit_btn").text("送信中")
    $("#delivery_form").submit();
})


// 広告パラメータ挿入
if(typeof localStorage.getItem("ad_param") == "undefined"){
    $("input[type=hidden][name=ad_param]").val("[]");
}else{
    $("input[type=hidden][name=ad_param]").val(localStorage.getItem("ad_param"));
}

$("noscript").remove();
</script>
