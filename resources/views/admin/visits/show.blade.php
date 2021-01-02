@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    {{-- getting visit time to be displayed --}}
                    {{$visit->time}} Visit
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                {{-- getting information to be displayed from the visit table --}}
                                <td>Patient</td>
                                <td>{{ $visit->patient_id }}</td>
                            </tr>
                            <tr>
                                <td>Doctor</td>
                                <td>{{ $visit->doctor_id }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $visit->date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ $visit->time }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $visit->description }}</td>
                            </tr>
                        </tbody>
                    </table>

                      {{-- creating back, edit and delete button --}}
                    <a href="{{ route('admin.visits.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.visits.edit', $visit->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id ) }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
