<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class events_responce_header extends Model
{
    protected $connection = "refasta_logs";

    protected $table = "events_responce_header";

    protected $primaryKey = "event_id";





}
