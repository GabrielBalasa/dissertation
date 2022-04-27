@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('user.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/user/personaldetails/changepassword"> {{-- Form to change password for logged in user --}}
                {{ csrf_field() }}
                @include('partials.formerrors')
                @include('partials.success')
                <h1>Change password</h1>
                <div class="col-11 pt-2">
                    <label for="oldpassword">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter old password" name="oldpassword"> {{-- Requires old password --}}
                </div>
                
                <div class="col-11 pt-2">
                    <label for="newpassword">New Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter new password" name="newpassword"> {{-- New password must be different from old password --}}
                </div>
                
                <div class="col-11 pt-2">
                    <label for="newpassword_confirmation">Confirm New Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Confirm new password" name="newpassword_confirmation"> {{-- Confirm new password must match new password --}}
                </div>
            
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection 