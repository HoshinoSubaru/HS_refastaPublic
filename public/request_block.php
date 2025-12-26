<?php
$current_page_pass = $_SERVER["REQUEST_URI"];
$check_request_pass = $current_page_pass;
$check_request_pass = str_replace(" ", "%20", $check_request_pass);


// 怪しい文字列が入っていた場合、400
if(
  (stristr($check_request_pass, "information_schema"))
  OR (stristr($check_request_pass, "TABLE_NAME"))
  OR (stristr($check_request_pass, "TABLE_SCHEMA"))
  OR (stristr($check_request_pass, "internet."))
  OR (stristr($check_request_pass, "mypage."))
  OR (stristr($check_request_pass, "mypage_readonly."))
  OR (stristr($check_request_pass, "%20UNION%20"))
  OR (stristr($check_request_pass, "%20SELECT%20"))
  OR (stristr($check_request_pass, "%20FROM%20"))
  OR (stristr($check_request_pass, "%20WHERE%20"))
  OR (stristr($check_request_pass, "%20UPDATE%20"))
  OR (stristr($check_request_pass, "%20DELETE%20"))
  OR (stristr($check_request_pass, "%20INSERT%20"))
	OR (stristr($check_request_pass, "%20CONCAT("))
	OR (stristr($check_request_pass, "%20CHAR("))
	OR (stristr($check_request_pass, "tel:"))
  OR (stristr($check_request_pass, '/*'))
  OR (stristr($check_request_pass, '*/'))
  OR (stristr($check_request_pass, '-- '))
  OR (stristr($check_request_pass, '--%20'))
  OR (stristr($check_request_pass, 'sleep%28'))
  OR (stristr($check_request_pass, 'sleep('))
  OR (stristr($check_request_pass, 'sleep%20%28'))
  OR (stristr($check_request_pass, 'sleep%20('))
  OR (stristr($check_request_pass, "select*"))
  OR (stristr($check_request_pass, "*from"))
  OR (stristr($check_request_pass, "name_const"))
  OR (stristr($check_request_pass, '%21'))// !
  OR (stristr($check_request_pass, '%22'))// "
  OR (stristr($check_request_pass, '%23'))// #
  OR (stristr($check_request_pass, '%24'))// $
  OR (stristr($check_request_pass, '%27'))// '
  OR (stristr($check_request_pass, '%2A'))// *
  OR (stristr($check_request_pass, '%2B'))// +
  OR (stristr($check_request_pass, '%2C'))// ,
  // OR (stristr($check_request_pass, '%2F'))// /
  OR (stristr($check_request_pass, '%3C'))// <
  OR (stristr($check_request_pass, '%3E'))// >
  OR (stristr($check_request_pass, '%5B'))// [
  OR (stristr($check_request_pass, '%5D'))// ]
  OR (stristr($check_request_pass, '%5E'))// ^
  OR (stristr($check_request_pass, '%60'))// `
  OR (stristr($check_request_pass, '%7C'))// |
  ){
	header("HTTP/1.1 400");
	exit;
}
