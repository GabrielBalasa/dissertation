@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1>Register</h1> {{-- Registration form create based on the tutorial under reference [8] --}}
                    <form method="POST" action="/register">
                    
                        {{ csrf_field() }}
                        <div class="col-11">
                            <label for="firstname">First name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname">
                        </div>
                        
                        <div class="col-11 pt-2">
                            <label for="lastname">Last name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>
                
                        <div class="col-11 pt-2">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        
                        <div class="col-11 pt-2">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        
                        <div class="col-11 pt-2">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        
                        <div class="col-11 pt-2">
                            <label for="postcode">Postcode:</label>
                            <input type="text" class="form-control" id="postcode" name="postcode">
                        </div>
                        
                        <div class="col-11 pt-2">
                            <label for="dob">Date of birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                
                        <div class="col-11 pt-2">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        
                        <div>
                            <input type="checkbox" class="m-1 mt-2" name="terms" id="terms">
                            <label for="terms">I accept the <a href="/terms">terms and conditions</a>.</label>
                        </div>
                
                        <div class="col-12 pt-3">
                            <button style="cursor:pointer" type="submit" class="btn primary-btn">Create account</button>
                        </div>
                        @include('partials.formerrors')
                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-5 shadow p-3 mb-5 bg-body rounded">
                    <img src="images/register.jpg" class="img-fluid" alt="gloves image">
                </div>
            </div>
        </div>
    </section>
@endsection