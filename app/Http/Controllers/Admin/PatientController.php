<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-01-07T16:58:15+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//calling the paient, user and insurance company models
use App\Models\Patient;
use App\Models\User;
use App\Models\InsuranceCompany;

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

      //when on the index page display the patients index
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

     //when on the add patient page display the patients create form page
    public function create()
    {
      //get all users from the users table
      $users = User::all();
      //get all insurance compaies
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

     //when storing a new patient the fields are validated by making sure they have inputed using correct information format
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

      //saves as a new user and stores the following information in the user table
      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->save();

      //saves as a new patient and stores the following in the patients table
      $patient = new Patient();
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_no = $request->input('policy_no');
      $patient->user_id = $user->id;
      $patient->save();

      //when the patient has been stored redirect back to the index page
      return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when on the show patient page display the patients show page
    public function show($id)
    {
      //find the patient by id
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

    //when editing a patient display the patient edit page
    public function edit($id)
    {
      //find the patient by id
      $patient = Patient::findOrFail($id);
      $insurance_companies = InsuranceCompany::all();
      return view('admin.patients.edit', [
        'patient' => $patient,
        'insurance_companies' => $insurance_companies
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when updating a new patient the fields are validated by making sure they have inputed using correct information format
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|min:10',
        'email' => 'required|max:191',

        'insurance_company_id' => 'required',
        'policy_no' => 'required|max:191|unique:patients,policy_no'

      ]);

      //saves as a new user and stores the following information in the user table
      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->save();

      //saves as a new patient and stores the following in the patients table
      $patient = new Patient();
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_no = $request->input('policy_no');
      $patient->user_id = $user->id;
      $patient->save();

      //when the patient has been stored redirect back to the index page
      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when deleting a patient find by id and redirect back to patient index page
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('admin.patients.index');
    }
}
