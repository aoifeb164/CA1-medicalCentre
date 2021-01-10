@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Add new patient
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
                      {{-- create new patient form --}}
                    <form method="POST" action="{{ route('admin.patients.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form_group">
                          {{-- creating form fields to fill in the information to be added to the database --}}
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                        <br>
                        <div class="form_group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" />
                        </div>
                        <br>
                        <div class="form_group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" />
                        </div>
                        <br>
                        <div class="form_group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                            </email>
                            <br>
                            <div class="form_group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" />
                            </div>
                            <br>
                            <div class="form_group">
                                <label for="policy_no">Policy No.</label>
                                <input type="text" class="form-control" id="policy_no" name="policy_no" value="{{ old('policy_no') }}" />
                            </div>
                            <br>
                             <div class="form_group">
                              <label for="insurance_company">Insurance Company</label>
                              <br>
                          <select name="insurance_company_id">
                            @foreach ($insurance_companies as $insurance_company)
                              <option value ="{{ $insurance_company->id }}" {{ (old('insurance_company_id') == $insurance_company->id) ? "selected" : "" }} >{{ $insurance_company->name }}</option>
                             @endforeach
                            </select>
                            </div>
                            <div class="float-right">
                                <br>
                                {{-- creating cancel and submit button --}}
                                <a href="{{ route('admin.patients.index') }}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
