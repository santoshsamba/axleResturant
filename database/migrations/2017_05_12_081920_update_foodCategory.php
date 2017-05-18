<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFoodCategory extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foodCategory_tbl', function(Blueprint $table){
            $table->string('foodCatImage')->unique();
            $table->integer('foodTypeId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foodCategory_tbl', function($table){
            $table->dropColumn('foodCatImage','foodTypeId');
        });
    }
}