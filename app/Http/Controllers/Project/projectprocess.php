<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\my\Assignment;
use App\Models\my\Bridgelink;
use App\Models\my\Employee;
use App\Models\my\Externalfund;
use App\Models\my\Fronlineservices;
use App\Models\my\Hardware;
use App\Models\my\Internalfund;
use App\Models\my\Operating_system;
use App\Models\my\Project;
use App\Models\my\Projectencryption;
use App\Models\my\Server;
use App\Models\my\Software;
use App\Models\my\Training;
use App\Models\my\Training_assignment;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use PhpParser\Node\Expr\Assign;
use PHPUnit\Event\Runtime\OperatingSystem;

class projectprocess extends Controller
{
  public function addproject()
  {

    $employees = Employee::paginate(10);
    $tservices = Training::paginate(10);
    $fservices = Fronlineservices::paginate(10);
    $softwares = Software::where('type', 'Office Automation Software')->paginate(10);

    return view('.content.project.createproj', compact('employees', 'tservices', 'fservices', 'softwares'));
  }

  public function addingproject(Request $request)
  {

    try {
      $pname = $request->pname;
      $pstarted = $request->pstarted;
      $office = $request->office;
      $pfund = $request->projfund;
      $funder = $request->funder;

      if (empty($pname) || empty($pstarted) || empty($office) || empty($funder)) {
        throw new Exception("Project name, Project date, Office, Funder must not be null");
      }

      $record = Project::where('project_Name', $pname)->first();

      if (!$record) {

        if ($pfund == 'externallyfund') {
          $fundtype = 'Externally Funded';
        } else if ($pfund == 'internallyfund') {
          $fundtype = 'Internally Funded';
        }

        $pid = Project::create(['project_Name' => $pname, 'project_started' => $pstarted, 'office' => $office, 'proj_fund' => $fundtype]);
      } else {
        throw new Exception("Project already Exist!");
      }

      $projid = Project::where('project_Name', $pid->project_Name)->first();

      if ($pfund == 'externallyfund') {
        $check = Externalfund::create([
          'project_id' => $projid->proj_id,
          'funder_name' => $funder
        ]);

        if (!$check) {
          throw new Exception('Unable to Add Funder');
        }
      } else if ($pfund == 'internallyfund') {
        $check = Internalfund::create([
          'proj_id' => $projid->proj_id,
          'funder_name' => $funder
        ]);

        if (!$check) {
          throw new Exception('Unable to Add Funder');
        }
      }


      return response()->json([
        'status_code' => 0,
      ]);
    } catch (Exception $e) {
      return response()->json([
        'statud_code' => 1,
        'msg' => $e->getMessage()
      ]);
    }
  }

  public function updateproject()
  {

    $exfunds = Project::where('proj_fund', 'Externally Funded')->paginate(15);
    $infunds = Project::where('proj_fund', 'Internally Funded')->paginate(15);
    return view('content.project.updateproj', compact('exfunds', 'infunds'));
  }

  public function searchExfunds(Request $request)
  {
    $search = $request->searchInput;

    try {
      $exfunds = Project::where('proj_fund', 'Externally Funded')
        ->where(function ($query) use ($search) {
          $query->orwhere('project_Name', 'like', "%$search%")
            ->orwhere('office', 'like', "%$search%");
        })
        ->paginate(15);

      if (!$exfunds) {
        throw new Exception('No results found!');
      }

      return view('content.project.searchexfunds', compact('exfunds'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function searchInfunds(Request $request)
  {
    $search = $request->search;

    try {
      $infunds = Project::where('proj_fund', 'Internally Funded')
        ->where(function ($query) use ($search) {
          $query->orwhere('project_Name', 'like', "%$search%")
            ->orwhere('office', 'like', "%$search%");
        })
        ->paginate(15);

      if (!$infunds) {
        throw new Exception('No results found');
      }

      return view('content.project.searchinfunds', compact('infunds'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function deleteproject(Request $request)
  {

    try {

      $dcrypt = Crypt::decryptString($request->id);


      $hdid = Hardware::select('hd_id')
        ->where('proj_id', $dcrypt)->pluck('hd_id')->toArray();


      $deleteass = Assignment::whereIn('hd_id', $hdid)->delete();

      $deleteserver = Server::whereIn('hd_id', $hdid)->delete();

      $softid = Bridgelink::select('soft_id')
        ->whereIn('hd_id', $hdid)->pluck('soft_id')->toArray();

      $deletelink = Bridgelink::whereIn('hd_id', $hdid)->delete();

      $deleteopsystem = Operating_System::whereIn('soft_id', $softid)->delete();

      $deletsoftware = Software::where('type', 'Operating System')->whereIn('soft_id', $softid)->delete();

      $deletehd = Hardware::whereIn('proj_id', $dcrypt)->delete();

      $check = Externalfund::where('project_id', $dcrypt)->first();

      if ($check) {
        Externalfund::where('project_id', $dcrypt)->delete();
        Project::where('proj_id', $dcrypt)->delete();
      } else {
        Internalfund::where('proj_id', $dcrypt)->delete();
        Project::where('proj_id', $dcrypt)->delete();
      }

      return response()->json([
        'status_code' => 0
      ]);
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

  public function editingproj(Request $request)
  {
    try {
      $pid = $request->pid;
      $pname = $request->pname;
      $office = $request->office;
      $pstarted = $request->pstarted;
      $pended = $request->pended;

      if (empty($pname) || empty($office) || empty($pstarted)) {
        throw new Exception('Project name, Project started, and Office must not be null');
      }

      Project::where('proj_id', $pid)->update([
        'project_Name' => $pname,
        'office' => $office,
        'project_started' => $pstarted,
        'project_ended' => $pended
      ]);

      return response()->json([
        'status_code' => 0
      ]);
    } catch (Exception $e) {
      return response()->json([
        'status_code' => 1,
        'msg' => $e->getMessage()
      ]);
    }
  }

  public function searchEmployee(Request $request)
  {
    $search = $request->searchEmployee;
    try {

      $employees = Employee::where('firstName', 'like', "%$search%")
        ->orwhere('middleName', 'like', "%$search%")
        ->orwhere('lastName', 'like', "%$search%")
        ->paginate(10);

      if (!$employees) {
        throw new Exception('No results Found!');
      }

      return view('content.project.searchemp', compact('employees'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function searchTrainingServices(Request $request)
  {
    $search = $request->searchts;

    try {

      $tservices = Training::where('training_description', 'like', "%$search%")
        ->paginate(10);

      if (!$tservices) {
        throw new Exception('No results Found!');
      }

      return view('content.project.searchts', compact('tservices'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function searchFrontlineServices(Request $request)
  {
    $search = $request->searchfs;
    try {

      $fservices = Fronlineservices::where('services', 'like', "%$search%")
        ->paginate(10);

      if (!$fservices) {
        throw new Exception('No results Found!');
      }

      return view('content.project.searchfs', compact('fservices'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function addHardware(Request $request)
  {

    try {
      $hardwareType = $request->hardwareType;

      if ($hardwareType == 'server') {

        $validate = $request->validate([
          'item' => ['required'],
          'codenumber' => ['required'],
          'assetclass' => ['required'],
          'modelnumber' => ['required'],
          'serialnumber' => ['required'],
          'acquisitioncost' => ['required'],
          'inventorynumber' => ['required'],
          'acquisitiondate' => ['required']
        ], [
          'item.required' => 'Item must not be null',
          'codenumber.required' => 'Code Number must not be null',
          'assetclass.required' => 'Asset Classification must not be null',
          'modelnumber.required' => 'Model Number must not be null',
          'serialnumber.required' => 'Serial Number must not be null',
          'acquisitioncost.required' => 'Acquisition cost must not be null',
          'inventorynumber.required' => 'Inventory number must not be null',
          'acquistiondate.required' => 'Acquistion date must not be null'
        ]);

        $gass = 0;

        if ($request->gass == 1) {
          $gass = 1;
        }

        $projid = Project::where('project_Name', $request->projid)->first();

        if (!$projid) {
          throw new Exception('Project does not exist');
        }

        $hardwareQuery = Hardware::create([
          'proj_id' => $projid->proj_id,
          'item' => $request->item,
          'type' => $request->hardwareType,
          'date_Procured' => $request->acquisitiondate,
          'ownership' => $request->ownership,
          'gass_Sto' => $gass,
          'code_number' => $request->codenumber,
          'asset_classification' => $request->assetclass,
          'model_number' => $request->modelnumber,
          'serial_number' => $request->modelnumber,
          'aquisition_cost' => $request->acquisitioncost,
          'property_number' => $request->inventorynumber
        ]);

        if (!$hardwareQuery) {
          throw new Exception('Unable to add hardware!');
        }

        $hdid = Hardware::where('code_number', $request->codenumber)->first();

        // $softid = Crypt::decryptString($request->softval);

        // $softwareQuery = Bridgelink::create([
        //   'hd_id' => $hdid->hd_id,
        //   'soft_id' => $softid,
        // ]);

        if ($request->selectoperator == 'employee') {
          $empid = Crypt::decryptString($request->empidval);

          $assign = Assignment::create([
            'emp_id' => $empid,
            'hd_id' => $hdid->hd_id
          ]);

          if (!$assign) {
            throw new Exception('Unable to add Hardware!');
          }
        } else if ($request->selectoperator == 'trainingservices') {

          $tid = Crypt::decryptString($request->tsidval);

          $assign = Assignment::create([
            't_id' => $tid,
            'hd_id' => $hdid->hd_id
          ]);
          if (!$assign) {
            throw new Exception('Unable  to  add Hardware!');
          }
        } else if ($request->selectoperator == 'frontlineservices') {

          $fsid = Crypt::decryptString($request->fsidval);

          $assign = Assignment::create([
            'fs_id' => $fsid,
            'hd_id' => $hdid->hd_id
          ]);

          if (!$assign) {
            throw new Exception('Unable to add Hardware!');
          }
        }



        return response()->json([
          'status_code' => 0
        ]);
      } else if ($hardwareType == 'desktoppc' || $hardwareType == 'laptop' || $hardwareType == 'mobilephone') {

        if ($hardwareType == 'desktoppc') {
          $hardwareType = 'Desktop PC';
        } else if ($hardwareType == 'laptop') {
          $hardwareType = 'Laptop';
        } else if ($hardwareType == 'mobilephone') {
          $hardwareType = 'Mobile Phone';
        }

        $validate = $request->validate([
          'opsystem' => ['required'],
          'item' => ['required'],
          'codenumber' => ['required'],
          'assetclass' => ['required'],
          'modelnumber' => ['required'],
          'serialnumber' => ['required'],
          'acquisitioncost' => ['required'],
          'inventorynumber' => ['required'],
          'acquisitiondate' => ['required']
        ], [
          'opsystem.required' => 'Operating System must not be null',
          'item.required' => 'Item must not be null',
          'codenumber.required' => 'Code Number must not be null',
          'assetclass.required' => 'Asset Classification must not be null',
          'modelnumber.required' => 'Model Number must not be null',
          'serialnumber.required' => 'Serial Number must not be null',
          'acquisitioncost.required' => 'Acquisition cost must not be null',
          'inventorynumber.required' => 'Inventory number must not be null',
          'acquistiondate.required' => 'Acquistion date must not be null'
        ]);

        $gass = 0;

        if ($request->gass == 1) {
          $gass = 1;
        }

        $projid = Project::where('project_Name', $request->projid)->first();

        if (!$projid) {
          throw new Exception('Project does not exist');
        }

        $hardwareQuery = Hardware::insertGetId([
          'proj_id' => $projid->proj_id,
          'item' => $request->item,
          'type' => $hardwareType,
          'date_Procured' => $request->acquisitiondate,
          'ownership' => $request->ownership,
          'gass_Sto' => $gass,
          'code_number' => $request->codenumber,
          'asset_classification' => $request->assetclass,
          'model_number' => $request->modelnumber,
          'serial_number' => $request->modelnumber,
          'aquisition_cost' => $request->acquisitioncost,
          'property_number' => $request->inventorynumber
        ]);

        if (!$hardwareQuery) {
          throw new Exception('Unable to add hardware!');
        }

        $software = Software::insertGetId([
          'type' => 'Operating System',
          'description' => $request->opsystem,
          'license' => $request->licensetype,
          'exp_year' => $request->expdate
        ]);

        $opsystem = Operating_system::insert([
          'soft_id' => $software
        ]);

        if (!$software || !$opsystem) {
          throw new Exception('Unable to add hardware!');
        }

        $assign = Bridgelink::create([
          'hd_id' => $hardwareQuery,
          'soft_id' => $software
        ]);

        if ($request->selectoperator == 'employee') {

          $id = Crypt::decryptString($request->empidval);

          $assign = Assignment::insert([
            'emp_id' => $id,
            'hd_id' => $hardwareQuery
          ]);
        } else if ($request->selectoperator == 'trainingservices') {

          $id = Crypt::decryptString($request->tsidval);

          $assign = Assignment::insert([
            't_id' => $id,
            'hd_id' => $hardwareQuery
          ]);
        } else if ($request->selectoperator == 'frontlineservices') {

          $id = Crypt::decryptString($request->fsidval);

          $assign = Assignment::insert([
            'fs_id' => $id,
            'hd_id' => $hardwareQuery
          ]);
        }

        $softid = Crypt::decryptString($request->softval);

        $soft = Bridgelink::insert([
          'hd_id' => $hardwareQuery,
          'soft_id' => $softid
        ]);
      } else if ($hardwareType == 'othertype') {

        $validate = $request->validate([
          'otheritemtype' => ['required'],
          'item' => ['required'],
          'codenumber' => ['required'],
          'assetclass' => ['required'],
          'modelnumber' => ['required'],
          'serialnumber' => ['required'],
          'acquisitioncost' => ['required'],
          'inventorynumber' => ['required'],
          'acquisitiondate' => ['required']
        ], [
          'otheritemtype.required' => 'Must Specify Item Type',
          'item.required' => 'Item must not be null',
          'codenumber.required' => 'Code Number must not be null',
          'assetclass.required' => 'Asset Classification must not be null',
          'modelnumber.required' => 'Model Number must not be null',
          'serialnumber.required' => 'Serial Number must not be null',
          'acquisitioncost.required' => 'Acquisition cost must not be null',
          'inventorynumber.required' => 'Inventory number must not be null',
          'acquistiondate.required' => 'Acquistion date must not be null'
        ]);

        $gass = 0;

        if ($request->gass == 1) {
          $gass = 1;
        }

        $projid = Project::where('project_Name', $request->projid)->first();

        if (!$projid) {
          throw new Exception('Project does not exist');
        }

        $hardwareQuery = Hardware::create([
          'proj_id' => $projid->proj_id,
          'item' => $request->item,
          'type' => $request->otheritemtype,
          'date_Procured' => $request->acquisitiondate,
          'ownership' => $request->ownership,
          'gass_Sto' => $gass,
          'code_number' => $request->codenumber,
          'asset_classification' => $request->assetclass,
          'model_number' => $request->modelnumber,
          'serial_number' => $request->modelnumber,
          'aquisition_cost' => $request->acquisitioncost,
          'property_number' => $request->inventorynumber
        ]);

        if (!$hardwareQuery) {
          throw new Exception('Unable to add Hardware!');
        }

        if ($request->selectoperator == 'employee') {

          $id = Crypt::decryptString($request->empidval);

          $assign = Assignment::create([
            'hd_id' => $hardwareQuery->hd_id,
            'emp_id' => $id
          ]);
        } else if ($request->selectoperator == 'trainingservices') {

          $id = Crypt::decryptString($request->tsidval);

          $assign = Assignment::create([
            'hd_id' => $hardwareQuery->hd_id,
            't_id' => $id
          ]);
        }
      }

      return response()->json([
        'status_code' => 0
      ]);
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

  public function displayHardwares(Request $request)
  {

    try {
      $projid = Crypt::decryptString($request->id);

      $hardwares = Hardware::where('proj_id', $projid)->paginate(10);

      if (empty($hardwares)) {
        throw new Exception('There are no Hardwares in this project');
      }

      return view('content.project.displayhardwares', compact('hardwares'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function displaySoftwares(Request $request)
  {
    try {

      $hdid = Crypt::decryptString($request->id);

      $softwareids = Bridgelink::where('hd_id', $hdid)->pluck('soft_id');

      $softwares = Software::whereIn('soft_id', $softwareids)->paginate(10);

      return view('content.project.displaysoftware', compact('softwares'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function getHardwareInfo(Request $request)
  {

    $id = Crypt::decryptString($request->id);

    $data = Hardware::where('hd_id', $id)->first();

    return response()->json(['data' => $data]);
  }

  public function updateHardware(Request $request)
  {
    try {
      $validate = $request->validate([
        'item' => 'required',
        'type' => 'required',
        'dateprocured' => 'required',
        'codenumber' => 'required',
        'aquisitioncost' => 'required'
      ], [
        'item.required' => 'Item must not be null',
        'type.required' => 'Type must not be null',
        'dateprocured.required' => 'Acquisition date must not be null',
        'codenumber.required' => 'Code Number must not be null',
        'aquisitioncost.required' => 'Acquisition Cost must not be null',
      ]);

      $hardwares = Hardware::where('hd_id', $request->pid)->update([
        'item' => $request->item,
        'type' => $request->type,
        'date_Procured' => $request->dateprocured,
        'ownership' => $request->ownership,
        'code_number' => $request->codenumber,
        'asset_classification' => $request->assetclass,
        'model_number' => $request->modelnumber,
        'serial_number' => $request->serialnumber,
        'aquisition_cost' => $request->aquisitioncost,
        'property_number' => $request->propertynumber
      ]);

      if (!$hardwares) {
        throw new Exception('Unable to update Hardware');
      }

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

  public function deleteHardware(Request $request)
  {
    try {

      $id = Crypt::decryptString($request->id);

      $deleteAss = Assignment::where('hd_id', $id)->delete();

      if (!$deleteAss) {
        throw new Exception('Unable to delete Hardware');
      }

      $deletehd = Hardware::where('hd_id', $id)->delete();

      if (!$deletehd) {
        throw new Exception('Unable to delete Hardware');
      }

      return response()->json([
        'status_code' => 0
      ]);
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

  public function getSoftwareInfo(Request $request)
  {

    $id = Crypt::decryptString($request->id);

    $data = Software::where('soft_id', $id)->first();

    return response()->json([
      'data' => $data
    ]);
  }

  public function updateSoftware(Request $request)
  {
    try {

      $validate = $request->validate([
        'type' => 'required',
        'description' => 'required'
      ], [
        'type.required' => 'Type must not be null',
        'description.required' => 'Description must not be null'
      ]);

      $update = Software::where('soft_id', $request->softid)->update([
        'type' => $request->type,
        'description' => $request->description,
        'license' => $request->license,
        'exp_year' => $request->expyear
      ]);

      if (!$update) {
        throw new Exception('Unable to update software');
      }

      return response()->json([
        'status_code' => 0
      ]);
    } catch (Exception $e) {
      return response()->json([
        'status_code' => 1,
        'msg' =>  $e->getMessage()
      ]);
    }
  }

  public function deleteSoftware(Request $request)
  {
    try {

      $id = Crypt::decryptString($request->id);

      $delete = Bridgelink::where('soft_id', $id)->delete();

      if (!$delete) {
        throw new Exception('Unable to delete software');
      }

      $deletesoft = Software::where('soft_id', $id)->delete();

      if (!$deletesoft) {
        throw new Exception('Unable to delete software');
      }

      return response()->json([
        'status_code' => 0
      ]);
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

  public function searchHardware(Request $request)
  {
    try {

      // $infunds = Project::where('proj_fund', 'Internally Funded')
      //   ->where(function ($query) use ($search) {
      //     $query->orwhere('project_Name', 'like', "%$search%")
      //       ->orwhere('office', 'like', "%$search%");
      //   })
      //   ->paginate(15);

      $id = Crypt::decryptString($request->projid);
      $search = $request->searchHardwareInput;

      $hardwares = Hardware::where('proj_id', $id)
        ->where(function ($query) use ($search) {
          $query->orwhere('item', 'like', "%$search%")
            ->orwhere('type', 'like', "%$search%")
            ->orwhere('date_Procured', 'like', "%$search%")
            ->orwhere('ownership', 'like', "%$search%")
            ->orwhere('code_number', 'like', "%$search%")
            ->orwhere('asset_classification', 'like', "%$search%")
            ->orwhere('model_number', 'like', "%$search%")
            ->orwhere('serial_number', 'like', "%$search%")
            ->orwhere('aquisition_cost', 'like', "%$search%")
            ->orwhere('property_number', 'like', "%$search%");
        })
        ->paginate(10);

      if (!$hardwares) {
        throw new Exception("No results found!");
      }

      return view('content.project.searchhardware', compact('hardwares'));
    } catch (Exception $e) {
      return $e->getMessage();
    } catch (DecryptException $e) {
      return $e->getMessage();
    }
  }

  public function searchSoftware(Request $request)
  {
    try {
      $id = Crypt::decryptString($request->hdid);
      $search = $request->searchSoftwareInput;

      $softids = Bridgelink::where('hd_id', $id)->pluck('soft_id');

      $softwares = Software::where('soft_id', $softids)
        ->where(function ($query) use ($search) {
          $query->orwhere('type', 'like', "%$search%")
            ->orwhere('description', 'like', "%$search%")
            ->orwhere('license', 'like', "%$search%")
            ->orwhere('exp_year', 'like', "%$search");
        })
        ->paginate(10);

      return view('content.project.searchsoftwares', compact('softwares'));
    } catch (Exception $e) {
      return $e->getMessage();
    } catch (DecryptException $e) {
      return $e->getMessage();
    }
  }
}
