@extends('layouts.app')

@section('content')
<div class="contrainer mx-5"> {{-- Trainer profile page --}}
    <div class="container-fluid m-5 p-5 w-75">
        <h2>Details</h2>
        <div class="card col-12 my-3 w-85">
          <div class="row">
              <div class="col-6">
                <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{asset('images/one.jpeg')}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body row">
                            <h4 class="mt-1">{{$trainer->firstname}} {{$trainer->lastname}}</h4> {{-- Trainer details --}}
                            <div>{{$trainer->city}}</div>
                            <div>{{$trainer->email}}</div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card-body row">
                    <h4 class="mt-1">Qualifications</h4> {{-- Trainer qualifications details --}}
                    @foreach ($trainerQualifications as $qualification)
                      <li>{{$qualification->qualification_title}}</li>
                    @endforeach
                </div>
              </div>
          </div>
      </div>
      <h2>Subscriptions</h2> {{-- Trainers subscriptions tier details --}}
      @if($alreadySubscribed) {{-- Check if user is already subscribed to a trainer --}}
        <p>You are already subscribed to a trainer.</p>
      @else
        @if($subscriptions) {{-- Check if trainer has subscriptions tiers set --}}
          <div class="row">
              <div class="col-4 mb-5">
                  <div class="card d-flex align-items-center" style="width: 18rem;">
                  <h4 class="mt-3">Tier 1</h4>
                    <div class="card-body">
                    @if($subscriptions->tier1_description)
                      <div>{{$subscriptions->tier1_description}}</div> {{-- Display tier 1 subscription details --}}
                    @else
                      <div>Tier was not yet set by this trainer.</div>
                    @endif
                    </div>
                    @if($user && $subscriptions->tier1_price)
                      <a href="/trainers/{{$trainer['id']}}/subscribe/1" class="btn primary-btn mb-3">Subscribe - £{{$subscriptions->tier1_price}}</a>
                    @elseif($subscriptions->tier1_price && !$user)
                      <a href="/login" class="btn primary-btn mb-3">Subscribe - £{{$subscriptions->tier1_price}}</a>
                    @elseif(!$subscriptions->tier1_price)
                      <div>Tier was not yet set by this trainer.</div>
                    @endif
                  </div>
              </div>
              
              <div class="col-4 mb-5">
                  <div class="card d-flex align-items-center" style="width: 18rem;">
                  <h4 class="mt-3">Tier 2</h4>
                    <div class="card-body">
                    @if($subscriptions->tier1_description)
                      <div>{{$subscriptions->tier2_description}}</div> {{-- Display tier 2 subscription details --}}
                    @else
                      <div>Tier was not yet set by this trainer.</div>
                    @endif
                    </div>
                    @if($user && $subscriptions->tier2_price)
                      <a href="/trainers/{{$trainer['id']}}/subscribe/2" class="btn primary-btn mb-3">Subscribe - £{{$subscriptions->tier2_price}}</a>
                    @elseif($subscriptions->tier2_price && !$user)
                      <a href="/login" class="btn primary-btn mb-3">Subscribe - £{{$subscriptions->tier2_price}}</a>
                    @elseif(!$subscriptions->tier2_price)
                      <div>Tier was not yet set by this trainer.</div>
                    @endif
                  </div>
              </div>
              
              <div class="col-4 mb-5">
                  <div class="card d-flex align-items-center" style="width: 18rem;">
                  <h4 class="mt-3">Tier 3</h4>
                    <div class="card-body">
                      @if($subscriptions->tier1_description)
                        <div>{{$subscriptions->tier3_description}}</div> {{-- Display tier 3 subscription details --}}
                      @else
                        <div>Tier was not yet set by this trainer.</div>
                      @endif
                    </div>
                    @if($user && $subscriptions->tier3_price)
                      <a href="/trainers/{{$trainer['id']}}/subscribe/3" class="btn primary-btn mb-3">Subscribe - £{{$subscriptions->tier3_price}}</a>
                    @elseif($subscriptions->tier3_price && !$user)
                      <a href="/login" class="btn primary-btn mb-3">Subscribe - £{{$subscriptions->tier3_price}}</a>
                    @elseif(!$subscriptions->tier3_price)
                      <div>Tier was not yet set by this trainer.</div>
                    @endif
                  </div>
              </div>
          </div>
        @else
          <p>This trainer has not set their subscription tiers yet.</p>
        @endif
      @endif
  </div>
</div>
@endsection