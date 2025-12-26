<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\SimpleMail;
use App\Chatwork\PushChatwork;

//メール関連
use Illuminate\Support\Facades\Mail;
use App\Mail\PushMessage;

use App\Eoc_takuhai;

class TestController extends Controller
{
  public function index(Request $request)
  {
    $firebase_id = $request->session()->get('firebase_id');
    var_dump($firebase_id);
    return "aaa";
  }


  public function mail_send_test()
  {

  }

}
