@extends('layouts.patient.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- displays this page if you are logged in as a patient --}}
                  </br>
                    Hi {{Auth::user()->name}}
                  </br>
                  Email: {{Auth::user()->email}}
                </br>
                Address: {{Auth::user()->address}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
