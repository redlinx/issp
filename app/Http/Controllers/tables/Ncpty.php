<?php

namespace App\Http\Controllers\tables;

use App\Models\my\Hardware;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Ncpty extends Controller
{
  public function ncptyDisplay(){
    $years = Carbon::now()->format('Y');
    $hardwares = Hardware::selectRaw('
      type,
      count(CASE WHEN ownership = "owned" AND YEAR(date_procured) = '.$years.' THEN 1 END) as current_owned,
      count(CASE WHEN ownership != "owned" AND YEAR(date_procured) = '.$years.' THEN 1 END) as current_leased,

      count(CASE WHEN ownership = "owned" AND YEAR(date_procured) = '.($years-1).' THEN 1 END) as last_year_owned,
      count(CASE WHEN ownership != "owned" AND YEAR(date_procured) = '.($years-1).' THEN 1 END) as last_year_leased,

      count(CASE WHEN ownership = "owned" AND YEAR(date_procured) = '.($years-2).' THEN 1 END) as last_2_year_owned,
      count(CASE WHEN ownership != "owned" AND YEAR(date_procured) = '.($years-2).' THEN 1 END) as last_2_year_leased,

      count(CASE WHEN ownership = "owned" AND YEAR(date_procured) <'.($years-2).' THEN 1 END) as more_years_owned,
      count(CASE WHEN ownership != "owned" AND YEAR(date_procured) <'.($years-2).' THEN 1 END) as more_years_leased
    ')
    ->groupBy('type')
    ->get();

    return view('content.tables.ncpty', compact("years", "hardwares"));
  }
}
