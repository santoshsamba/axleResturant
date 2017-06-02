<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class foodCategory extends Model
{
    protected $fillable = ['foodCatName', 'foodCatImage'];
    protected $primaryKey = 'foodCatId';
    protected $table = "foodcategory_tbl";
    public $timestamps = false;

    public function foodtype(){
    	return $this->belongsTo(foodType::class);
    }
    public function foods(){
    	return $this->hasMany(food::class);
    }

}