<?php
# @Date:   2020-11-22T19:13:33+00:00
# @Last modified time: 2021-01-03T19:04:45+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdAndInsuranceCompanyIdToPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //adding the user id and insurance company id to the patients table with a migrations
      //this relates to the user table and insurance_companies table in the db
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->dropColumn('insurance_company');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('insurance_company_id');

            //creating foreign keys in the patients table
            //calls the users table and the id of each patient in the users table
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            //calls the insurance_companies table and the ids of the companies and inserting them when they relate to a patient
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onUpdate('cascade')->onDelete('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     //dropping the table when the migration is rolled back
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['insurance_company_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('insurance_company_id');


            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('insurance_company');


        });
    }
}
