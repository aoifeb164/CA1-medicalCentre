<?php
# @Date:   2020-11-17T19:28:04+00:00
# @Last modified time: 2021-01-02T15:11:57+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(){
return view('welcome');
    }
    public function about(){
return view('about');
    }
}
