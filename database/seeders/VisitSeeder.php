<?php
# @Date:   2020-12-22T16:34:08+00:00
# @Last modified time: 2021-01-08T15:32:26+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
//calling the visit model
use App\Models\Visit;
class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $visit = new Visit();
      $visit->date = "2021-01-16";
      $visit->time = "13:20";
      $visit->description = "sore back";
      $visit->patient_id = $patient->id;
      $visit->doctor_id = $doctor->id;
      $visit->save();



      // for ($i = 1; $i <=20; $i++) {
      //   $visit = Visit::factory()->create();
      // }
    }
}
