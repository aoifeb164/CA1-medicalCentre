<?php
# @Date:   2020-11-06T17:33:41+00:00
# @Last modified time: 2021-01-02T15:12:18+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(Request $request)
       {
         $user = Auth::user();
         $home = 'home';

        //if the user logs in with admin role diplay admin home page
         if($user->hasRole('admin')){
           $home = 'admin.home';
         }

         //if user logs in with doctor role display doctor home page
         else if($user->hasRole('doctor')){
           $home = 'doctor.home';
         }

         //if user logs in with patient role display patient home page
         else if ($user->hasRole('patient')){
           $home = 'patient.home';
         }
         
           return redirect()->route($home);
       }
   }
