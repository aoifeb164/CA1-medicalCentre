@extends('layouts.nav')

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
            <form method="POST" action="{{ route('admin.visits.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form_group">
                <label for="patient_id">Patient Name</label>
                <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ old('patient_id') }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="doctor_id">Doctor Name</label>
                <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}" />
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
                <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
