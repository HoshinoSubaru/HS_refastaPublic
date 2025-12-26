<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefiningInfoShop extends Mailable
{
    use Queueable, SerializesModels;

    public $requestData;
    protected $angouka_mailaddress;
    public $mailData;

    public function __construct(Request $request, $mailData, $angouka_mailaddress = '')
    {
        $this->requestData = $request->all();
        $this->angouka_mailaddress = $angouka_mailaddress;
        $this->mailData = $mailData['ingotDetails'] ?? [];
    }

    public function build()
    {
        return $this->view('emails.refining_info_plain_shop')
        ->with([
            'ingotDetails' => $this->mailData['ingotDetails'] ?? [], // 正しい変数を使用する
        ])
                    ->subject('【金地金精錬分割加工サービス申込【申込完了】');
    }
}