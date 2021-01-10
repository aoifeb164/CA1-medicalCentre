<?php
# @Date:   2020-11-16T11:52:08+00:00
# @Last modified time: 2021-01-10T22:13:17+00:00




namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//calling the user and doctor model
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

     //when requesting the index page display the doctors index and get all the doctors from the doctors table
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

     //when requesting the create page display the doctors create form page and get all the doctors from the doctors table
    public function create()
    {
      $users = User::all();
        return view('admin.doctors.create', [
          'users' => $users,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //when storing a new doctor the fields are validated by making sure they have entered data and inputed using correct information format
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|max:191',
        'address' => 'required|max:191',
        'phone' => 'required|min:10',
        'email' => 'required|max:191|unique:users,email',

        'registration_no'=> 'required|max:10',
        'start_date'=>'required|date_format:Y-m-d'

      //saves as a new user and stores the following information in the user table
      ]);
      $user = new User();
      $user->name = $request->input('name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->email = $request->input('email');
      $user->password = Hash::make('secret');
      $user->save();

      //saves as a new doctor and stores the following in the doctors table
      $doctor = new Doctor();
      $doctor->registration_no = $request->input('registration_no');
      $doctor->start_date = $request->input('start_date');
      $doctor->user_id = $user->id;
      $doctor->save();

      //flash message to appear when a doctor has been added (does not work)
      $request->session()->flash('succcess', 'Doctor added successfully!');

      //when the doctor has been store redirect back to the index page
      return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when requesting the show doctor page display the doctors show page and get the doctor by id from the doctors table
    public function show($id)
    {
      //find the doctor by id
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

     //when requesting to edit a doctor display the doctor edit page and get the dcotor by id from the doctors table
    public function edit($id)
    {
      //find the doctor by id
      $doctor = Doctor::findOrFail($id);
      $users = User::all();
      return view('admin.doctors.edit', [
        'doctor' => $doctor,
        'users' =>$users
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //when updating a new doctor the fields are validated by making sure they have inputed and they are using correct information format
    public function update(Request $request, $id)
    {
        // $doctor = Doctor::findOrFail($id);
        $request->validate([
          'name' => 'required|max:191',
          'address' => 'required|max:191',
          'phone' => 'required|min:10',
          'email' => 'required|max:191',

          'registration_no'=> 'required|max:10',
          'start_date'=>'required|date_format:Y-m-d'

        ]);

        //saves as a user and stores the following information in the user table
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make('secret');
        $user->save();

        //saves as a doctor and stores the following in the doctors table
        $doctor = Doctor::findOrFail($id);
        $doctor->registration_no = $request->input('registration_no');
        $doctor->start_date = $request->input('start_date');
        $doctor->save();

        //message to appear when a doctor has been edited
        $request->session()->flash('info', 'Doctor edited successfully!');


        //when the doctor has been stored redirect back to the index page
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //when deleting a doctor get them by id in the doctors table and redirect back to doctor index page
    public function destroy(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        //message to appear when a doctor has been deleted
        $request->session()->flash('danger', 'Doctor deleted successfully!');

        return redirect()->route('admin.doctors.index');
    }
}
