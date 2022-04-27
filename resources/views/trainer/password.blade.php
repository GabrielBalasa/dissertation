@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/trainer/personaldetails/changepassword"> {{-- Form to change logged in user password --}}
                {{ csrf_field() }}
                @include('partials.formerrors')
                @include('partials.success')
                <h2>Change password</h2>
                <div class="col-12 pt-2 mb-1">
                    <label for="oldpassword">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter old password" name="oldpassword"> {{-- Requires old password --}}
                </div>
                
                <div class="col-12 pt-2 mb-1">
                    <label for="newpassword">New Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter new password" name="newpassword"> {{-- New password has to be different from old password --}}
                </div>
                
                <div class="col-12 pt-2 mb-1">
                    <label for="newpassword_confirmation">Confirm New Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Confirm new password" name="newpassword_confirmation"> {{-- Confirm new password must be the same with new password --}}
                </div>
            
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection 