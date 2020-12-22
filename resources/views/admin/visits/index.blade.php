@extends('layouts.nav')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>

      <div class="card">
        <div class="card-header">
          Visits
          <a href="{{ route('admin.visits.create') }}" class="btn btn-primary float-right">Add</a>
        </div>

        <div class="card-body">
          @if (count($visits)=== 0)
            <p>There are no visits!</p>
          @else
            <table id ="table-visits" class="table table-hover">
              <thead>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
            </thead>

            <tbody>
          @foreach ($visits as $visit)
            <tr data-id="{{ $visit->id }}">
              <td>{{ $visit->patient_id }}</td>
              <td>{{ $visit->doctor_id }}</td>
              <td>{{ $visit->date }}</td>
              <td>{{ $visit->time }}</td>
              <td>{{ $visit->description }}</td>
              <td>
                <a href="{{ route('admin.visits.show', $visit->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id ) }}">
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
