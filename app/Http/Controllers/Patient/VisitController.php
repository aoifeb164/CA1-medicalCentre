<?php
# @Date:   2021-01-07T17:11:12+00:00
# @Last modified time: 2021-02-18T20:02:47+00:00




namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
//calling the visit, doctor and patient table
use App\Models\Visit;
use App\Models\Patient;
use App\Models\Doctor;

class VisitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,patient');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //when requesting the index page display the visits index and get all the visits from the visits table
    public function index()
    {
        $user = Auth::user();

        //display only the patient who is logged in visits and order by date
        $visits = $user->patient->visits()->orderBy('date', 'asc')->paginate(8);

        return view('patient.visits.index', [
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
      $patients = patient::all();
      $doctors = Doctor::all();
        return view('patient.visits.create', [
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
      return redirect()->route('patient.visits.index');
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
      return view('patient.visits.show', [
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
      //find the visit by id
      $visit = Visit::findOrFail($id);
      $patients = Patient::all();
      $doctors = Doctor::all();
      return view('patient.visits.edit', [
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
      return redirect()->route('patient.visits.index');
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

      return redirect()->route('patient.visits.index');

}
}
