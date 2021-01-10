@extends('layouts.doctor.nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit a visit
          </div>

          <div class='card-body'>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            {{-- edit visit form --}}
            <form method="POST" action="{{ route('doctor.visits.update', $visit->id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="Put">
              <div class="form_group">
                {{-- creating form fields to fill in the information to be added to the database --}}
                <label for="patient">Patient</label>
                <br>
            <select name="patient_id">
              @foreach ($patients as $patient)
                <option value ="{{ $patient->id }}" {{ (old('patient_id', $patient->user->name) == $patient->user->name) ? "selected" : "" }} >{{ $patient->user->name }}</option>
               @endforeach
              </select>
              </div>
               <br>
               <div class="form_group">
                <label for="doctor">Doctor</label>
                <br>
            <select name="doctor_id">
              @foreach ($doctors as $doctor)
                <option value ="{{ $doctor->id }}" {{ (old('doctor_id', $doctor->user->name) == $doctor->user->name) ? "selected" : "" }} >{{ $doctor->user->name }}</option>
               @endforeach
              </select>
              </div>
               <br>
               <div class="form_group">
                 <label for="date">Date</label>
                 <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $visit->date) }}" />
               </div>
               <br>
               <div class="form_group">
                 <label for="time">Time</label>
                 <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $visit->time) }}" />
               <br>
              <div class="form_group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('password', $visit->description) }}" />
              </div>
              <br>
              <div class="float-right">
                <br>
                {{-- creating cancel and submit button --}}
                <a href="{{ route('doctor.visits.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
