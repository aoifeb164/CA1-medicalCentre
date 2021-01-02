<?php
# @Date:   2020-12-29T12:54:59+00:00
# @Last modified time: 2021-01-02T13:00:21+00:00




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

     //adding the user id to the doctors table
     
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
          $table->dropColumn('name');
          $table->dropColumn('address');
          $table->dropColumn('phone');
          $table->dropColumn('email');
          $table->dropColumn('password');

          $table->unsignedBigInteger('user_id');

          $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
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
