<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
  protected $table = 'training';
  protected $fillable = ['training_description'];
}
