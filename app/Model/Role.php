<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['id','roleName'];
    public $table = "roles";
    protected $primaryKey = 'id';
    public $timestamps = false;
}
