<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrmis extends Model
{
  protected $connection = 'mysql2';

  protected $table = 'users';
  protected $fillable = ['email'];
}
