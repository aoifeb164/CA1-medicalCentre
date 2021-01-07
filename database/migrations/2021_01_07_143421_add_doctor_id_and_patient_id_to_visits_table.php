<?php
# @Date:   2021-01-07T14:34:21+00:00
# @Last modified time: 2021-01-07T14:51:00+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorIdAndPatientIdToVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visits', function (Blueprint $table) {

          $table->dropColumn('patient');
          $table->dropColumn('doctor');

          $table->unsignedBigInteger('patient_id');
          $table->unsignedBigInteger('doctor_id');

          //creating foreign keys in the patients table
          //calls the users table and the id of each patient in the users table
          $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('restrict');
          //calls the insurance_companies table and the ids of the companies and inserting them when they relate to a patient
          $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visits', function (Blueprint $table) {
          $table->dropForeign(['patient_id']);
          $table->dropForeign(['doctor_id']);
          $table->dropColumn('patient_id');
          $table->dropColumn('doctor_id');

            });
    }
}
