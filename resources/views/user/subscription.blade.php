@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('user.sidemenu')
        <div class="d-flex flex-column m-5 w-100">
            <div class="row">
                <h1>Subscription</h1> {{-- User menu subscription page --}}
            </div>
            <div class="row w-85 mt-5">
                <div class="col-4 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Subscription</h4> {{-- Subscription details based on trainer and tier --}}
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row justify-content-center">Tier: {{ $subscriber->subscription_tier }}</div>
                                <div class="row justify-content-center">Price: £{{$subscription["tier{$subscriber->subscription_tier}_price"]}}</div>
                                <div class="row justify-content-center">Description:</div>
                                <div class="row justify-content-center mx-2">{{$subscription["tier{$subscriber->subscription_tier}_description"]}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-5">
                </div>
                <div class="col-4 mb-5">
                </div>
            </div>
        </div>
    </div>
@endsection