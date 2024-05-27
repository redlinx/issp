<?php

namespace App\Models\my;


use Illuminate\Database\Eloquent\Model;

class Bridgelink extends Model
{
  protected $table = 'bridge_link';
  protected $fillable = [
    'hd_id',
    'soft_id'
  ];
}
