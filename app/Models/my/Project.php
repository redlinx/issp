<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = 'project';
  protected $fillable = ['proj_id', 'project_Name', 'office', 'project_started', 'project_ended', 'proj_fund'];
}
