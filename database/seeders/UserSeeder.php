<?php
# @Date:   2020-11-06T16:58:54+00:00
# @Last modified time: 2021-01-10T22:48:12+00:00


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
//calling the role, user, patient, doctor and insurance company model
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

    public function run()
    {
      //filling the database with Users
      //declaring the roles to attach to the users
        $role_admin = Role::where('name','admin')->first();
        $role_doctor = Role::where('name','doctor')->first();
        $role_patient = Role::where('name','patient')->first();

        //creating a user
        $admin = new User();
        $admin->name = 'Aoife Brennan';
        $admin->address = '198 street, Carlow';
        $admin->phone = '0987634567';
        $admin->email = 'aoife@email.com';
        $admin->password = Hash::make('secret');
        //save in user table and attaching admin role
        $admin->save();
        $admin->roles()->attach($role_admin);

        //creating a user
        $user = new User();
        $user->name = 'Stephanie McDonnell';
        $user->address = '123 street, Louth';
        $user->phone = '0860024694';
        $user->email = 'stephanie@email.com';
        $user->password = Hash::make('secret');
        //save in the user table and attaching a doctor role
        $user->save();
        $user->roles()->attach($role_doctor);
        //inserting the following info into the doctor table and using the user_id of the user crrated above
        $doctor = new Doctor();
        $doctor ->registration_no = '1234fgh8';
        $doctor->start_date = '2000-01-01';
        $doctor->user_id = $user->id;
        //saving in the doctor tables
        $doctor->save();

        //creating a user
        $user = new User();
        $user->name = 'Ronan Woods';
        $user->address = '154 street,Limerick';
        $user->phone = '0852068976';
        $user->email = 'ronan@email.com';
        $user->password = Hash::make('secret');
        //saving in the user table and attaching a patient role
        $user->save();
        $user->roles()->attach($role_patient);
        //inserting the following info into the patient table and using teh user_id of the user created above
        $patient = new Patient();
        $patient->insurance_company_id = 3;
        $patient->policy_no = '123456E';
        $patient->user_id = $user->id;
        //saving in the patient tables
        $patient->save();


               // filling the databse with x amount of doctors, patients and admins
               //creating 3 administrators
              for ($i = 1; $i <=3; $i++) {
                //calling the factories where the information wanting to be filled is declared
                $user = User::factory()->create();
                //attaching an admin role to the users
                $admin->roles()->attach($role_admin);
              }


              //creating 8 doctors
              for ($i = 1; $i <=8; $i++) {
                //calling the factories where the information wanting to be filled is declared
                $user = User::factory()->create();
                //attaching a doctor role to the users
                $user->roles()->attach($role_doctor);
                //calling the factories where the information wanting to be filled is declared
                $doctor = Doctor::factory()->create([
                'user_id' => $user->id,
              ]);
          }

             //reating 20 patients
             for ($i = 1; $i <=20; $i++) {
               //calling the factories where the information wanting to be filled is declared
               $user = User::factory()->create();
               //attaching a patient role to the users
               $user->roles()->attach($role_patient);
               //calling the factories where the information wanting to be filled is declared
               $patient = Patient::factory()->create([
               'user_id' => $user->id,
             ]);
         }


    }
}
