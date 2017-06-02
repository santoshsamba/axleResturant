<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmpRole extends Model
{
    protected $fillable = ['employee_id', 'role_id'];
    protected $table = "employee_role";

    public function getEmp(){
      return $this->belongsTo('App\Model\Employee', 'employee_id');
    }
    public function getRole(){
      return $this->belongsTo('App\Model\Role', 'role_id');
    }
}
