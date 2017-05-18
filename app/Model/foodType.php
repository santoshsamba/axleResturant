<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
// use Model\foodCategory;

class foodType extends Model
{
 	public $table = "foodtype_tbl";
 	protected $primaryKey = 'foodTypeId';
 	// protected $timeStamp = false;
 	// protected $timeStamp = false;

    public function foodcategory(){
    	return $this->hasMany('App\Model\foodCategory','foodTypeId');
    }
}
