@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5 w-75">
            @include('partials.formerrors')
            <div class="row">
                <h1>Dashboard</h1> {{-- Trainer menu dashboard --}}
            </div>
            <div class="row">
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Number of clients</h4>
                      <div class="card-body">
                        <div class="card-text">{{ $clientsCount }}</div> {{-- Current number of clients --}}
                      </div>
                      <a href="/trainer/clients" class="btn secondary-btn mb-2">View clients list</a>
                    </div>
                </div>
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Subscriptions</h4>
                        <div class="card-body row w-100">
                        @if($subscriptions) {{-- Check if there are any subscription tiers --}}
                            <div class="col-4">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Tier 1</h4>
                                    <div class="card-body">
                                        <div>Price: £{{ $subscriptions->tier1_price }}</div> {{-- Display for subscription tier 1 --}}
                                        <div class="card-text">Clients: {{ $tier1Count }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Tier 2</h4>
                                    <div class="card-body">
                                        <div>Price: £{{ $subscriptions->tier2_price }}</div> {{-- Display for subscription tier 2 --}}
                                        <div class="card-text">Clients: {{ $tier2Count }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card d-flex align-items-center">
                                <h4 class="mt-3">Tier 3</h4>
                                    <div class="card-body">
                                        <div>Price: £{{ $subscriptions->tier3_price }}</div> {{-- Display for subscription tier 3 --}}
                                        <div class="card-text">Clients: {{ $tier3Count }}</div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="card-body row">
                                    <div class="card-text w-100 d-flex justify-content-center">You have not set your tiers yet.</div>
                                </div>
                            @endif
                        </div>
                      <a href="" class="btn secondary-btn mb-2">View subscriptions</a>
                    </div>
                </div>
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Monthly earnings</h4>
                      <div class="card-body">
                        <div class="card-text">Total: £{{ $total }}</div> {{-- Total monthly earning based on number of clients and their respective tiers --}}
                      </div>
                      <a href="/trainer/clients" class="btn secondary-btn mb-2">View clients list</a>
                    </div>
                </div>
                <div class="col-6 my-3">
                    <div class="card d-flex align-items-center">
                    <h4 class="mt-3">Coming soon</h4>
                      <div class="card-body">
                        <div class="card-text">Coming soon</div>
                      </div>
                      <a href="" class="btn secondary-btn mb-2">Coming soon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection