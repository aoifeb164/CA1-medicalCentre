<?php
# @Date:   2020-11-06T17:41:34+00:00
# @Last modified time: 2020-11-17T16:39:31+00:00




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
    public function index()
    {
      // $user = Auth::user();
      //
      // $user->authorizeRoles('doctor');
        return view('admin.home');
    }
}
