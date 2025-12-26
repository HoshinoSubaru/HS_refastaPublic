<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mail_magazine_open_logs;

class Mail_magazine_openController extends Controller
{
    public function index(Request $request, $send_mail_id = "", $mailaddress = "")
    {
        if (($send_mail_id === "") or ($mailaddress === "")) {
            return "<script></script>";
        }
        $log = new Mail_magazine_open_logs();
        $log->send_mail_id = $send_mail_id;
        $log->mailaddress = $mailaddress;
        $log->opened_at = date("Y-m-d H:i:s");
        $log->user_agent = $request->header('User-Agent');
        $log->save();
        return "";
    }
}
