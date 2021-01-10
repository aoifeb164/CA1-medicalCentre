<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-01-10T22:14:11+00:00




namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
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

      //when requesting the index page display the patients index and get all the patients from the patients table
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

   //when storing a new patient the fields are validated by making sure they have entered data and inputed using correct information format
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
        $user->password = Hash::make('secret');
      $user->save();

      //saves as a new patient and stores the following in the patients table
      $patient = new Patient();
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_no = $request->input('policy_no');
      $patient->user_id = $user->id;
      $patient->save();

      //flash message to appear when a patient has been added (does not work)
      $request->session()->flash('succcess', 'Pateint added successfully!');

      //when the patient has been stored redirect back to the index page
      return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when requesting the show patient page display the patients show page and get the patient by id from the patients table
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

     //when requesting to edit a patient display the patient edit page and get the patient by id from the patients table
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

     //when updating a new patient the fields are validated by making sure they have inputed and they are using correct information format
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|min:10',
        'email' => 'required|max:191',

        'insurance_company_id' => 'required',
        'policy_no' => 'required|max:191'

      ]);

      //saves as a new user and stores the following information in the user table
      $user = User::findOrFail($id);
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
        $user->password = Hash::make('secret');
      $user->save();

      //saves as a new patient and stores the following in the patients table
      $patient = Patient::findOrFail($id);
      $patient->insurance_company_id = $request->input('insurance_company_id');
      $patient->policy_no = $request->input('policy_no');
      $patient->save();

      //message to appear when a doctor has been edited
      $request->session()->flash('info', 'Pateint edited successfully!');

      //when the patient has been stored redirect back to the index page
      return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when deleting a patient get them by id in the patients table and redirect back to patient index page
    public function destroy(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        //message to appear when a doctor has been deleted
        $request->session()->flash('danger', 'Patient deleted successfully!');
        return redirect()->route('admin.patients.index');
    }
}
