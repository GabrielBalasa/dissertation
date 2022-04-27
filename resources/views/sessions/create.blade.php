@extends('layouts.app')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 shadow d-flex p-3 mb-5 bg-body w-25 h-50 border border-dark rounded">
                    <div class="h-50 mt-5 align-self-center">
                        <h2 class="text-center">New here?</h2>
                        <p class="mx-5 text-center">Join us now by just pressing the registration button below.</p>
                        <div class="text-center text-lg-start mt-2 pt-2 d-flex justify-content-center">
                            <a style="cursor:pointer" href="/register" class="btn primary-btn w-25">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1>Log In</h1> {{-- Login form create based on the tutorial under reference [8] --}}
                    <form method="POST" action="/login">
                        
                        {{ csrf_field() }}
                        <div class="form-outline mb-4">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                
                        <div class="form-outline mb-4">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button style="cursor:pointer" type="submit" class="btn primary-btn w-25">Login</button>
                        </div>
                        @include('partials.formerrors')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection