<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\my\Employee;
use App\Models\my\Fronlineservices;
use App\Models\my\Training;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Operationprocesses extends Controller
{
  public function updateOperation()
  {

    $employees = Employee::paginate(15);
    $trainingservices = Training::paginate(15);
    $frontlineservices = Fronlineservices::paginate(15);

    return view('content.Operation.updateoperation', compact('employees', 'trainingservices', 'frontlineservices'));
  }

  public function updateEmployee(Request $request)
  {
    try {
      $id = $request->id;
      $fname = $request->fname;
      $mname = $request->mname;
      $lname = $request->lname;

      if (empty($fname) || empty($mname) || empty($lname)) {
        throw new Exception('There should be no null input');
      }

      $employees = Employee::where('emp_id', $id)->update([
        'firstName' => $fname,
        'lastName' => $lname,
        'middleName' => $mname
      ]);

      if (!$employees) {
        throw new Exception('Unable to update Information');
      }

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
    $search = $request->searchemployee;

    try {

      $employees = Employee::where('firstName', 'like', "%$search%")
        ->orwhere('middleName', 'like', "%$search%")
        ->orwhere('lastName', 'like', "%$search%")
        ->paginate(15);

      if (!$employees) {
        throw new Exception('No results found!');
      }

      return view('content.Employee.searchemployee', compact('employees'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function getTrainingServicesData(Request $request)
  {
    $id = Crypt::decryptString($request->id);

    $data = Training::where('t_id', $id)->first();

    return response()->json(['data' => $data]);
  }

  public function deleteTrainingServices(Request $request)
  {
    try {

      $id = Crypt::decryptString($request->id);

      $delete = Training::where('t_id', $id)->delete();

      if (!$delete) {
        throw new Exception('Unable to Delete Data!');
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

  public function searchTrainingServices(Request $request)
  {
    $search = $request->searchtrainingservices;

    try {

      $trainingservices = Training::where('training_description', 'like', "%$search%")->paginate(15);

      if (!$trainingservices) {
        throw new Exception('No results found!');
      }

      return view('content.Training-services.tservices-search', compact('trainingservices'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function getFrontlineServicesData(Request $request)
  {
    $id = Crypt::decryptString($request->id);

    $data = Fronlineservices::where('fs_id', $id)->first();

    return response()->json(['data' => $data]);
  }

  public function searchFrontlineServices(Request $request)
  {
    $search = $request->searchfrontlineservices;

    try {

      $frontlineservices = Fronlineservices::where('services', 'like', "%$search%")->paginate(15);

      if (!$frontlineservices) {
        throw new Exception('No Results Found!');
      }

      return view('content.Frontlineservices.searchfrontlineservices', compact('frontlineservices'));
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function deleteFrontlineServices(Request $request)
  {
    try {

      $id = Crypt::decryptString($request->id);

      $delete = Fronlineservices::where('fs_id', $id)->delete();

      if (!$delete) {
        throw new Exception('Unable to Delete');
      }

      return response()->json([
        'status_code' => 0,
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

  public function updateTrainingServices(Request $request)
  {
    try {

      $id = $request->tid;
      $tdescription = $request->tdescription;

      $update = Training::where('t_id', $id)->update([
        'training_description' => $tdescription
      ]);

      if (!$update) {
        throw new Exception('Failed to update information');
      }

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

  public function updateFrontlineServicese(Request $request)
  {
    try {

      $id = $request->fsid;
      $fsname = $request->fsname;

      $update = Fronlineservices::where('fs_id', $id)->update([
        'services' => $fsname
      ]);

      if (!$update) {
        throw new Exception('Failed to update information');
      }

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

  public function addServicesandEmployees()
  {
    return view('content.Operation.addserviceandemp');
  }

  public function addTrainingServices(Request $request)
  {
    try {

      $validate = $request->validate([
        'tsdescription' => ['required', 'string', 'regex:/^[A-Z]/']
      ], [
        'tsdescription.required' => 'Training Description must not be null!',
        'tsdescription.regex' => 'First letter must be an uppercase letter'
      ]);

      $tdescription = $request->tsdescription;

      $add = Training::create([
        'training_description' => $tdescription
      ]);

      if (!$add) {
        throw new Exception('Unable to add Training Services');
      }

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

  public function addEmployee(Request $request)
  {

    try {

      $validate = $request->validate([
        'fname' => ['required', 'string', 'regex:/^[A-Z]/'],
        'mname' => ['required', 'string', 'regex:/^[A-Z]/'],
        'lname' => ['required', 'string', 'regex:/^[A-Z]/']
      ], [
        'fname.required' => 'First Name must not be null!',
        'fname.regex' => 'First letter for first name must be an uppercase letter',
        'mname.required' => 'Middle Name must not be null!',
        'mname.regex' => 'First letter for middle name must be an uppercase letter',
        'lname.required' => 'Last Name must not be null!',
        'lname.regex' => 'First letter for last name must be an uppercase letter'
      ]);

      $fname = $request->fname;
      $mname = $request->mname;
      $lname = $request->lname;

      $add = Employee::create([
        'firstName' => $fname,
        'middleName' => $mname,
        'lastName' => $lname
      ]);

      if (!$add) {
        throw new Exception('Unable to add Employee');
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

  public function addFrontlineServices(Request $request)
  {
    try {

      $validate = $request->validate([
        'fsdescription' => ['required', 'string', 'regex:/^[A-Z]/']
      ], [
        'fsdescription.required' => 'Frontline service description must not be null!',
        'fsdescription.regex' => 'First letter for frontline service description must be an uppercase letter!'
      ]);

      $add = Fronlineservices::create([
        'services' => $request->fsdescription
      ]);

      if (!$add) {
        throw new Exception('Unable to add frontline services');
      }

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
}
