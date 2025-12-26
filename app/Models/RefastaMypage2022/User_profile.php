<?php

namespace App\Models\RefastaMypage2022;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    protected $table = "refasta_mypage_2022.user_profiles";

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
