@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('admin.sidemenu')
        <div class="d-flex flex-column m-5 w-50">
            <h1>Edit user</h1> {{-- Admin menu user edit page --}}
            <div class="card bg-light">
                <form class="m-2 px-3" method="POST" action="/admin/users/{{ $editUser->id }}"> {{-- Form to display existing user data and allow admin to edit data --}}
                    @include('partials.formerrors')
                    @include('partials.success')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="firstname" class="fw-bold">First name</label>
                        <input type="text" class="form-control w-50" id="firstname" name="firstname" value="{{$editUser['firstname']}}">
                    </div>
                    
                    <div class="col-12">
                        <label for="lastname" class="fw-bold">Last name</label>
                        <input type="text" class="form-control w-50" id="lastname" name="lastname" value="{{$editUser['lastname']}}">
                    </div>
            
                    <div class="col-12 pt-2">
                        <label for="email" class="fw-bold">Email</label>
                        <input type="email" class="form-control w-50" id="email" name="email" value="{{$editUser['email']}}">
                    </div>
                    
                    <div class="col-12 mb-2">
                        <label for="address">New Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$editUser['address']}}">
                    </div>
                    
                    <div class="col-12 mb-2">
                        <label for="city">New City:</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{$editUser['city']}}">
                    </div>
            
                    <div class="col-12 mb-2">
                        <label for="postcode">New Postcode:</label>
                        <input type="postcode" class="form-control" id="postcode" name="postcode" value="{{$editUser['postcode']}}">
                    </div>
                    
                    <div class="col-12 mb-2">
                        <label for="dob">New Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{$editUser['dob']}}">
                    </div>
            
                    <div class="col-12 pt-3">
                        <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection