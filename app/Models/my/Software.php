<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
  protected $table = 'software';
  protected $fillable = [
    'soft_id',
    'type',
    'description',
    'license',
    'exp_year'
  ];
}
