<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2020-12-22T18:57:36+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class PatientController extends Controller
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
  $patients = Patient::all();
  return view('admin.patients.index', [
    'patients' => $patients
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
      $insurance_companies = InsuranceCompany::all();
        return view('admin.patients.create', [
          'users'=> $users,
        'insurance_companies' => $insurance_companies
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

        'insurance_company_id' => 'required',
        'policy_no' => 'required|max:191|unique:patients,policy_no'

      ]);

      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = Hash::make('secret');
      $user->save();

      $patient = new Patient();
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_no = $request->input('policy_no');
      $patient->user_id = $user->id;
      $patient->save();

      return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);
      return view('admin.patients.show', [
        'patient' => $patient
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
      $patient = Patient::findOrFail($id);
      return view('admin.patients.edit', [
        'patient' => $patient
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
          'phone' => 'required|min:10|unique:patients,phone,' . $patient->id,
          'email' => 'required|max:191',
          'password' => 'required|max:191',

          'insurance_company_id' => 'required',
          'policy_no' => 'required|max:191'


        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        $patient = new Patient();
        $patient->insurance_company_id = $request->input('insurance_company_id');
        $patient->policy_no = $request->input('policy_no');
        $patient->save();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('admin.patients.index');
    }
}
