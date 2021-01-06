<?php
# @Date:   2020-11-06T17:41:34+00:00
# @Last modified time: 2021-01-06T11:48:36+00:00




namespace App\Http\Controllers\Admin;

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
        $this->middleware('role:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //when a user logs in with an admin role bring them to the admin home page
    public function index()
    {

        return view('admin.home');
    }
}
