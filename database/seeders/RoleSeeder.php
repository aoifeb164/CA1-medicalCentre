<?php
# @Date:   2020-11-06T16:59:09+00:00
# @Last modified time: 2020-11-17T16:35:44+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_doctor = new Role();
      $role_doctor->name ='admin';
      $role_doctor->description ='An administrator user';
      $role_doctor->save();

        $role_doctor = new Role();
        $role_doctor->name ='doctor';
        $role_doctor->description ='A doctor user';
        $role_doctor->save();

        $role_patient = new Role();
        $role_patient->name ='patient';
        $role_patient->description ='A patient user';
        $role_patient->save();

    }
}
