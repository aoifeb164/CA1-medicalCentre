<?php
# @Date:   2020-12-22T16:13:07+00:00
# @Last modified time: 2021-01-03T19:05:19+00:00




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

     //creating the visits table in the Database with a migration
     //declaring the information we want to be stored
     public function up()
     {
         Schema::create('visits', function (Blueprint $table) {
           $table->id();
           $table->date('date');
           $table->time('time');
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

     //dropping the table if the migration is rolled back 
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
