<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
      if(isset($_SERVER["HTTP_X_FORWARDED_HOST"])){
        $domain = $_SERVER["HTTP_X_FORWARDED_HOST"];
      }else{
        $domain = 'kinkaimasu.jp';
      }
      $current_page_pass = $_SERVER["REQUEST_URI"] ?? "";


      // if(isset($_GET["line_testtest"])){
        // var_dump($_SERVER["HTTP_USER_AGENT"]);
        // lineブラウザの場合は openExternalBrowser=1をつける。
        if(isset($_SERVER["HTTP_USER_AGENT"])){
          $HTTP_USER_AGENT = $_SERVER["HTTP_USER_AGENT"];
        }else{
          $HTTP_USER_AGENT = "";
        }

        if(strstr($HTTP_USER_AGENT, ' Line/')){
          if(!isset($_GET["openExternalBrowser"])){
            $none_wp_current_page_pass = str_replace("refasta_public/", "", $current_page_pass);
            $none_wp_current_page_pass = str_replace("/mailingkit/", "/delivery/", $none_wp_current_page_pass);
            if(stristr($none_wp_current_page_pass, '?')){
              $none_wp_array = explode('?', $none_wp_current_page_pass);
              $none_wp_current_page_pass = $none_wp_array[0];
            }
            $redirect = "https://{$domain}{$none_wp_current_page_pass}";
            if((isset($_GET)) && (count($_GET) > 0)){
              $get_param = "";
              foreach ($_GET as $key => $value) {
                if($get_param != ""){
                  $get_param .= '&';
                }
                $get_param .= "{$key}={$value}";
              }
              $redirect .= "?{$get_param}&openExternalBrowser=1";
            }else{
              $redirect .= "?openExternalBrowser=1";
            }
            header("Location: {$redirect}");
            exit;
          }
        }
      // }


    }

}
