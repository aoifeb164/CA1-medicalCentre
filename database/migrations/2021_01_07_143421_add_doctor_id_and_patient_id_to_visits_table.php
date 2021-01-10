<?php
# @Date:   2021-01-07T14:34:21+00:00
# @Last modified time: 2021-01-10T12:47:39+00:00




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

      //adding the patiient id and doctor id to the visits table with a migrations
      //this relates to the patients table and doctors table in the db
        Schema::table('visits', function (Blueprint $table) {

          $table->dropColumn('patient');
          $table->dropColumn('doctor');

          //creating the patient_id and the doctor_id column in the table
          $table->unsignedBigInteger('patient_id');
          $table->unsignedBigInteger('doctor_id');

          //creating foreign keys in the visits table
          //calls the patients table and id of each patient in patients table
          $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('restrict');
          //calls the doctors table and the ids of the doctor in the doctors table
          $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //dropping the columns and reverting back when the migration is rolled back
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
