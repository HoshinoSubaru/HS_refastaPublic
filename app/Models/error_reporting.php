<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

use \App\Notifications\PushChatwork;

use \App\Models\Logs\events;
use \App\Models\Logs\events_doru_server;
use \App\Models\Logs\events_request_header;
use \App\Models\Logs\events_responce_header;
use \App\Models\Logs\events_upload_files;


class error_reporting
{

  static function db_save($exception='', $no_err_msg = '', $jsonfiles = '', $title='エラー発生'){
    $events = events::create();
    if(Auth::user()){
      $events->user_id = Auth::user()->id;
    }

    $getMessage = '';
    if(($no_err_msg == '') && ($exception != '')){
      // https://www.php.net/manual/ja/exception.getmessage.php
      $getMessage = $exception->getMessage();
      $message = "Message:".$getMessage;
      $message .= "\nPrevious:".$exception->getPrevious();
      $message .= "\nCode:".$exception->getCode();
      $message .= "\nFile:".$exception->getFile();
      $message .= "\nLine:".$exception->getLine();
      // $message .= "\ngetTrace".$exception->getTrace();
      $message .= "\nTraceAsString:".$exception->getTraceAsString();

    }else{
      $message = $no_err_msg;
    }

    $events->message = $message;

    try {
      $events->save();
    } catch (\Exception $e) {
      // まだなにもしない
    }


    $event_id = $events->event_id;

    // _SERVER 取得
    $input_data = "{\n";
    if(isset($_SERVER['REDIRECT_STATUS'])){ $input_data .= " \"REDIRECT_STATUS\": \"{$_SERVER['REDIRECT_STATUS']}\" \n"; }
    if(isset($_SERVER['HTTP_HOST'])){ $input_data .= ", \"HTTP_HOST\": \"{$_SERVER['HTTP_HOST']}\" \n"; }
    if(isset($_SERVER['HTTP_CACHE_CONTROL'])){ $input_data .= ", \"HTTP_CACHE_CONTROL\": \"{$_SERVER['HTTP_CACHE_CONTROL']}\" \n"; }
    if(isset($_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'])){ $input_data .= ", \"HTTP_UPGRADE_INSECURE_REQUESTS\": \"{$_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS']}\" \n"; }
    if(isset($_SERVER['HTTP_USER_AGENT'])){ $input_data .= ", \"HTTP_USER_AGENT\": \"{$_SERVER['HTTP_USER_AGENT']}\" \n"; }
    if(isset($_SERVER['HTTP_SEC_FETCH_USER'])){ $input_data .= ", \"HTTP_SEC_FETCH_USER\": \"{$_SERVER['HTTP_SEC_FETCH_USER']}\" \n"; }
    if(isset($_SERVER['HTTP_ACCEPT'])){ $input_data .= ", \"HTTP_ACCEPT\": \"{$_SERVER['HTTP_ACCEPT']}\" \n"; }
    if(isset($_SERVER['HTTP_SEC_FETCH_SITE'])){ $input_data .= ", \"HTTP_SEC_FETCH_SITE\": \"{$_SERVER['HTTP_SEC_FETCH_SITE']}\" \n"; }
    if(isset($_SERVER['HTTP_SEC_FETCH_MODE'])){ $input_data .= ", \"HTTP_SEC_FETCH_MODE\": \"{$_SERVER['HTTP_SEC_FETCH_MODE']}\" \n"; }
    if(isset($_SERVER['HTTP_ACCEPT_ENCODING'])){ $input_data .= ", \"HTTP_ACCEPT_ENCODING\": \"{$_SERVER['HTTP_ACCEPT_ENCODING']}\" \n"; }
    if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){ $input_data .= ", \"HTTP_ACCEPT_LANGUAGE\": \"{$_SERVER['HTTP_ACCEPT_LANGUAGE']}\" \n"; }
    if(isset($_SERVER['HTTP_COOKIE'])){ $input_data .= ", \"HTTP_COOKIE\": \"{$_SERVER['HTTP_COOKIE']}\" \n"; }
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ $input_data .= ", \"HTTP_X_FORWARDED_FOR\": \"{$_SERVER['HTTP_X_FORWARDED_FOR']}\" \n"; }
    if(isset($_SERVER['HTTP_X_FORWARDED_HOST'])){ $input_data .= ", \"HTTP_X_FORWARDED_HOST\": \"{$_SERVER['HTTP_X_FORWARDED_HOST']}\" \n"; }
    if(isset($_SERVER['HTTP_X_FORWARDED_SERVER'])){ $input_data .= ", \"HTTP_X_FORWARDED_SERVER\": \"{$_SERVER['HTTP_X_FORWARDED_SERVER']}\" \n"; }
    if(isset($_SERVER['SERVER_PORT'])){ $input_data .= ", \"SERVER_PORT\": \"{$_SERVER['SERVER_PORT']}\" \n"; }
    if(isset($_SERVER['REMOTE_ADDR'])){ $input_data .= ", \"REMOTE_ADDR\": \"{$_SERVER['REMOTE_ADDR']}\" \n"; }
    if(isset($_SERVER['SCRIPT_FILENAME'])){ $input_data .= ", \"SCRIPT_FILENAME\": \"{$_SERVER['SCRIPT_FILENAME']}\" \n"; }
    if(isset($_SERVER['REMOTE_PORT'])){ $input_data .= ", \"REMOTE_PORT\": \"{$_SERVER['REMOTE_PORT']}\" \n"; }
    if(isset($_SERVER['REDIRECT_QUERY_STRING'])){ $input_data .= ", \"REDIRECT_QUERY_STRING\": \"{$_SERVER['REDIRECT_QUERY_STRING']}\" \n"; }
    if(isset($_SERVER['REDIRECT_URL'])){ $input_data .= ", \"REDIRECT_URL\": \"{$_SERVER['REDIRECT_URL']}\" \n"; }
    if(isset($_SERVER['GATEWAY_INTERFACE'])){ $input_data .= ", \"GATEWAY_INTERFACE\": \"{$_SERVER['GATEWAY_INTERFACE']}\" \n"; }
    if(isset($_SERVER['SERVER_PROTOCOL'])){ $input_data .= ", \"SERVER_PROTOCOL\": \"{$_SERVER['SERVER_PROTOCOL']}\" \n"; }
    if(isset($_SERVER['REQUEST_METHOD'])){ $input_data .= ", \"REQUEST_METHOD\": \"{$_SERVER['REQUEST_METHOD']}\" \n"; }
    if(isset($_SERVER['QUERY_STRING'])){ $input_data .= ", \"QUERY_STRING\": \"{$_SERVER['QUERY_STRING']}\" \n"; }
    if(isset($_SERVER['REQUEST_URI'])){ $input_data .= ", \"REQUEST_URI\": \"{$_SERVER['REQUEST_URI']}\" \n"; }
    if(isset($_SERVER['SCRIPT_NAME'])){ $input_data .= ", \"SCRIPT_NAME\": \"{$_SERVER['SCRIPT_NAME']}\" \n"; }
    if(isset($_SERVER['PHP_SELF'])){ $input_data .= ", \"PHP_SELF\": \"{$_SERVER['PHP_SELF']}\" \n"; }
    if(isset($_SERVER['REQUEST_TIME_FLOAT'])){ $input_data .= ", \"REQUEST_TIME_FLOAT\": \"{$_SERVER['REQUEST_TIME_FLOAT']}\" \n"; }
    if(isset($_SERVER['REQUEST_TIME'])){ $input_data .= ", \"REQUEST_TIME\": \"{$_SERVER['REQUEST_TIME']}\" \n"; }
    $input_data .= '}';

    try {
      $events_doru_server = events_doru_server::insert([
          ['event_id' => $event_id, 'data' => $input_data],
      ]);
    } catch (\Exception $e) {
      // まだなにもしない
    }

    // request header 取得
    $input_data = '';
    $getallheaders = getallheaders();
    if($getallheaders != false){
      foreach ($getallheaders as $key => $value) {
        if($input_data == ''){
          $input_data = "{\n";
        }else{
          $input_data .= ", ";
        }
        $input_data .= "\"{$key}\": \"{$value}\" \n";
      }
      $input_data .= '}';

      try {
        $events_request_header = events_request_header::insert([
            ['event_id' => $event_id, 'data' => $input_data],
        ]);
      } catch (\Exception $e) {
        // まだなにもしない
      }
    }

    // responce header 取得
    $input_data = '';
    $headers_list = headers_list();
    if($headers_list != false){
      foreach ($headers_list as $key => $value) {
        if($input_data == ''){
          $input_data = "{\n";
        }else{
          $input_data .= ", ";
        }
        $input_data .= "\"{$key}\": \"{$value}\" \n";
      }
      $input_data .= '}';

      try {
        $events_responce_header = events_responce_header::insert([
            ['event_id' => $event_id, 'data' => $input_data],
        ]);
      } catch (\Exception $e) {
        // まだなにもしない
      }
      $problem_url = $_SERVER["REQUEST_URI"];
      $problem_url =str_replace("&","＆",$problem_url);
      $msg = "[info][title]".$title."[/title]";
      $msg .= "エラーURL: ".$problem_url."\n";
      $msg .= "エラーメッセージ:　".$getMessage."\n";
      $msg .= "URL:https://rifa.life/evaProject/event/list/{$event_id}\n";
      $msg .= "[/info]\n";
      $token = 'bot';
      $room = '150036002';

      PushChatwork::Push($msg,$room,$token);
      if($jsonfiles !== ''){
        try {
          $events_upload_files = events_upload_files::insert([
            ['event_id' => $event_id, 'data' => $jsonfiles],
          ]);
        } catch (\Exception $e) {
          // まだなにもしない
        }
      }
    }

  }// end db_save




}
