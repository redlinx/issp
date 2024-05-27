<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Fronlineservices extends Model
{
  protected $table = 'frontline_services';

  protected $fillable = ['fs_id', 'services'];
}
