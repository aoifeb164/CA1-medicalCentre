<?php
# @Date:   2020-11-06T12:11:29+00:00
# @Last modified time: 2021-01-02T13:03:01+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     //declaring the seeders we want to run and in what order
     //database seeders fill the database with information
     public function run()
     {
       $this->call(RoleSeeder::class);
       $this->call(InsuranceCompanySeeder::class);
       $this->call(UserSeeder::class);
       $this->call(PatientSeeder::class);
       $this->call(DoctorSeeder::class);
       $this->call(VisitSeeder::class);
     }
}
