<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $fillable = ['foodName','foodPrice', 'foodDescription', 'foodCatId', 'foodImage'];
    public $table = "food_tbl";
    public $timestamps = false;
    public $primaryKey = 'foodCatId';

    public function foodcat(){
    	return $this.belongsTo(foodCategory::class, 'foodCatId');
    }
}