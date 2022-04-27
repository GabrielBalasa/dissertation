@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5 w-100">
        <div class="row">
            <div class="col-8">
                <h1>Subscription tiers</h1> {{-- Trainer menu subscriptions page --}}
            </div>
            <div class="col-4 d-flex align-self-center">
                @if($subscriptions)
                    <a class="btn primary-btn text-light w-25" href="/trainer/settiers" role="button"> {{-- Redirect to allow trainer to edit tiers --}}
                        Edit Tiers
                    </a>
                @endif
            </div>
        </div>
        @if($subscriptions) {{-- Display for subscription tiers --}}
            <div class="row w-85 mt-5">
                <div class="col-4 mb-5">
                    <div class="card d-flex align-items-center" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Tier 1</h5>
                        <div class="card-text">
                            <div>Price: {{$subscriptions['tier1_price'] }}</div>
                            <div>Description:</div>
                        </div>
                      </div>
                      <div class="m-2 d-flex align-self-start">{{ $subscriptions['tier1_description']}}</div>
                    </div>
                </div>
                <div class="col-4 mb-5">
                    <div class="card d-flex align-items-center" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Tier 2</h5>
                        <div class="card-text">
                            <div>Price: {{$subscriptions['tier2_price'] }}</div>
                            <div>Description:</div>
                        </div>
                      </div>
                      <div class="m-2 d-flex align-self-start">{{ $subscriptions['tier2_description']}}</div>
                    </div>
                </div>
                <div class="col-4 mb-5">
                    <div class="card d-flex align-items-center" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">Tier 3</h5>
                        <div class="card-text">
                            <div>Price: {{$subscriptions['tier3_price'] }}</div>
                            <div>Description:</div>
                        </div>
                      </div>
                      <div class="m-2 d-flex align-self-start">{{ $subscriptions['tier3_description']}}</div>
                    </div>
                </div>
            </div>
            @else
                You have not set your tiers yet.
                <a class="btn primary-btn text-light w-10 mt-3" href="/trainer/settiers" role="button">
                    Set Tiers {{-- Redirect to allow trainer to set tiers --}}
                </a>
            @endif
        </div>
    </div>
@endsection