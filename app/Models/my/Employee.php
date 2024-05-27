<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  protected $table = 'employee';
  protected $fillable = ['emp_id', 'firstName', 'lastName', 'middleName'];
}
