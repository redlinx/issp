<?php

namespace App\Http\Controllers\Software;

use App\Http\Controllers\Controller;
use App\Models\my\Software;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Softwareproccess extends Controller
{
  public function addSoftware()
  {
    return view('content.Software.addsoftware');
  }

  public function addingSoftware(Request $request)
  {
    try {

      if ($request->stype == 'os') {
        $typeval = 'Operating System';
      } else if ($request->stype == 'oas') {
        $typeval = 'Office Automation Software';
      }
      Software::create([
        'type' => $typeval,
        'description' => $request->sdescription,
        'license' => $request->licensetype,
        'exp_year' => $request->expyear
      ]);

      return response()->json([
        'status_code' => 0,
      ]);
    } catch (Exception $e) {
      return response()->json([
        'status_code' => 1,
        'msg' => $e->getMessage()
      ]);
    }
  }

  public function updateSoftware()
  {
    $softwares = Software::paginate(15);
    return view('content.Software.updatesoftware', compact('softwares'));
  }

  public function deleteSoftware(Request $request)
  {
    try {
      $id = Crypt::decryptString($request->id);

      $delete = Software::where('soft_id', $id)->delete();

      if ($delete) {
        return response()->json(['status_code' => 0]);
      }

      throw new Exception('Unable to delete Software!');
    } catch (Exception $e) {
      return response()->json([
        'status_code' => 1,
        'msg' => $e->getMessage()
      ]);
    } catch (DecryptException $e) {
      return response()->json([
        'status_code' => 1,
        'msg' => $e->getMessage()
      ]);
    }
  }

  public function getsoftinfo(Request $request)
  {
    $id = Crypt::decryptString($request->id);
    $data = Software::where('soft_id', $id)->first();
    return response()->json(['data' => $data]);
  }

  public function updatingsoftware(Request $request)
  {
    try {
      $sid = $request->sid;
      $s = Software::where('soft_id', $sid)->update([
        'type' => $request->stype,
        'description' => $request->sdescription,
        'license' => $request->licensetype,
        'exp_year' => $request->expyear
      ]);

      if ($s) {
        return response()->json([
          'status_code' => 0,
        ]);
      }
      throw new Exception('Unable to update Software');
    } catch (Exception $e) {
      return response()->json([
        'statud_code' => 1,
        'msg' => $e->getMessage()
      ]);
    }
  }

  public function searchSoftware(Request $request)
  {
    $search = $request->search;

    try {
      $softwares = Software::where('type', 'like', "%$search%")
        ->orwhere('description', 'like', "%$search%")
        ->orwhere('license', 'like', "%$search%")
        ->paginate(15);

      if (!$softwares) {
        throw new Exception('No Results Found!');
      }

      return view('content.Software.searchsoftware', compact('softwares'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
