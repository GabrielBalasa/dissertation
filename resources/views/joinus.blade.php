@extends('layouts.app')

@section('content')
    <div class="card m-5 p-3 shadow p-3 mb-5 bg-body rounded"> {{-- Become a trainer page --}}
        <div class="card-body">
            <h3>Would you like to join us?</h3>
            @if( auth()->check() )
                <p>Simply press the Apply button below and we will contact you soon to start the verification process.</p>
                <form method="POST" action="/joinus">
                    {{ csrf_field() }}
                    <div class="col-12 pt-3">
                        <button style="cursor:pointer" type="submit" class="btn primary-btn">Apply</button>
                    </div>
                    @include('partials.formerrors')
                </form>
            @else
                Please <a href="/login">Login</a> or <a href="/register">Register</a> to join us.
            @endif
            
        </div>
    </div>
@endsection