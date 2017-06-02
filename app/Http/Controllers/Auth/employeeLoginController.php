<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class employeeLoginController extends Controller
{
	 // public function __construct(){
	 // 	$this->middleware('guest:employee');
	 // }

   	public function showEmployeeLogin(){
   		return view('auth/adminLogin');
   	}

   	public function employeeLogin(Request $request){
   		//validate the form
   		//check authentication
   		// dd($request);
   		if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password])){
   			return redirect('/admin');
   		}

   		//fail
   		// return redirect()->back()->withInput($request->only('email','remember'));
   		return redirect("asdf");
   	}

   	//logout
   	public function logout(Request $request)
    {
        $this->guard()->logout();
        dd($request);
        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/adminLogin');
    }
}
