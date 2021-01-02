<?php
# @Date:   2020-11-22T19:27:07+00:00
# @Last modified time: 2021-01-02T15:27:08+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
//calling the insurance company model
use App\Models\InsuranceCompany;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "Aviva";
        $insurance_company->address = "Dublin";
        $insurance_company->save();

        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "Laya";
        $insurance_company->address = "Carlow";
        $insurance_company->save();

        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "IrishLife";
        $insurance_company->address = "Louth";
        $insurance_company->save();

        $insurance_company = new InsuranceCompany();
        $insurance_company->name = "VHI";
        $insurance_company->address = "Galway";
        $insurance_company->save();

        // for ($i = 1; $i <=20; $i++) {
        //   $visit = Visit::factory()->create();
        // }
    }

}
