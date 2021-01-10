<?php
# @Date:   2020-11-22T18:59:34+00:00
# @Last modified time: 2021-01-10T12:38:27+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //creating the insurance_companies table in the Database using a migration
     //declaring the information we want to be stored and their data type
    public function up()
    {
        Schema::create('insurance_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
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
        Schema::dropIfExists('insurance_companies');
    }
}
