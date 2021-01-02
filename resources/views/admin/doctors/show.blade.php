@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  {{-- getting doctor name to be displayed --}}
                    Doctor: {{$doctor->name}}
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                              {{-- getting information to be displayed from the user table --}}
                                <td>Name</td>
                                <td>{{ $doctor->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $doctor->user->address }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $doctor->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>
                            <tr>
                              {{-- getting information to be displayed from the doctor table --}}
                                <td>Registration number</td>
                                <td>{{ $doctor->registration_no}}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- creating back, edit and delete button --}}
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.doctors.destroy', $doctor->id ) }}">
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
