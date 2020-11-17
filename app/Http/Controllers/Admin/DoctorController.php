<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2020-11-17T20:31:55+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

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
        return view('admin.doctors.create');
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
        'password' => 'required|max:191'

      ]);
      $doctor = new Doctor();
      $doctor->name = $request->input('name');
      $doctor->address = $request->input('address');
      $doctor->phone = $request->input('phone');
      $doctor->email = $request->input('email');
      $doctor->password = $request->input('password');

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
          'password' => 'required|max:191'

        ]);
        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->email = $request->input('email');
        $doctor->password = $request->input('password');

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
