<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\my\Project;
use Illuminate\Support\Facades\Crypt;

class getprojdata extends Controller
{
  public function getData(Request $request)
  {
    $id = Crypt::decryptString($request->id);
    $data = Project::where('proj_id', $id)->first();
    return response()->json(['data' => $data]);
  }
}
