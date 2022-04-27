@extends('layouts.app')

@section('content')
    <div class="card m-5 p-3 shadow p-3 mb-5 bg-body rounded"> {{-- Page view for trainers and users on waiting list as "pending" --}}
        <div class="card-body">
            <h3>Thank you for applying to become a trainer!</h3>
                <p>Your application is either pending or has already been accepted.</p>
        </div>
    </div>
@endsection