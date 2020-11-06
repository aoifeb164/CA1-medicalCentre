<?php
# @Date:   2020-11-06T12:11:30+00:00
# @Last modified time: 2020-11-06T17:37:57+00:00




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/doctor/home', [App\Http\Controllers\Doctor\HomeController::class, 'index'])->name('doctor.home');
Route::get('/patient/home', [App\Http\Controllers\Patient\HomeController::class, 'index'])->name('patient.home');
