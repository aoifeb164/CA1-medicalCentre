<?php
# @Date:   2020-11-17T19:52:49+00:00
# @Last modified time: 2021-01-02T12:56:19+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //creating the patients table in the Database
     //declaring the information we want to be stored
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('insurance_company');
            $table->string('policy_no');
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
        Schema::dropIfExists('patients');
    }
}
