<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\my\Employee;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class Employeepro extends Controller
{
  public function addEmployee()
  {
    return view('content.Employee.addemp');
  }

  public function addingEmployee(Request $request)
  {
    try {
      $validate = $request->validate([
        'fname' => ['required'],
        'lname' => ['required']
      ]);

      $insert = Employee::create([
        'firstName' => $request->fname,
        'middleName' => $request->mname,
        'lastName' => $request->lname
      ]);

      if (!$insert) {
        throw new Exception('Unable to add employee');
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

  public function deleteEmployee(Request $request)
  {
    try {
      $eid = Crypt::decryptString($request->id);

      if (!$eid) {
        throw new Exception('Unable to delete data');
      }

      $delete = Employee::where('emp_id', $eid)->delete();

      if (!$delete) {
        throw new Exception('Unable to delete data');
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

  public function getData(Request $request)
  {
    $id = Crypt::decryptString($request->id);
    $data = Employee::where('emp_id', $id)->first();
    return response()->json(['data' => $data]);
  }
}
