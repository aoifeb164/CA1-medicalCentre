<?php
# @Date:   2020-11-06T12:25:44+00:00
# @Last modified time: 2021-01-10T12:31:37+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //creating the roles table in the database using a migration
     //declaring the information we want to be stored and their data type
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
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
        Schema::dropIfExists('roles');
    }
}
