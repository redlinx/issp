<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Projectencryption extends Model
{
  protected $table = 'project';
  protected $fillable = ['proj_id', 'project_Name', 'office', 'project_started', 'project_ended'];

  protected function proj_id(): Attribute
  {
    return Attribute::make(get: fn (string $proj_id) => Crypt::encryptString($proj_id));
  }
}
