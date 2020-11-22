<?php
# @Date:   2020-11-22T19:13:33+00:00
# @Last modified time: 2020-11-22T20:05:00+00:00




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
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->dropColumn('insurance_company');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('insurance_company_id');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies')->onUpdate('cascade')->onDelete('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
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
