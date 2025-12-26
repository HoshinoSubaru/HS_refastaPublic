<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Auth;

class PushMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;//件名
    protected $referer;
    protected $data;//入力内容
    protected $text;
    protected $type;//入力タイプ（見積もり、宅配）
    protected $send_type;//ユーザー宛てか、ラウンジ宛てか
    protected $files_path;//ファイルのパス
    protected $angouka_mailaddress;//暗号化アドレス

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$title,$type,$send_type,$referer ='',$files_path = '',$angouka_mailaddress = '', $reply_email = '')
    {
      // $this->title = sprintf('%sさん、ありがとうございます。', $name);
      // $this->text = $text;
        $this->data = $data;
        $this->title = $title;
        $this->type = $type;
        $this->send_type = $send_type;
        $this->referer = $referer;
        $this->files_path = $files_path;
        $this->angouka_mailaddress = $angouka_mailaddress;
        $this->reply_email = $reply_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('emails.mailingkit')
        //             ->text('emails.mailingkit_plain')
        //             ->subject($this->title)
        //             ->with([
        //                 'text' => $this->text,
        //               ]);
        if($this->reply_email != "")
        {
          return $this->text('emails.'.$this->type.'_plain_'.$this->send_type,[
            'input_values' => $this->data,
            'referer' => $this->referer,
            'files_path' => $this->files_path,
            'angouka_mailaddress' => $this->angouka_mailaddress,
          ])
                      ->replyTo($this->reply_email)
                      ->subject($this->title)
                      ->with([
                          'text' => $this->text,
                        ]);
        }else{
          return $this->text('emails.'.$this->type.'_plain_'.$this->send_type,[
            'input_values' => $this->data,
            'referer' => $this->referer,
            'files_path' => $this->files_path,
            'angouka_mailaddress' => $this->angouka_mailaddress,
          ])
                      ->subject($this->title)
                      ->with([
                          'text' => $this->text,
                        ]);
        }
        
    }
}
