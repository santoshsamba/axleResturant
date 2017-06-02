<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Employee;
use Illuminate\Support\Facades\Hash;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::orderByDesc('id')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $reqJar = $request;
        // $passRaw = $reqJar->password;
        //$hassPass = Hash::make($request->password);
        // $reqJar->password = $hassPass;
        

        // echo $reqJar;
        $empIns = new Employee;
        $empResult = $empIns->fill([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phoneNumber' => $request->phoneNumber,
                'status' => $request->status
            ])->save();
        if($empResult != null){
            return "success";
        }
        return "failed";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresult = Employee::find($id)->update($request->all());
        if($empresult != null){
            return "success";
        }
        return "failed";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
