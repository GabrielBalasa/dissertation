@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5 w-50">
            <h1>Personal Details</h1> {{-- Trainer menu personal details page --}}
            <div class="card col-12 my-3">
                <div class="row">
                    <div class="col-6">
                        <div class="row g-0"> {{-- Trainer current personal details --}}
                            <div class="col-md-4">
                                <img src="{{asset('images/one.jpeg')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body row">
                                    <h4 class="mt-1">{{$user['firstname']}} {{$user['lastname']}}</h4>
                                    <div>{{$user['email']}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column">
                        <div class="m-2 d-flex justify-content-end">
                            <a class="btn secondary-btn w-50" href="/trainer/personaldetails/changeaddress" role="button"> {{-- Redirect to edit logged in user's address page --}}
                                    Change address
                            </a>
                        </div>
                        <div class="m-2 d-flex justify-content-end">
                            <a class="btn secondary-btn w-50" href="/trainer/personaldetails/changepassword" role="button"> {{-- Redirect to edit logged in user's password  --}}
                                    Change password
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light">
                <h4 class="mx-2 pt-2">Change your details</h4>
                <form class="m-2 px-3" method="POST" action="/trainer/personaldetails"> {{-- Form to change basic personal details for logged in user --}}
                    @include('partials.formerrors')
                    @include('partials.success')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="firstname" class="fw-bold">First name</label>
                        <input type="text" class="form-control w-50" id="firstname" name="firstname" value="{{$user['firstname']}}">
                    </div>
                    
                    <div class="col-12">
                        <label for="lastname" class="fw-bold">Last name</label>
                        <input type="text" class="form-control w-50" id="lastname" name="lastname" value="{{$user['lastname']}}">
                    </div>
            
                    <div class="col-12 pt-2">
                        <label for="email" class="fw-bold">Email</label>
                        <input type="email" class="form-control w-50" id="email" name="email" value="{{$user['email']}}">
                    </div>
            
                    <div class="col-12 pt-3">
                        <button style="cursor:pointer" type="submit" class="btn primary-btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection