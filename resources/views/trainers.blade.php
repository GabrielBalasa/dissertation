@extends('layouts.app')

@section('content')
    <div class="container-fluid"> {{-- Trainers listing page --}}
        <div class="row m-5 px-5">
            <div class="col-8 mb-3">
                <h1>Trainers</h1>
            </div>
            <div class="col-4 mt-3">
                {{-- Form to select city from list and display trainers based on city --}}
                <form class="w-100" method="POST" action="/trainers"> 
                    <label for="city">City</label>
                    <select id="city" class="w-35" name="city" ONCHANGE="location = this.options[this.selectedIndex].value;">
                        <option value="">Select city...</option>
                        @foreach ($cities as $city)
                            <option value='/trainers/{{ $city->city }}'>{{ $city->city }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="row">
                @foreach($trainersList as $trainer) {{-- Trainers list display --}}
                    <div class="col-3 mb-5">
                        <a href="/trainers/profile/{{$trainer['id']}}" class="text-decoration-none text-reset">
                            <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="{{asset('images/one.jpeg')}}" alt="Card image cap">
                              <div class="card-body">
                                <h5 class="card-title">{{$trainer['firstname']}} {{$trainer['lastname']}}</h5>
                                <p class="card-text">
                                    Qualifications
                                    <ul>
                                        @foreach ($trainer->qualifications as $qualification)
                                            <li>{{$qualification->qualification_title}}</li>
                                        @endforeach
                                    </ul>
                                </p>
                                <a href="/trainers/profile/{{$trainer['id']}}" class="btn secondary-btn">View profile</a>
                              </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection