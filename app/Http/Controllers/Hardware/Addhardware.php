<?php

namespace App\Http\Controllers\Hardware;

use App\Http\Controllers\Controller;
use App\Models\my\Assignment;
use App\Models\my\Bridgelink;
use Illuminate\Http\Request;
use App\Models\my\Server;
use App\Models\my\Hardware;
use App\Models\my\Project;
use App\Models\my\Employee;
use App\Models\my\Fronlineservices;
use App\Models\my\Software;
use App\Models\my\Training;
use App\Models\my\Training_assignment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Addhardware extends Controller
{
  public function addinput()
  {
    $years = Carbon::now()->format('Y');
    $projects = Project::all();
    $employees = Employee::all();
    $trainings = Training::all();
    $fservices = Fronlineservices::all();
    $softwares = Software::where('type', '!=', 'Operating System')->get();
    return view('content.Hardware.addhardware', compact('projects', 'employees', 'years', 'trainings', 'fservices', 'softwares'));
  }

  public function addinginput(Request $request)
  {
    try {
      if ($request->tycd == 'server') {

        $validatedata = $request->validate([
          'item' => ['required'],
          'codenumber' => ['required'],
          'assetclassification' => ['required'],
          'modelnumber' => ['required'],
          'serialnumber' => ['required'],
          'aquisitioncost' => ['required'],
          'inventorynum' => ['required'],
          'acquisitiondate' => ['required']
        ]);

        $gassval = '0';
        $projid = '';

        if ($request->gass == 'supported') {
          $gassval = '1';
        }

        if (!empty($request->projectvalue)) {
          $projid = Crypt::decryptString($request->projectvalue);
        }

        $model = Hardware::create([
          'item' => $request->item,
          'type' => 'Server',
          'date_Procured' => $request->acquisitiondate,
          'ownership' => $request->ownership,
          'gass_Sto' => $gassval,
          'proj_id' => $projid,
          'code_number' => $request->codenumber,
          'asset_classification' =>  $request->assetclassification,
          'model_number' => $request->modelnumber,
          'serial_number' => $request->serialnumber,
          'aquisition_cost' => $request->aquisition_cost,
          'property_number' => $request->inventorynum
        ]);

        $lastInsertedId = Hardware::where('serial_number', $model->serial_number)->first();

        Server::create([
          'hd_id' => $lastInsertedId->hd_id,
          'total_Capacity' => $request->tcoh,
          'location' => $request->slocation
        ]);

        if ($request->operation == 'employee') {

          $drcyptempvalue = Crypt::decryptString($request->empvalue);
          Assignment::create([
            'emp_id' => $drcyptempvalue,
            'hd_id' => $lastInsertedId->hd_id
          ]);
        } else if ($request->operation == 'frontlineservices') {

          $dcryptfsvalue = Crypt::decryptString($request->fsvalue);
          Assignment::create([
            'fs_id' => $dcryptfsvalue,
            'hd_id' => $lastInsertedId->hd_id
          ]);
        } else if ($request->operation == 'training') {

          $amodel = Assignment::create([
            'hd_id' => $lastInsertedId->hd_id
          ]);

          $lastinsertamodel = Assignment::where('hd_id', $amodel->hd_id)->first();
          $dcrypttid = Crypt::decryptString($request->tvalue);

          Training_assignment::create([
            'ass_id' => $lastinsertamodel->ass_id,
            't_id' => $dcrypttid
          ]);
        }

        return response()->json([
          'status_code' => 0
        ]);
      } else if ($request->tycd == 'desktoppc' || $request->tycd == 'laptop') {

        $validatedata = $request->validate([
          'item' => ['required'],
          'codenumber' => ['required'],
          'assetclassification' => ['required'],
          'modelnumber' => ['required'],
          'serialnumber' => ['required'],
          'aquisitioncost' => ['required'],
          'inventorynum' => ['required'],
          'acquisitiondate' => ['required']
        ]);

        $gassval = '0';
        $projid = '';

        if ($request->gass == 'support') {
          $gassval = '1';
        }

        if (!empty($request->projectvalue)) {
          $projid = Crypt::decrypt($request->projectvalue);
        }

        if ($request->tycd == 'desktoppc') {
          $val = 'Desktop PC';
        } else if ($request->tycd == 'laptop') {
          $val = 'Laptop';
        }

        $model = Hardware::create([
          'item' => $request->item,
          'type' => $val,
          'date_Procured' => $request->acquisitiondate,
          'ownership' => $request->ownership,
          'gass_Sto' => $gassval,
          'proj_id' => $projid,
          'code_number' => $request->codenumber,
          'asset_classification' => $request->assetclassification,
          'model_number' => $request->modelnumber,
          'serial_number' => $request->serialnumber,
          'aquisition_cost' => $request->aquisitioncost,
          'property_number' => $request->inventorynum
        ]);

        $hdid = Hardware::where('serial_number', $model->serial_number)->first();

        if (!empty($request->softvalue)) {
          $dcryptsoftid = Crypt::decryptString($request->softvalue);

          Bridgelink::create([
            'hd_id' => $hdid->hd_id,
            'soft_id' => $dcryptsoftid
          ]);
        }

        if ($request->operation == 'employee') {

          $drcyptempvalue = Crypt::decryptString($request->empvalue);
          Assignment::create([
            'emp_id' => $drcyptempvalue,
            'hd_id' => $hdid->hd_id
          ]);
        } else if ($request->operation == 'frontlineservices') {

          $dcryptfsvalue = Crypt::decryptString($request->fsvalue);
          Assignment::create([
            'fs_id' => $dcryptfsvalue,
            'hd_id' => $hdid->hd_id
          ]);
        } else if ($request->operation == 'training') {
          $amodel = Assignment::create([
            'hd_id' => $hdid->hd_id
          ]);

          $lastinsertamodel = Assignment::where('hd_id', $amodel->hd_id)->first();
          $dcrypttid = Crypt::decryptString($request->tvalue);

          Training_assignment::create([
            'ass_id' => $lastinsertamodel->ass_id,
            't_id' => $dcrypttid
          ]);
        }

        return response()->json([
          'status_code' => 0
        ]);
      } else if ($request->tycd == 'other') {

        $validatedata = $request->validate([
          'item' => ['required'],
          'codenumber' => ['required'],
          'assetclassification' => ['required'],
          'modelnumber' => ['required'],
          'serialnumber' => ['required'],
          'aquisitioncost' => ['required'],
          'inventorynum' => ['required'],
          'acquisitiondate' => ['required']
        ]);

        $gassval = '0';
        $projid = '';

        if ($request->gass == 'support') {
          $gassval = '1';
        }

        if (!empty($request->projectvalue)) {
          $projid = Crypt::decrypt($request->projectvalue);
        }

        $model = Hardware::create([
          'item' => $request->item,
          'type' => $request->spectype,
          'date_Procured' => $request->acquisitiondate,
          'ownership' => $request->ownership,
          'gass_Sto' => $gassval,
          'proj_id' => $projid,
          'code_number' => $request->codenumber,
          'asset_classification' => $request->assetclassification,
          'model_number' => $request->modelnumber,
          'serial_number' => $request->serialnumber,
          'aquisition_cost' => $request->aquisitioncost,
          'property_number' => $request->inventorynum
        ]);

        $hdid = Hardware::where('serial_number', $model->serial_number)->first();

        if ($request->operation == 'employee') {
          $drcyptempvalue = Crypt::decryptString($request->empvalue);
          Assignment::create([
            'emp_id' => $drcyptempvalue,
            'hd_id' => $hdid->hd_id
          ]);
        } else if ($request->operation == 'frontlineservices') {
          $dcryptfsvalue = Crypt::decryptString($request->fsvalue);
          Assignment::create([
            'fs_id' => $dcryptfsvalue,
            'hd_id' => $hdid->hd_id
          ]);
        } else if ($request->operation == 'training') {

          $amodel = Assignment::create([
            'hd_id' => $hdid->hd_id
          ]);

          $lastinsertamodel = Assignment::where('hd_id', $amodel->hd_id)->first();
          $dcrypttid = Crypt::decryptString($request->tvalue);

          Training_assignment::create([
            'ass_id' => $lastinsertamodel->ass_id,
            't_id' => $dcrypttid
          ]);
        }

        return response()->json([
          'status_code' => 0
        ]);
      }
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
}
