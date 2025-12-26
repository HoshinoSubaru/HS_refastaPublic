<link rel="stylesheet" href="https://rifa.life/refasta_wordpress/wp-includes/css/dist/block-library/style.min.css?ver=5.4.1">
<link rel="stylesheet" href="https://kinkaimasu.jp/wp_styles/theme_styles/import.css">
<link rel="stylesheet" href="https://kinkaimasu.jp/wp_styles/reusable_parts/style.css">
<style>

  /* *******PC SP 共通パート****************** */
.sa{
	opacity: 1;
	transform: none;
}
.display_none{
    display: none;
}
form{
  padding-bottom: 20px;
  padding: 0.5rem 0;
}
.g-recaptcha{
  width: 30%;
  margin: 10px auto;
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
#form_area {
    margin: 1rem auto;
    border: 1px solid #dcdcdc;
    width: 90%;
}
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
  padding: 1rem;
}
.thWide.sendbox {
  width: 50%;
  margin: 0px auto;
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
	min-height: 300px;
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
#submit_btn.disabled {
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
		min-height: 200px;
	}
	.form_head h1{
		font-size: 32px;
		padding: 0;
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
	font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ","Meiryo", "Osaka", "MS PGothic", "ＭＳ Ｐゴシック", sans-serif;
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
	.sendbox{
	padding: 10px;
	}
	#submit_btn.disabled {
	background: linear-gradient(rgb(207, 207, 207) 30%, rgb(117, 117, 117) 100%) 100% center / 100% ;
	border: none;
	text-shadow: none;
	}
}

</style>
