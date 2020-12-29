<?php
# @Date:   2020-12-22T16:59:52+00:00
# @Last modified time: 2020-12-29T13:37:21+00:00




namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;

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
    public function index()
    {
      $visits = Visit::all();
      return view('admin.visits.index', [
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
        return view('admin.visits.create');
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
      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->description = $request->input('description');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();

      return redirect()->route('admin.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function edit($id)
    {
      $visit = Visit::findOrFail($id);
      return view('admin.visits.edit', [
        'visit' => $visit
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
      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->description = $request->input('description');
      $visit->patient_id = $request->input('patient_id');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->save();

      return redirect()->route('admin.visits.index');
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

      return redirect()->route('admin.visits.index');
    }
}
