<?php
# @Date:   2020-11-06T16:58:54+00:00
# @Last modified time: 2020-11-24T09:56:53+00:00


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Insurance_Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_doctor = Role::where('name','doctor')->first();
        $role_patient = Role::where('name','patient')->first();

        $doctor = new User();
        $doctor->name = 'Stephanie McDonnell';
        $doctor->address = '198 street, Carlow';
        $doctor->phone = '0987634567';
        $doctor->email = 'stephanie@email.com';
        $doctor->password = Hash::make('secret');
        $doctor->save();
        $doctor->roles()->attach($role_admin);

        $doctor = new User();
        $doctor->name = 'Aoife Brennan';
        $doctor->address = '123 street, Louth';
        $doctor->phone = '0860024694';
        $doctor->email = 'aoife@email.com';
        $doctor->password = Hash::make('secret');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);

        $user = new User();
        $user->name = 'Ronan Woods';
        $user->address = '154 street,Limerick';
        $user->phone = '0852068976';
        $user->email = 'ronan@email.com';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);

        $patient = new Patient();
        $patient->insurance_company_id = 3;
        $patient->policy_no = '123456E';
        $patient->user_id = $user->id;
        $patient->save();
    }
}
