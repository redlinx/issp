<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\my\Hrmis;
use App\models\User;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function loginpro(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      Auth::login(Auth::user());
      return response()->json([
        'status_code' => 0,
      ]);;
    }

    return response()->json([
      'status_code' => 1,
      'msg' => 'Invalid Credentials'
    ]);

























    // $checkEmail = Http::withToken('1988|m6eWdBaVMw0HdwYVXD0QfS2wPOjiI7XyfdtW6W4G')->post('http://193.168.1.182/hrmis' . "/api/auth/checkemail", ["email" => $request->email])->json();

    // dd($checkEmail);

    // dd($request->email);

    // $u = User::where('email', $request->email)->get();

    // dd($u);

    // $userhrmis = Hrmis::where('email', $request->email)->first();

    // if ($userhrmis) {
    //   $user = User::where('email', $request->email)->first();
    //   if ($user) {
    //     Auth::login($user);
    //   } else {
    //     return response()->json([
    //       'status_code' => 1,
    //       'msg' => 'You are not registered in ICT Inventory System',
    //     ]);
    //   }
    // } else {
    //   return response()->json([
    //     'status_code' => 1,
    //     'msg' => 'You are not registered in hrmis!',
    //   ]);
    // }
  }
}
