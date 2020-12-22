<?php
# @Date:   2020-12-22T16:51:52+00:00
# @Last modified time: 2020-12-22T16:54:24+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      {
        $doctor = new Doctor();
        $doctor->name = 'Sarah';
        $doctor->address = '1234';
        $doctor->phone = '382738274';
        $doctor->email = 'sarah@email.com';
        $doctor->password = 'secret';
        $doctor->save();
      }
    }
}
