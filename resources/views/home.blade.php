@extends('layouts.app')

@section('content')
    <div class="banner position-relative overflow-hidden text-center bg-light d-flex align-items-end"> {{-- Landing page --}}
        <div class="col-md-5 p-lg-5 mx-auto">
          <h1 class="display-1 text-light">Become a Trainer</h1>
          <p class="lead text-light">Join us today and become a trainer. Apply now and be a part of discovering a new way to engage with your clients.</p>
          <a class="btn primary-btn text-light" href="/joinus">JOIN US NOW</a>
        </div>
      </div>
    
      <div class="container-fluid">
        <div class="row my-md-3 g-4">
    
          <div class="col-6 text-center imageOne">
            <div class="my-3 py-3 text-light">
              
            </div>
          </div>
    
          <div class="col-6 text-center text-white textOne">
            <div class="my-3 py-3 text-dark">
              <h2 class="display-5">Check our Trainers</h2>
              <p class="lead">Choose your city and check our list of trainers and join us today.</p>
            </div>
    
          </div>
        </div>
    
    
        <div class="row my-md-3 g-4">
    
          <div class="col-6 text-center textTwo">
            <div class="my-3 py-3 text-light">
              <h2 class="display-5">Subscribe Now</h2>
              <p class="lead">Subscribe to one of the trainers and start working out today.</p>
            </div>
    
          </div>
    
          <div class="col-6 text-center text-white imageTwo">
            <div class="my-3 py-3 text-light">
            </div>
    
          </div>
        </div>
        
        {{-- Extra content containers --}}
        {{-- <div class="row my-md-3 px-0">
          <div class="bg-light col-6 text-center overflow-hidden px-0">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
          <div class="bg-dark col-6 text-center text-white overflow-hidden px-0">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
        </div> --}}
    
        {{-- <div class="row my-md-3 px-0">
          <div class="bg-light col-6 text-center overflow-hidden px-0">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
          <div class="bg-dark col-6 text-center text-white overflow-hidden px-0">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
        </div> --}}
    </div>
@endsection