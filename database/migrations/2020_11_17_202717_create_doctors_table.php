<?php
# @Date:   2020-11-17T19:52:49+00:00
# @Last modified time: 2021-01-03T18:58:52+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //creating the doctors table in the Database using a migration
     //declaring the information we want to be stored
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('registration_no');
            $table->timestamps();
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
        Schema::dropIfExists('doctors');
    }
}
