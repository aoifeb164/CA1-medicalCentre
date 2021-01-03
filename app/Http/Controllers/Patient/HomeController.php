<?php
# @Date:   2020-11-06T17:42:00+00:00
# @Last modified time: 2021-01-03T17:23:56+00:00




namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $this->middleware('role:patient, admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //when a user logs in with a patient role bring them to the patient home page
    public function index()
    {
      // $user = Auth::user();
      //
      // $user->authorizeRoles('patient');
        return view('patient.home');
    }
}
