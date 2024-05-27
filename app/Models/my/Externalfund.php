<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Externalfund extends Model
{
  protected $table = 'externally_funded_project';
  protected $fillable = ['project_id', 'funder_name'];
}
