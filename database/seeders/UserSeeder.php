<?php
# @Date:   2020-11-06T16:58:54+00:00
# @Last modified time: 2021-01-07T17:27:19+00:00


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Insurance_Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //filling the database with Users
    public function run()
    {
      //declaring the roles to attach to the users
        $role_admin = Role::where('name','admin')->first();
        $role_doctor = Role::where('name','doctor')->first();
        $role_patient = Role::where('name','patient')->first();

        //creating a user
        $admin = new User();
        $admin->name = 'Stephanie McDonnell';
        $admin->address = '198 street, Carlow';
        $admin->phone = '0987634567';
        $admin->email = 'stephanie@email.com';
        $admin->password = Hash::make('secret');
        //save in user table and attaching admin role
        $admin->save();
        $admin->roles()->attach($role_admin);
        $user = new User();
        $user->name = 'Aoife Brennan';
        $user->address = '123 street, Louth';
        $user->phone = '0860024694';
        $user->email = 'aoife@email.com';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_doctor);

        $doctor = new Doctor();
        $doctor ->registration_no = '1234fgh8';
        $doctor->user_id = $user->id;
        $doctor->save();

        $user = new User();
        $user->name = 'Ronan Woods';
        $user->address = '154 street,Limerick';
        $user->phone = '0852068976';
        $user->email = 'ronan@email.com';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_patient);
        //
        // $patient = new Patient();
        // $patient->insurance_company_id = 3;
        // $patient->policy_no = '123456E';
        // $patient->user_id = $user->id;
        // $patient->save();


            // filling the databse with x amount of doctors, patients and admins

              for ($i = 1; $i <=3; $i++) {
                //calling the factories where the information wanting to be filled is declared
                $user = User::factory()->create();
                //attaching roles to the Users
                $admin->roles()->attach($role_admin);
              }


              for ($i = 1; $i <=8; $i++) {
                //calling the factories where the information wanting to be filled is declared
                $user = User::factory()->create();
                //attaching roles to the Users
                $user->roles()->attach($role_doctor);
                //calling the factories where the information wanting to be filled is declared
                $doctor = Doctor::factory()->create([
                'user_id' => $user->id,
              ]);
          }

             for ($i = 1; $i <=20; $i++) {
               //calling the factories where the information wanting to be filled is declared
               $user = User::factory()->create();
               //attaching roles to the Users
               $user->roles()->attach($role_patient);
               //calling the factories where the information wanting to be filled is declared
               $patient = Patient::factory()->create([
               'user_id' => $user->id,
             ]);
         }


    }
}
