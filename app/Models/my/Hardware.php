<?php

namespace App\Models\my;

use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
  protected $table = 'hardware_devices';

  protected $fillable = [
    'hd_id',
    'item',
    'type',
    'date_Procured',
    'ownership',
    'gass_Sto',
    'code_number',
    'asset_classification',
    'model_number',
    'serial_number',
    'aquisition_cost',
    'property_number'
  ];
}
