<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['roleName'];
	protected $table = "roles";
	
    public function employees(){
        return $this->belongsToMany('App\Model\Employee');
    }

    public function Permissions(){
        return $this->belongsToMany('App\Model\Permission');
    }
}
