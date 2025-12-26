<script>
function ex_copy(){
	ex_val = $("#exsample").val();
  let template_array =[];
  @foreach($MstToiawase as $item)
    template_array[{{ $item->id }}] = @json($item->template);
  @endforeach
let ex_text= "";
if (typeof template_array[ex_val] != 'undefined') {
  ex_text = template_array[ex_val];
}
	$("#text").val(ex_text);
}

// 重複送信防止
$(function(){
  $('#hp_field').val('');
  $('#button').on('click',function(){
    if($(this).is(':not(.disabled)')){
      $(this).addClass('disabled');
      form_submit();
    }
  });
});

function form_submit()
{
  let input_array =[];
  let mail = $('#mail').val();
  input_array['mail'] = mail;
  let text = $('#text').val();
  input_array['text'] = text;
  let kiyaku_check = $('#kiyaku_check').prop("checked");
  input_array['kiyaku_check'] = kiyaku_check;
  error_check(input_array);
}

function error_check(input_array)
{
  let count = 0;
  $('.error_msgs').removeClass('alert alert-danger');
  $('.error_msgs').text('');

  if(!input_array['mail'].match(/^(.)+@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}$/)){
  // if(!input_array['mail'].match(/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/)){
    $('.js_error_mail').text('メールアドレスを入力してください');
    $('.js_error_mail').addClass('alert alert-danger');
    count++;
  }

  if (input_array['text'] == '') {
    $('.js_error_text').text('お問い合わせ内容を入力してください');
    $('.js_error_text').addClass('alert alert-danger');
    count++;
  }

  if (input_array['kiyaku_check'] !== true) {
    $('.js_error_kiyaku_check').text('同意されていません');
    $('.js_error_kiyaku_check').addClass('alert alert-danger');
    count++;
  }
  // エラーがない場合送信する
  if (count == 0) {
    $('.form').submit();
  } else{
    $('#button').removeClass('disabled');
  }
}
function onSubmit(recaptcha) {
  if (recaptcha !== ''){
  // reCAPTHAによるチェックをしたあとは送信ボタンを押せるようにする
  $('#button').removeClass('disabled');
  }
}
</script>
