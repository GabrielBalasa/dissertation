@extends('layouts.app')

@section('content')
<div class="container"> {{-- Contact us page --}}
    <div class="card mb-3 border-0 mb-5">
        <div class="row g-0">
            <div class="card-body mt-5">
                <h1>Contact us</h1>
                <div class="container-fluid d-flex flex-row h-100">
                    <div class="d-flex flex-column m-5 w-75">
                        <form method="POST" action="/contact"> {{-- Form to create new entry for contacts --}}
                            @include('partials.success')
                            {{ csrf_field() }}
                            <div class="col-12 mb-1">
                                <label for="contact_name">Name</label>
                                <input type="text" class="form-control w-35" id="contact_name" name="contact_name" placeholder="Name">
                            </div>
                            
                            <div class="col-12 mb-1">
                                <label for="contact_email">Email</label>
                                <input type="text" class="form-control w-35" id="contact_email" name="contact_email" placeholder="Email">
                            </div>
                    
                            <div class="col-12 mb-1">
                                <label for="contact_message">Message</label>
                                <textarea type="text" class="form-control w-50" id="contact_message" name="contact_message" placeholder="Write your message here" rows="7" cols="50"></textarea>
                            </div>
                    
                            <div class="col-12 pt-3">
                                <button style="cursor:pointer" type="submit" class="btn primary-btn">Send</button>
                            </div>
                        </form>
                        @include('partials.formerrors')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection