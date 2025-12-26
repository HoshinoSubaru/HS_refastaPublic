<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $connection = "refasta_logs";

    protected $table = "events";

    protected $primaryKey = "event_id";


    public function readmore()
    {
      $msg = $this->message;
      $short_msg = mb_strimwidth($msg, 0, 2000, "...");
      $html = "<div >{$short_msg}</div>";
      $html .= "<a data-toggle='collapse' href='#{$this->event_id}_msg'>表示・非表示</a>";
      $html .= "<div class='collapse' id='{$this->event_id}_msg'>{$msg}</div>";
      return $html;
    }


}
