<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bc');
            $table->foreign('bc')->references('bc')->on('babies')->onDete('cascade');
            $table->date('check_date');
            $table->integer('age');
            $table->float('weight');
            $table->float('body_length');
            $table->float('head_circumference');
            $table->boolean('tindak_balas');
            $table->boolean('jaundice');
            $table->integer('vaccine_id')->unsigned();
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
        Schema::dropIfExists('records');
    }
}
