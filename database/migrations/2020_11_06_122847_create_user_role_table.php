<?php
# @Date:   2020-11-06T12:28:48+00:00
# @Last modified time: 2021-01-10T12:32:37+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //creating the user_role table in the database using a migration
     //declaring the information we want to be stored and their data type
     //this relates to the roles table and the users table

    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->timestamps();

            //creating a foreign key in the user_role table
            //calls the users table and role table and the ids
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('user_role');
    }
}
