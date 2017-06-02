<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class employeeLoginController extends Controller
{
	 public function __construct(){
	 	$this->middleware('guest:employee', ['except' => ['logout']]);
	 }

   	public function showEmployeeLogin(){
   		return view('auth/adminLogin');
   	}

   	public function employeeLogin(Request $request){
   		//validate the form

   		//check authentication
   		if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])){
   			return redirect('/admin/dashboard');
   		}

   		//fail
   		return redirect()->back()->withInput($request->only('email','remember'));
   	}

   	//logout
   	public function logout()
    {
        Auth::guard('employee')->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect()->route('admin.login');
    }
}
