@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('user.sidemenu')
        <div class="d-flex flex-column m-5 w-50">
            <h1>Trainer</h1> {{-- User menu trainer page --}}
            <div class="card col-12 my-3">
                <div class="row">
                    <div class="col-6">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('images/one.jpeg')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body row">
                                    <h4 class="mt-1">{{$trainer['firstname']}} {{$trainer['lastname']}}</h4> {{-- Display for current trainer details --}}
                                    <div>{{$trainer['email']}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-center">
                        <div class="m-2 d-flex justify-content-end">
                            <a class="btn secondary-btn w-50" href="/trainers/{{$trainer['id']}}" role="button"> {{-- Redirect to trainer's profile page --}}
                                    View profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection