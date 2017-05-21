<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = [
							'firstName',
							'lastName',
							'email', 
							'username', 
							'password', 
							'phone', 
							'address', 
							'gender', 
							'status'
							];
							
	protected $table = "employees";

	// roles and employees
	public function roles(){
    	return $this->belongsToMany('App\Model\Role');
	}
}
