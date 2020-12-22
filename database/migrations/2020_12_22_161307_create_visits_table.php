<?php
# @Date:   2020-12-22T16:13:07+00:00
# @Last modified time: 2020-12-22T16:43:52+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('visits', function (Blueprint $table) {
           $table->id();
           $table->string('date');
           $table->string('time');
           $table->string('description');
           $table->unsignedBigInteger('patient_id');
           $table->unsignedBigInteger('doctor_id');
           $table->timestamps();

           $table->foreign('patient_id')->references('id')->on('patients');
           $table->foreign('doctor_id')->references('id')->on('doctors');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
