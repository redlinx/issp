<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
  protected $table = 'server';
  protected $fillable = ['total_Capacity', 'location'];
}
