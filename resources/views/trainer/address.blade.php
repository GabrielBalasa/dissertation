@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/trainer/personaldetails/changeaddress"> {{-- Form to update address details on trainer menu --}}
                @include('partials.success')
                {{ csrf_field() }}
                <div class="container">
                    <div class="current-address mx-5">
                        <h2 class="mb-3">Address Details</h2> {{-- Display for current address details --}}
                        <p class="fs-5 text mb-1">
                            {{$user['address']}}
                        </p>
                        <p class="fs-5 text mb-1">
                            {{$user['city']}}
                        </p>
                        <p class="fs-5 text mb-1">
                            {{$user['postcode']}}
                        </p>
                    </div>
                  
                    <div class="d-flex flex-column mx-5 mt-4">
                        <h2 class=" mb-3">Change Address Details</h2> {{-- Input fields for new address details --}}
                        <div class="col-12">
                            <label for="address">New Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$user['address']}}">
                        </div>
                        
                        <div class="col-12">
                            <label for="city">New City:</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$user['city']}}">
                        </div>
                
                        <div class="col-12 pt-2">
                            <label for="postcode">New Postcode:</label>
                            <input type="postcode" class="form-control" id="postcode" name="postcode" value="{{$user['postcode']}}">
                        </div>
                
                        <div class="col-12 pt-3">
                            <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                        </div>
                    </div>
                </div>
                @include('partials.formerrors')
            </form>
        </div>
    </div>
@endsection 