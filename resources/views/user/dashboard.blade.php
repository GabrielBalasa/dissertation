@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('user.sidemenu')
        <div class="d-flex flex-column m-5 w-75">
            @include('partials.formerrors')
            <div class="row">
                <h1>Dashboard</h1> {{-- User menu dashboard page --}}
            </div>
            <div class="row">
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Workouts/Exercises</h4>
                        @if($workouts->count()) {{-- Check for existing workouts --}}
                            <div class="card-body row w-100">
                                <div class="col-6">
                                    <div class="card d-flex align-items-center">
                                    <h4 class="mt-3">Workouts</h4>
                                        <div class="card-body">
                                            <div class="card-text">{{ $workouts->count(); }}</div> {{-- Display current number of workouts --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card d-flex align-items-center">
                                    <h4 class="mt-3">Exercises</h4>
                                        <div class="card-body">
                                            @if ($exercisesTotal) {{-- Check for existing exercises --}}
                                                <div class="card-text">{{ $exercisesTotal }}</div> {{-- Display current number of exercises --}}
                                            @else
                                                <div class="card-text">You have no workouts with exercises yet.</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/user/exercises" class="btn secondary-btn mb-2">View workouts</a>
                        @else {{-- In case the user has no workouts assigned --}}
                        <div class="card-body row w-100">
                            <div class="col-6">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Workouts</h4>
                                    <div class="card-body">
                                        <div class="card-text"> You have no workouts assigned yet.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Exercises</h4>
                                    <div class="card-body">
                                        <div class="card-text">You have no workouts with exercises yet.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Trainer</h4> {{-- Trainer details based on subscription details --}}
                      <div class="card-body">
                        <div class="card-text">
                            @if ($trainer) {{-- Check if user has trainer --}}
                                <div class="row justify-content-center">{{ $trainer->firstname }} {{ $trainer->lastname }}</div>
                                <div class="row justify-content-center">{{ $trainer->email }}</div>
                            @else
                                <div class="row justify-content-center">You have no trainer.</div>
                            @endif
                        </div>
                      </div>
                      <a href="/user/trainer" class="btn secondary-btn mb-2">View trainer tab</a>
                    </div>
                </div>
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Subscription</h4>
                      <div class="card-body">
                        <div class="card-text">
                            @if($subscriber) {{-- Check if user is subscribed to trainer --}}
                                <div class="row justify-content-center">Tier: {{ $subscriber->subscription_tier }}</div> {{-- Display subscription details --}}
                                <div class="row justify-content-center">Price: £{{$subscription["tier{$subscriber->subscription_tier}_price"]}}</div>
                            @else
                                <div class="row justify-content-center">You have not subscribed to any trainer.</div>
                            @endif
                        </div>
                      </div>
                      <a href="/user/subscription" class="btn secondary-btn mb-2">View subscription tab</a>
                    </div>
                </div>
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Coming soon</h4>
                      <div class="card-body">
                        <div class="card-text">Coming soon</div>
                      </div>
                      <a href="" class="btn secondary-btn mb-2">Coming soon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection