@extends('layouts.nav')

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
            <form method="POST" action="{{ route('admin.visits.update', $visit->id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form_group">
                <label for="patient_id">Patient ID</label>
                <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ old('patient_id', $visit->patient_id) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="doctor_id">Doctor ID</label>
                <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id', $visit->doctor_id) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $visit->date) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time" value="{{ old('time', $visit->time) }}" />
              </email
              <br>
              <div class="form_group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('password', $visit->description) }}" />
              </div>
              <br>
              <div class="float-right">
                <br>
                {{-- creating cancel and submit button --}}
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
