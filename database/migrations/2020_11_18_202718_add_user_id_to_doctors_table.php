<?php
# @Date:   2020-12-29T12:54:59+00:00
# @Last modified time: 2021-01-03T19:04:51+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //adding the user id to the doctors table with a migration
     //this relates to the user table in the db
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
          $table->dropColumn('name');
          $table->dropColumn('address');
          $table->dropColumn('phone');
          $table->dropColumn('email');
          $table->dropColumn('password');

          $table->unsignedBigInteger('user_id');
          //creating a foreign key in the doctors table
          //calls the users table and the id of each doctor in the users table
          $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('doctors', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropColumn('user_id');

          $table->string('name');
          $table->string('address');
          $table->string('phone');
          $table->string('email');
        });
    }
}
