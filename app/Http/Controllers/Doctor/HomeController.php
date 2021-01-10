<?php
# @Date:   2020-11-06T17:41:34+00:00
# @Last modified time: 2021-01-10T12:07:24+00:00




namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
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
        $this->middleware('role:doctor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //when a user with the doctor role logs in bring them to the doctor home page
    public function index()
    {
        return view('doctor.home');
    }
}
