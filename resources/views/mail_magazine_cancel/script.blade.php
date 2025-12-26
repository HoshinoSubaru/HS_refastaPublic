<script>
    function onSubmit(recaptcha) {
        if (recaptcha !== ''){
            // reCAPTHAによるチェックをしたあとは送信ボタンを押せるようにする
            $('#submit_btn').removeClass('disabled');
        }
    }

    
    $("#submit_btn").click(function () {
        $("#mail_magazine_cancel_form").submit();
    });

</script>