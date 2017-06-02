<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\EmpRole;
use App\Model\Employee;
use App\Model\Role;

class employeeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprole = new EmpRole();
        $fetcheddata = $emprole::latest('id')->with(['getEmp' => function($query){
            $query -> select('id', 'firstName', 'lastName');
        }])->with(['getRole'=> function($query1){
            $query1 -> select('id', 'roleName');
        }])->get();
        
        return $fetcheddata;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employee = Employee::find($request->employee_id);
        $employee->roles()->attach($request->role_id);
        // $result = EmpRole::create($request->all());
        // if($result != null){
        //     return "success";
        // }
        // return "fialed";
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
        $result = EmpRole::find($id)->update($request->all());
       // EmpRole::find($id)->update($request->all());
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
