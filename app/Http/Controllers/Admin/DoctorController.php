<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2020-12-29T13:07:33+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;

class DoctorController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
      {
  $doctors = Doctor::all();
  return view('admin.doctors.index', [
    'doctors' => $doctors
  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
        return view('admin.doctors.create', [
          'users'=> $users
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|min:10',
        'email' => 'required|max:191',

        'registration_no'=> 'required|max:10|unique:doctors,registration_no'

      ]);
      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->save();

      $doctor = new Doctor();
      $doctor->registration_no = $request->input('registration_no');
      $doctor->user_id = $user->id;
      $doctor->save();

      return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $doctor = Doctor::findOrFail($id);
      return view('admin.doctors.show', [
        'doctor' => $doctor
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $doctor = Doctor::findOrFail($id);
      return view('admin.doctors.edit', [
        'doctor' => $doctor
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'name' => 'required|max:191',
          'address' => 'required|max:191',
          'phone' => 'required|min:10|unique:doctors,phone,' . $doctor->id,
          'email' => 'required|max:191',

          'registration_no'=> 'required|max:10|unique:doctors,registration_no'

        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        $doctor = new Doctor();
        $doctor->registration_no = $request->input('registration_no');
        $doctor->user_id = $user->id;
        $doctor->save();

        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('admin.doctors.index');
    }
}
