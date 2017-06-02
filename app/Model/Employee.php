<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
	use Notifiable;
	protected $guard = 'employee';

    protected $fillable = ['firstName', 'lastName', 'email', 'username', 'password', 'address', 'phoneNumber', 'status'];
    public $table = "employees";
    protected $primaryKey = "id";
	protected $hidden = [
        'remember_token',
    ];
    public function roles(){
    	return $this->belongsToMany('App\Model\Role');
    }
}