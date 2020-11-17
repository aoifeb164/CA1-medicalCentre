<?php
# @Date:   2020-11-06T16:58:54+00:00
# @Last modified time: 2020-11-17T16:37:08+00:00


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
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

        $patient = new User();
        $patient->name = 'Ronan Woods';
        $patient->address = '154 street,Limerick';
        $patient->phone = '0852068976';
        $patient->email = 'ronan@email.com';
        $patient->password = Hash::make('secret');
        $patient->save();
        $patient->roles()->attach($role_patient);
    }
}
