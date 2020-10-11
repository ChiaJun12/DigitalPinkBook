<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bc')->unique();
            $table->string('name');
            $table->date('birth_date');
            $table->string('guardian_name'); 
            $table->string('guardian2_name'); 
            $table->string('address');
            $table->string('phone_no');
            $table->string('gender');
            $table->string('ethnic');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('babies');
    }
}
