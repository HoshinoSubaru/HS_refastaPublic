<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class events_doru_server extends Model
{
    protected $connection = "refasta_logs";

    protected $table = "events_doru_server";

    protected $primaryKey = "event_id";


protected $fillable = [
    'event_id',
    'data'
];


}
