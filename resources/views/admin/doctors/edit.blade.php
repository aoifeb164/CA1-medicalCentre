@extends('layouts.admin.nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit an existing doctor
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
              {{-- edit doctor form --}}
            <form method="POST" action="{{ route('admin.doctors.update', $doctor->id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form_group">
                {{-- creating form fields to fill in the information to be added to the database --}}
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $doctor->user->name) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $doctor->user->address) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $doctor->user->phone) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $doctor->user->email) }}" />
              </email>
              <br>
              <div class="form_group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $doctor->user->password) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="registration_no">Registration number</label>
                <input type="text" class="form-control" id="registration_no" name="registration_no" value="{{ old('registration_no', $doctor->registration_no) }}" />
              </div>
              <br>
              <div class="form_group">
                <label for="date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $doctor->start_date) }}" />
              </div>
              <div class="float-right">
                <br>
                  {{-- creating cancel and submit button --}}
                <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
