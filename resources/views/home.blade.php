@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @role('Admin')
            <div class="col-md-12">
                <h2>{{ __('Dashboard') }}</h2>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">New Register User</h5>
                                <p class="card-text">{{$today_users}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total User</h5>
                                <p class="card-text">{{$total_users}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
                @endrole
        </div>
    </div>
@endsection
