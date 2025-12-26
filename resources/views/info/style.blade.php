<style>

  /* *******PC SP 共通パート****************** */
form{
  padding-bottom: 20px;
}
.g-recaptcha{
  width: 30%;
  margin: 10px auto;
}
 /* *******Honeypotフィールド******* */
.hp-field{
  display:none;
}

@media screen and (max-width: 900px) {
  .g-recaptcha{
    width: initial;
   margin: auto;
  }
}
.form_head {
    position: relative;
    display: flex;
    align-content: center;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-size: contain;
    background-repeat: no-repeat;
}
.form_head h1{
    color: #fff;
    text-align: center;
    -webkit-margin-before: 0em;
    -webkit-margin-after: 0em;
    padding: 40px 0px 0px;
    display: block;
    margin: 0 auto;
    border-bottom: 4px solid red;
    }


.form_head .content_comment {
    line-height: 1.55rem;
    color: #fff;
    text-align: center;
}
.h1_bottom{
  background-color: #0c3886;
    color: #fff;
}
.h1_bottom .main_column{
  padding:10px 0;
  font-size:13px;
}
  /* ------------------form------------------------- */
 form {
  background-color: #fff;
  box-shadow: 0 1px 1px rgb(0 0 0 / 20%);
}

th {
  width: 25%;
  padding: 10px;
  text-align: left;
  font-weight: normal;
  border-bottom: 1px solid #ddd;
  border-left: 1px solid #ddd;
  background-color: #ecf3ff;
  color: #0c3886;
}
.alert-danger{
  display: block;
  width: 100%;
  padding: 0 5px;
  margin: 0px 0 5px 0;
}
td {
  width: 75%;
  padding: 10px;
  text-align: left;
  font-weight: normal;
  border-bottom: 1px solid #ddd;
}
.main_column {
  width: 980px;
  display: block;
  position: relative !important;
  margin: 0 auto;
}
#form_area input[type="text"] {
  width: 60%;
}
textarea {
  height: 250px;
  width: 99%;
}
#form_area select,
input {
  padding: 10px;
  font-size: 16px;
}
#kiyaku_area,
#policy_area {
  width: 95%;
  margin: 25px auto 5px;
  font-size: 15px;
  line-height: 1.1;
}
.kiyaku_ttl {
  background-color: #f1f1f1;
  padding: 5px;
}
.kiyaku-content-area,
#policy_text_area {
  width: 100%;
  height: 120px;
  overflow-y: scroll;
  font-size: 14px;
  border: 1px solid #dcdcdc;
  padding: 5px;
  margin-top: 5px;
  color: #888;
}
#kiyaku_check_area {
  width: 700px;
  margin: 40px auto 0px;
  text-align: center;
}
#etc {
  padding: 15px;
}
.thWide.sendbox {
  width: 50%;
  margin: 0px auto;
}
.star::before {
  display: flex;
  content: "＊必須";
  font-size: 13px;
  color: red;
  flex-direction: column;
  justify-content: center;
}
#submit_btn,
#send_btn {
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 25px;
  width: 100%;
  cursor: pointer;
  vertical-align: middle;
  text-decoration: none;
  font-size: 1.2rem !important;
  line-height: 1.35rem !important;
  color: #fff;
  font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ",
    "Meiryo", "Osaka", "MS PGothic", "ＭＳ Ｐゴシック", sans-serif;
  font-weight: bold;
  text-align: center;
  text-shadow: 0px 1px 0px #b9000f;
  background: linear-gradient(to bottom, #e60012 30%, #b9000f 100%) 100%/100%;
  box-shadow: inset 0 1px 0 hsl(0deg 0% 100% / 60%), 0 1px 2px rgb(0 0 0 / 5%);
  border: 1px solid #b9000f;
  padding: 15px 0px 15px 20px;
  border-radius: 3px;
  cursor: pointer;
}

.sendbox{
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 25px;
  width: 100%;
  cursor: pointer;
  vertical-align: middle;
  text-decoration: none;
  font-size: 1.2rem !important;
  line-height: 1.35rem !important;
  color: #fff;
  font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ",
    "Meiryo", "Osaka", "MS PGothic", "ＭＳ Ｐゴシック", sans-serif;
  font-weight: bold;
  text-align: center;
  text-shadow: 0px 1px 0px #b9000f;
  background: linear-gradient(to bottom, #e60012 30%, #b9000f 100%) 100%/100%;
  box-shadow: inset 0 1px 0 hsl(0deg 0% 100% / 60%), 0 1px 2px rgb(0 0 0 / 5%);
  border: 1px solid #b9000f;
  padding: 15px 0px 15px 20px;
  border-radius: 3px;
  cursor: pointer;
}

/* ----------------------form の下コンテンツ----------------------------------- */
#about_info {
  background-color: #fff;
  margin-top: 50px;
}
#thought {
  position: relative;
}
#thought .content_ttl {
  background-color: #0c3886;
  color: #fff !important;
  padding: 15px 0;
  text-align: center;
}

.main_column {
  position: relative !important;
}



#property .content_ttl {
  border-top: 2px solid #0c3886;
  border-bottom: 2px solid #0c3886;
  padding: 15px 0;
  color: #0c3886 !important;
}
#property .about_text {
  padding: 15px;
  font-size: 13px;
  background: rgba(255, 255, 255, 0.8);
  border: dotted 2px #76d6e4;
  border-radius: 5px;
}

#property_2 .about_text {
  padding: 15px;
  font-size: 13px;
  background: rgba(255, 255, 255, 0.9);
  border: dotted 2px #bf8ed0;
  border-radius: 5px;
}
#info_end {
  background-color: #c3f6fe;
}
#info_end .info_end_bg {
  background: url(/new/img/info/pc/info_bg.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50%;
}
#info_end .about_text {
  text-align: center;
  padding: 15px;
  font-size: 13px;
}
span.red {
  color: #f00;
}
.for_form_btn {
  font-weight: bold;
  margin: 10px auto;
  width: 300px;
  cursor: pointer;
  vertical-align: middle;
  text-decoration: none;
  font-size: 1.2rem !important;
  line-height: 1.35rem !important;
  color: #fff;
  font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ",
    "Meiryo", "Osaka", "MS PGothic", "ＭＳ Ｐゴシック", sans-serif;
  font-weight: bold;
  text-align: center;
  text-shadow: 0px 1px 0px #b9000f;
  background: linear-gradient(to bottom, #e60012 30%, #b9000f 100%) 100%/100%;
  box-shadow: inset 0 1px 0 hsl(0deg 0% 100% / 60%), 0 1px 2px rgb(0 0 0 / 5%);
  border: 1px solid #b9000f;
  padding: 15px 0px 15px 20px;
  border-radius: 3px;
  cursor: pointer;
  display: block;
}

/* -----------問い合わせ方法-------------- */
#info_type {
  padding: 50px 0;
  background-color: #f5f5f5;
  text-align: center;
}
#info_type .main_column {
    overflow: hidden;
    border-radius: 3px;
}
#info_type .main_column table{
  background: #fff;
  margin: auto;
}
#info_type .content_ttl {
  background-color: #0c3886;
  color: #fff !important;
  padding: 15px 0;
  margin: 0px !important;
}

#info_type table {
  text-align: center;
  border: 1px solid #ccc;
}
#info_type table th {
    background-color: #ffec64;
    font-weight: bold;
}
#info_type table th,#info_type table
td {
  border: 1px solid #ccc;
  padding: 10px;
  border-collapse: collapse;
  text-align: center;
  width: 50%;
}
.blinking {
  padding-top: 0px;
  color: #fff;
  background-color: #dd0012;
  font-weight: bold;
  padding: 2px 8px;
  font-size: 13px;
  border-radius: 3px;
  -webkit-animation: blink 1.5s ease-in-out infinite alternate;
  -moz-animation: blink 1.5s ease-in-out infinite alternate;
  animation: blink 1.5s ease-in-out infinite alternate;
}
@keyframes blink{
   0% { opacity: 0.1 }
 100% { opacity: 1}
}
.navbar #ss_box {
          display: none!important;
      }

/* **********************PC　only*************** */
@media screen and (min-width: 900px) {
  .sp_only{
    display: none
  }

.form_head {
    background: url(https://kinkaimasu.jp/new/img/info/pc/h1/bg.png);
    position: relative;
    display: flex;
    align-content: center;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-position:  center;
    background-size: cover;
    background-repeat: no-repeat;
}
.form_head h1{
    font-size: 3.0rem;
    line-height: 3.55rem;
    color: #fff;
    text-align: center;
    -webkit-margin-before: 0em;
    -webkit-margin-after: 0em;
    padding: 40px 0px 0px;
    width: 980px;
    display: block;
    margin: 0 auto;
    border-bottom: 4px solid red;
    width: 40%
}

.form_head .content_comment {
    font-size: 1.0rem;
    line-height: 1.55rem;
    color: #fff;
    text-align: center;
}
.h1_bottom{
  background-color: #0c3886;
    color: #fff;
}
.h1_bottom .main_column{
  text-align: center;
  padding:10px 0;
    font-size:13px;
}
  .kiyaku-content-area,
  #policy_text_area {
    width: 100%;
    height: 120px;
  }
  #about_img {
    width: 485px;
    position: absolute;
    top: 42px;
    left: -45px;
  }
  #property .about_text {
    width: 60%;
    padding: 15px;
    font-size: 13px;
    background: rgba(255, 255, 255, 0.8);
    border: dotted 2px #76d6e4;
    border-radius: 5px;
    position: absolute;
    top: 80px;
    right: 380px;
  }
  #property_2 .about_text {
    width: 60%;
    padding: 15px;
    font-size: 13px;
    background: rgba(255, 255, 255, 0.9);
    border: dotted 2px #bf8ed0;
    border-radius: 5px;
    position: absolute;
    top: 5px;
    right: 10px;
  }

  #thought {
  height: 425px;
  }
  #hrt_img {
    width: 285px;
    position: absolute;
    top: 78px;
    right: 60px;
  }
  #property .main_column {
    height: 340px;
    border-bottom: 3px solid #31384a;
  }
  #property_2 .about_text {
    width: 60%;
  }
  #info_type .main_column {
    height: 295px;
    overflow: hidden;
  }
  #info_type .main_column table {
    width: 70%;
    margin: auto;
  }
  #info_type .tsuki_img {
    float: left;
    width: 30%;
  }
  #thought .about_text {
    width: 60%;
    padding: 15px;
    font-size: 14px;
    background: rgba(255, 255, 255, 0.8);
    border: dotted 2px #007ee3;
    border-radius: 5px;
    position: absolute;
    top: 0;
    right: 0
  }
.disabled {
  background: linear-gradient(rgb(207, 207, 207) 30%, rgb(117, 117, 117) 100%) 100% center / 100% ;
  border: none;
  text-shadow: none;
}
}


/* *****************SP only******************** */
@media screen and (max-width: 900px) {
  .pc_only{
    display: none;
  }
  body {
    background: white;
  }
  img{width: 100%}

  .form_head {
    background: url(https://kinkaimasu.jp/new/img/info/sp/h1/bg.jpg);
    background-size: cover;
    background-position: 50%;
}
.form_head h1{
    font-size: 32px;
}

.form_head .content_comment {
  margin-top: 10px;
    font-size: 14px;
    line-height: 1.55rem;
    color: #fff;
}
.h1_bottom{
  background-color: #0c3886;
    color: #fff;
}
.h1_bottom .main_column{
  text-align: left;
  padding:10px;
    font-size:13px;
}

  .main_column {
    width: 100%;
  }

  .formBox {
    height: 100vh;
  }
  form {
    position: relative;
    display: flex;
    flex-direction: column;
  }
  #form_area input[type="text"] {
    width: 100%;
    font-size: 15px;
  }
  #form_area input[type="file"] {
    margin: 3px;
  }
  #form_area select{
    padding: 0px;
    font-size: 16px;
    width: 100%;
  }
  #form_area input{
padding: 0px;
    font-size: 16px;
    width: 70%;
  }
  #form_area tbody,
  #form_area  tr {
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
  }
  #form_area td {
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
    flex-direction: column;
    width: 100%;
    padding: 15px;
  }
  th,
  td {
    width: 100%;
    padding: 10px;
    font-size: 15px;
  }

  #form_area textarea {
    height: 100px;
    width: 100%;
  }
  .kiyaku-content-area,
  #policy_text_area {
    width: 100%;
    height: 80px;
  }
  #kiyaku_check_area {
    width: 90%;
    margin: 0 auto;
    font-size: 15px;
  }
  #etc {
    font-size: 13px;
    color: #555;
  }
  #submit_btn {
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 20px;
    width: 100%;
    cursor: pointer;
    vertical-align: middle;
    text-decoration: none;
    font-size: 1rem !important;
    line-height: 1.35rem !important;
    color: #fff;
    font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ",
      "Meiryo", "Osaka", "MS PGothic", "ＭＳ Ｐゴシック", sans-serif;
    font-weight: bold;
    text-align: center;
    text-shadow: 0px 1px 0px #b9000f;
    background: linear-gradient(to bottom, #e60012 30%, #b9000f 100%) 100%/100%;
    box-shadow: inset 0 1px 0 hsl(0deg 0% 100% / 60%), 0 1px 2px rgb(0 0 0 / 5%);
    border: 1px solid #b9000f;
    padding: 5px 30px;
    border-radius: 3px;
    cursor: pointer;
  }
  #about_img {
    width: 80%;
    margin: 0 auto;
    display: block;
  }
  #thought .about_text {
    padding: 10px;
    font-size: 14px;
    background: rgba(255,255,255,0.8);
    border: dotted 2px #007ee3;
    border-radius: 3px;
    line-height: 15px;

  }
  #hrt_img {
    width: 50%;
    display: block;
    margin: 0 auto;
    padding-top: 10px;
    padding-bottom: 10px;
  }
#property .about_text {
    padding: 10px;
    font-size: 14px;
    background: rgba(255,255,255,0.8);
    border-radius: 3px;
    line-height: 15px;
}
#property .main_column {
    border-bottom: 3px solid #31384a;
}
.sendbox{
  padding: 10px;
}
.disabled {
  background: linear-gradient(rgb(207, 207, 207) 30%, rgb(117, 117, 117) 100%) 100% center / 100% ;
  border: none;
  text-shadow: none;
}

.thWide.sendbox {
  width: 65%;
  margin: 0px auto;
  padding:15px;
}
}

</style>
