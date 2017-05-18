<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
    * @return void
     */
    public function up()
    {
        Schema::create('food_tbl', function (Blueprint $table) {
            $table->increments('foodId')->index();
            $table->string('foodName')->unique();
            $table->integer('foodPrice');
            $table->string('foodCatId');
            $table->string('foodImage');
            $table->string('foodDescription');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_tbl');
    }
}
