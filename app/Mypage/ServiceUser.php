<?php

namespace App\Mypage;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    protected $connection = "mysql_mypage";

    protected $table = "service_users";

    protected $primaryKey = "id";

}
