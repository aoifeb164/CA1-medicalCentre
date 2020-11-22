<?php
# @Date:   2020-11-22T19:27:18+00:00
# @Last modified time: 2020-11-22T20:12:45+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $patient = new Patient();
      $patient->insurance_company_id = $insurance_company = 3;
      $patient->policy_no = '123456E';
      $patient->user_id = $patient->id;
      $patient->save();
    }
}
