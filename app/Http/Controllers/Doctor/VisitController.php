<?php
# @Date:   2021-01-07T17:11:12+00:00
# @Last modified time: 2021-01-07T18:36:53+00:00




namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Visit;
use App\Models\Patient;
use App\Models\Doctor;

class VisitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $visits = $user->doctor->visits()->orderBy('date', 'asc')->paginate(8);

        return view('doctor.visits.index', [
          'visits' => $visits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $visits = Visit::all();
      $patients = Patient::all();
      $doctors = Doctor::all();
        return view('doctor.visits.create', [
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
      return redirect()->route('$doctor.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //find the visit by id
      $visit = Visit::findOrFail($id);
      return view('doctor.visits.show', [
       'visit' => $visit
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
      //find the visit by id
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
      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->description = $request->input('description');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();

      //when the visit has been stored redirect back to the index page
      return redirect()->route('doctor.visits.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);
      $visit->delete();

      return redirect()->route('doctor.visits.index');

}
}