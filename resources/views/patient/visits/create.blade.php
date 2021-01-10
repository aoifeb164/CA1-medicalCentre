@extends('layouts.patient.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new patient appointment
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
            {{-- create new visit form --}}
            <form method="POST" action="{{ route('patient.visits.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form_group">
                {{-- creating form fields to fill in the information to be added to the database --}}
               <label for="patient">Patient</label>
               <br>
           <select name="patient_id">
             @foreach ($patients as $patient)
               <option value ="{{ $patient->id }}" {{ (old('patient_id') == $patient->id) ? "selected" : "" }} >{{ $patient->user->name }}</option>
              @endforeach
             </select>
             </div>
              <br>
              <div class="form_group">
               <label for="doctor">Doctor</label>
               <br>
           <select name="doctor_id">
             @foreach ($doctors as $doctor)
               <option value ="{{ $doctor->id }}" {{ (old('doctor_id') == $doctor->id) ? "selected" : "" }} >{{ $doctor->user->name }}</option>
              @endforeach
             </select>
             </div>
              <br>
              <div class="form_group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}" />
              </email>
              <br>
              <div class="form_group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" />
              </div>
              <br>
              <div class="float-right">
                <br>
                {{-- creating cancel and submit button --}}
                <a href="{{ route('patient.visits.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
