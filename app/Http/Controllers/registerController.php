<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function store()
    {
        $employee = new Employee;
        $employee->firstName=request('firstName');
        $employee->lastName=request('lastName');
        $employee->email=request('email');
        $employee->username=request('username');
        $employee->password=request('password');
        $employee->phone=request('phone');
        $employee->address=request('address');
        $employee->gender=request('gender');
        $employee->status=request('status');

        $employee->save();

        return redirect('/');
    }
}
