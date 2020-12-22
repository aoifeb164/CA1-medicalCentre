<?php
# @Date:   2020-12-22T16:34:08+00:00
# @Last modified time: 2020-12-22T16:49:28+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
      $visit->date = '1234';
      $visit->time = '1234';
      $visit->description ='sore throat';
      $visit->patient_id = 1;
      $visit->doctor_id = 1;
      $visit->save();
    }
}
