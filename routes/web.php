<?php
# @Date:   2020-11-06T12:11:30+00:00
# @Last modified time: 2021-01-08T11:56:13+00:00




use Illuminate\Support\Facades\Route;

//calling the controllers from the controllers folder
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\VisitController as AdminVisitController;

use App\Http\Controllers\Doctor\VisitController as DoctorVisitController;
use App\Http\Controllers\Patient\VisitController as PatientVisitController;
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

//display the welcome page when the site has loaded
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
//display the about page when the about site is loaded
Route::get('/about', [PageController::class, 'about'])->name('about');
Auth::routes();



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//display the admin home page when the user logs in with an admin role
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
//display the doctor home page when the user logs in with a doctor role
Route::get('/doctor/home', [App\Http\Controllers\Doctor\HomeController::class, 'index'])->name('doctor.home');
//display the patient home page when the patient logs in with a patient role
Route::get('/patient/home', [App\Http\Controllers\Patient\HomeController::class, 'index'])->name('patient.home');

// Route::get('/doctor/patients/', [UserBookController::class, 'index'])->name('user.patients.index');
// Route::get('/user/patients/{id}', [UserBookController::class, 'show'])->name('user.patients.show');

//display the admin doctor index when logged in as an admin and viewing list of doctors
Route::get('/admin/doctors', [AdminDoctorController::class, 'index'])->name('admin.doctors.index');
//display the admin create doctor form when logged in as admin and wanting to create new doctor
Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
//display the admin show doctor page when logged in as admin and viewing one doctor and getting them from the db by id
Route::get('/admin/doctors/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctors.show');
//storing the doctor in the db in the doctor table
Route::post('/admin/doctors/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
//displaying the admin edit doctor form when logged in as an admin and wanting to change doctor details and getting them from the db by id
Route::get('/admin/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
//updating the doctor table in the db
Route::put('/admin/doctors{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
//deleting a doctor from the table and getting them by id
Route::delete('/admin/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');

//display the admin patient index when logged in as an admin and viewing list of patients
Route::get('/admin/patients', [AdminPatientController::class, 'index'])->name('admin.patients.index');
//display the admin create patient form when logged in as admin and wanting to create new patient
Route::get('/admin/patients/create', [AdminPatientController::class, 'create'])->name('admin.patients.create');
//display the admin show patient page when logged in as admin and viewing one patient and getting them from the db by id
Route::get('/admin/patients/{id}', [AdminPatientController::class, 'show'])->name('admin.patients.show');
//storing patient in the db in the patient table
Route::post('/admin/patients/store', [AdminPatientController::class, 'store'])->name('admin.patients.store');
//displaying the admin edit patient form when logged in as an admin and wanting to change patient details and getting them from the db by id
Route::get('/admin/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('admin.patients.edit');
//updating the patient table in the db
Route::put('/admin/patients{id}', [AdminPatientController::class, 'update'])->name('admin.patients.update');
//deleting a patient from the table and getting them by id
Route::delete('/admin/patients/{id}', [AdminPatientController::class, 'destroy'])->name('admin.patients.destroy');

//display the admin visit index when logged in as an admin and viewing list of visits
Route::get('/admin/visits', [AdminVisitController::class, 'index'])->name('admin.visits.index');
//display the admin create visit form when logged in as admin and wanting to create new visit
Route::get('/admin/visits/create', [AdminVisitController::class, 'create'])->name('admin.visits.create');
//display the admin show visit page when logged in as admin and viewing one visit and getting them from the db by id
Route::get('/admin/visits/{id}', [AdminVisitController::class, 'show'])->name('admin.visits.show');
//storing visitt in the db in the visit table
Route::post('/admin/visits/store', [AdminVisitController::class, 'store'])->name('admin.visits.store');
//displaying the admin edit visit form when logged in as an admin and wanting to change visit details and getting them from the db by id
Route::get('/admin/visits/{id}/edit', [AdminVisitController::class, 'edit'])->name('admin.visits.edit');
//updating the visit table in the db
Route::put('/admin/visits{id}', [AdminVisitController::class, 'update'])->name('admin.visits.update');
//deleting a visit from the table and getting them by id
Route::delete('/admin/visits/{id}', [AdminVisitController::class, 'destroy'])->name('admin.visits.destroy');

//display the admin visit index when logged in as an admin and viewing list of visits
Route::get('/doctor/visits', [DoctorVisitController::class, 'index'])->name('doctor.visits.index');
//display the admin create visit form when logged in as admin and wanting to create new visit
Route::get('/doctor/visits/create', [DoctorVisitController::class, 'create'])->name('doctor.visits.create');
//display the admin show visit page when logged in as admin and viewing one visit and getting them from the db by id
Route::get('/doctor/visits/{id}', [DoctorVisitController::class, 'show'])->name('doctor.visits.show');
//storing visitt in the db in the visit table
Route::post('/doctor/visits/store', [DoctorVisitController::class, 'store'])->name('doctor.visits.store');
//displaying the admin edit visit form when logged in as an admin and wanting to change visit details and getting them from the db by id
Route::get('/doctor/visits/{id}/edit', [DoctorVisitController::class, 'edit'])->name('doctor.visits.edit');
//updating the visit table in the db
Route::put('/doctor/visits{id}', [DoctorVisitController::class, 'update'])->name('doctor.visits.update');
//deleting a visit from the table and getting them by id
Route::delete('/doctor/visits/{id}', [DoctorVisitController::class, 'destroy'])->name('doctor.visits.destroy');

//display the admin visit index when logged in as an admin and viewing list of visits
Route::get('/patient/visits', [PatientVisitController::class, 'index'])->name('patient.visits.index');
//display the admin create visit form when logged in as admin and wanting to create new visit
Route::get('/patient/visits/create', [PatientVisitController::class, 'create'])->name('patient.visits.create');
//display the admin show visit page when logged in as admin and viewing one visit and getting them from the db by id
Route::get('/patient/visits/{id}', [PatientVisitController::class, 'show'])->name('patient.visits.show');
//storing visitt in the db in the visit table
Route::post('/patient/visits/store', [PatientVisitController::class, 'store'])->name('patient.visits.store');
//displaying the admin edit visit form when logged in as an admin and wanting to change visit details and getting them from the db by id
Route::get('/patient/visits/{id}/edit', [PatientVisitController::class, 'edit'])->name('patient.visits.edit');
//updating the visit table in the db
Route::put('/patient/visits{id}', [PatientVisitController::class, 'update'])->name('patient.visits.update');
//deleting a visit from the table and getting them by id
Route::delete('/patient/visits/{id}', [PatientVisitController::class, 'destroy'])->name('patient.visits.destroy');
