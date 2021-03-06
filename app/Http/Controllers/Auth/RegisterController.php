<?php
# @Date:   2020-11-06T17:33:41+00:00
# @Last modified time: 2021-01-10T13:53:45+00:00




namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Role;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     protected function create(array $data)
     {
         // $user = User::create([
         //     'name' => $data['name'];
         //     'address' => $data['address'];
         //     'phone' => $data['phone'];
         //     'email' => $data['email'];
         //     'password' => Hash::make($data['password']);
         // ]);
         
         $user = new User();
         $user->name = $data['name'];
         $user->address = $data['address'];
         $user->phone = $data['phone'];
         $user->email = $data['email'];
         $user->password = Hash::make($data['password']);
         $user->save();

         $user->roles()->attach(Role::where('name', 'user')->first());

         $patient = new Patient();
         $patient->insurance_company_id = 3;
         $patient->policy_no = '123456E';
         $patient->user_id = $user->id;
         $patient->save();

         return $user;;
     }
}
