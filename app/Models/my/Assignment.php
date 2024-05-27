<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
  protected $table = 'assignment';
  protected $fillable = ['fs_id', 'emp_id', 'hd_id', 't_id'];
}
