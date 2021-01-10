<?php
# @Date:   2020-12-22T16:34:08+00:00
# @Last modified time: 2021-01-10T13:43:32+00:00




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

      //creating visit to insert into the database
      $visit = new Visit();
      $visit->date = "2021-01-16";
      $visit->time = "13:20";
      $visit->description = "sore back";
      $visit->patient_id = 1;
      $visit->doctor_id = 1;
      //save in visits table
      $visit->save();

      //creating visit to insert into the database
      $visit = new Visit();
      $visit->date = "2021-01-12";
      $visit->time = "10:20";
      $visit->description = "ear infection";
      $visit->patient_id = 2;
      $visit->doctor_id = 1;
      //save in visits table
      $visit->save();

      //creating visit to insert into the database
      $visit = new Visit();
      $visit->date = "2021-01-6";
      $visit->time = "09:50";
      $visit->description = "sprained ankle";
      $visit->patient_id = 5;
      $visit->doctor_id = 7;
      //save in visits table
      $visit->save();

      //creating visit to insert into the database
      $visit = new Visit();
      $visit->date = "2021-01-20";
      $visit->time = "14:55";
      $visit->description = "migraines";
      $visit->patient_id = 6;
      $visit->doctor_id = 3;
      //save in visits table
      $visit->save();


      // for ($i = 1; $i <=20; $i++) {
      //   $visit = Visit::factory()->create();
      // }
    }
}
