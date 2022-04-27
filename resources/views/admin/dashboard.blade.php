@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('admin.sidemenu')
        <div class="d-flex flex-column m-5 w-75">
            @include('partials.formerrors')
            <div class="row">
                <h1>Dashboard</h1> {{-- Admin menu dashboard --}}
            </div>
            
            <div class="row">
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Users</h4>
                        <div class="card-body row w-100">
                            <div class="col-6">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Total users</h4>
                                    <div class="card-body">
                                        <div class="card-text">{{ $usersCount }}</div> {{-- Total number of users --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Trainers</h4>
                                    <div class="card-body">
                                        <div class="card-text">{{ $trainersCount }}</div> {{-- Total number of trainers --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/users" class="btn secondary-btn mb-2">View users</a> {{-- Redirect to users page --}}
                    </div>
                </div>
                
                
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Waiting List</h4>
                      <div class="card-body">
                        <div class="card-text">
                            <div class="row justify-content-center">{{ $waitingListCount }}</div> {{-- Total number of users on waiting list to become trainer --}}
                        </div>
                      </div>
                      <a href="/admin/waitinglist" class="btn secondary-btn mb-2">View waiting list</a> {{-- Redirect to the waiting list page --}}
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