@extends('layouts.doctor.nav')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <p id="alert-message" class="alert collapse"></p>

      <div class="card">
        <div class="card-header">
            {{-- visits index --}}
          Visits
          <a href="{{ route('doctor.visits.create') }}" class="btn btn-primary float-right">Add</a>
        </div>

          {{-- if there are no visits display the following message --}}
        <div class="card-body">
          @if (count($visits)=== 0)
            <p>There are no visits!</p>
          @else
            <table id ="table-visits" class="table table-hover">
              <thead>
                {{-- table headings --}}
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
            </thead>

            <tbody>
          @foreach ($visits as $visit)
            {{-- get visits by id and display the following information --}}
            <tr data-id="{{ $visit->id }}">
              <td>{{ $visit->patient->user->name }}</td>
              <td>{{ $visit->doctor->user->name}}</td>
              <td>{{ $visit->date }}</td>
              <td>{{ $visit->time }}</td>
              <td>{{ $visit->description }}</td>
              <td>
                {{-- creating a view, edit and delete button --}}
                <a href="{{ route('doctor.visits.show', $visit->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('doctor.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                <form style="display:inline-block" method="POST" action="{{ route('doctor.visits.destroy', $visit->id ) }}">
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
