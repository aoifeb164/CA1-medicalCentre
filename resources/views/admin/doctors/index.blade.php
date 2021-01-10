@extends('layouts.admin.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>

      <div class="card">
        <div class="card-header">
            {{-- doctors index --}}
          Doctors
          <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary float-right">Add</a>
        </div>

        {{-- if there are no doctors display the following message --}}
        <div class="card-body">
          @if (count($doctors)=== 0)
            <p>There are no doctors!</p>
          @else
            <table id ="table-doctors" class="table table-hover">
              <thead>
                {{-- table headings --}}
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Registration number</th>
                <th>Start Date</th>
            </thead>

            <tbody>
          @foreach ($doctors as $doctor)
            {{-- get doctors by id and display the following information --}}
            <tr data-id="{{ $doctor->id }}">
              <td>{{ $doctor->user->name }}</td>
              <td>{{ $doctor->user->address }}</td>
              <td>{{ $doctor->user->phone }}</td>
              <td>{{ $doctor->user->email }}</td>
              <td>{{ $doctor->registration_no }}</td>
              <td>{{ $doctor->start_date }}</td>
              <td>
                {{-- creating a view, edit and delete button --}}
                <a href="{{ route('admin.doctors.show', $doctor->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id ) }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="form-control btn btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
