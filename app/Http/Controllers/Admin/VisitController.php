<?php
# @Date:   2020-12-22T16:59:52+00:00
# @Last modified time: 2021-01-10T18:25:21+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//calling thhe visit,patient,doctor and user model
use App\Models\Visit;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\User;

class VisitController extends Controller
{

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

    //when requesting the index page display the visits index and get all the visits from the visits table
    public function index()
    {
      $visits = Visit::all()->sortBy('date');
      return view('admin.visits.index', [
        'visits' => $visits
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //when requesting the create page display the visits create form page and get all the visits,doctors and patients from their tables
    public function create()
    {
      $visits = Visit::all();
      $patients = Patient::all();
      $doctors = Doctor::all();
        return view('admin.visits.create', [
          'visits' => $visits,
          'patients' => $patients,
          'doctors' => $doctors

      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //when storing a new visit the fields are validated by making sure they have entered data and inputed using correct information format
    public function store(Request $request)
    {
      $request->validate([
        'date' => 'required|date_format:Y-m-d',
        'time' => 'required|date_format:H:i',
        'description' => 'required',

        'patient_id' => 'required',
        'doctor_id' => 'required'

      ]);

      //saves as a new visit and stores the following information in the visits table
      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->description = $request->input('description');

      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();

      //when the visit has been stored redirect back to the index page
      return redirect()->route('admin.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when requesting the show visit page display the visits show page and get the visit by id from the visits table
    public function show($id)
      {
      //find the visit by id
      $visit = Visit::findOrFail($id);
      return view('admin.visits.show', [
       'visit' => $visit
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when editing a visit display the visit edit page
    public function edit($id)
    {
      //find the visit by id and find all patients and doctors
      $visit = Visit::findOrFail($id);
      $patients = Patient::all();
      $doctors = Doctor::all();
      return view('admin.visits.edit', [
        'visit' => $visit,
        'patients' => $patients,
        'doctors' => $doctors
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when updating a new visit the fields are validated by making sure they have inputed and they are using correct information format
    public function update(Request $request, $id)
    {
      $request->validate([
        'date' => 'required|max:191',
        'time' => 'required|max:191',
        'description' => 'required|min:10',
        'patient_id' => 'required',
        'doctor_id' => 'required'

      ]);

      //saves as a new visit and stores the following information in the visits table
      $visit = Visit::findOrFail($id);
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->description = $request->input('description');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();

      //when the visit has been stored redirect back to the index page
      return redirect()->route('admin.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when deleting a visit find by ide and redirect back to the index page
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);
      $visit->delete();

      return redirect()->route('admin.visits.index');
    }
}
