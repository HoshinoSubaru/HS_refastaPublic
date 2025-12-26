<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class events_upload_files extends Model
{
    protected $connection = "refasta_logs";

    protected $table = "events_upload_files";

    protected $primaryKey = "event_id";





}
