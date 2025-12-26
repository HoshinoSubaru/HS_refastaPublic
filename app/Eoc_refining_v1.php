<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eoc_refining_v1 extends Model
{
  protected $table = "Eoc_refining_v1";
  
  // Mass Assignment用
  protected $guarded = [];

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
}