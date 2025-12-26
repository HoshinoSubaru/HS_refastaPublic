<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
  protected $table = "toiawase_files";

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
}
