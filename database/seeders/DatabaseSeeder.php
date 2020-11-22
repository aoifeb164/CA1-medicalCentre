<?php
# @Date:   2020-11-06T12:11:29+00:00
# @Last modified time: 2020-11-22T19:31:51+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     public function run()
     {
       $this->call(RoleSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(InsuranceCompanySeeder::class);
       $this->call(PatientSeeder::class);
     }
}
