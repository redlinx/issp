<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Internalfund extends Model
{
  protected $table = 'internally_funded_project';
  protected $fillable = ['proj_id', 'funder_name'];
}
