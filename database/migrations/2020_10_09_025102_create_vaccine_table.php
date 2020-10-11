<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bc')->default("Unknown");
            $table->foreign('bc')->references('bc')->on('babies')->onDelete('cascade');
            $table->boolean('BCG')->default(0);
            $table->boolean('Hepatitis_B(dos1)')->default(0);
            $table->boolean('Hepatitis_B(dos2)')->default(0);
            $table->boolean('DTaP/DT(dos1)')->default(0);
            $table->boolean('Hib(dos1)')->default(0);
            $table->boolean('IPV(dos1)')->default(0);
            $table->boolean('DTaP/DT(dos2)')->default(0);
            $table->boolean('Hib(dos2)')->default(0);
            $table->boolean('IPV(dos2)')->default(0);
            $table->boolean('DTaP/DT(dos3)')->default(0);
            $table->boolean('Hib(dos3)')->default(0);
            $table->boolean('IPV(dos3)')->default(0);
            $table->boolean('Hepatitis_B(dos3)')->default(0);
            $table->boolean('Measles(Sabah)')->default(0);
            $table->boolean('JE(dos1)_Sarawak')->default(0);
            $table->boolean('JE(dos2)_Sarawak')->default(0);
            $table->boolean('MMR')->default(0);
            $table->boolean('DTaP/DT(booster)')->default(0);
            $table->boolean('IPV(booster)')->default(0);
            $table->boolean('Hib(booster)')->default(0);
            $table->boolean('JE(dos3)_Sarawak')->default(0);
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
        Schema::dropIfExists('vaccines');
    }
}
