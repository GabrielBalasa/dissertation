@extends('layouts.app')

@section('content')
<div class="container"> {{-- About Us Page --}}
    <div class="card mb-3 border-0 mb-5 aboutus">
        <div class="row g-0">
          
          <div class="col-md-7">
            <div class="card-body">
              <h1 class="card-title display-2 my-5">About us</h5>
              <p class="card-text fs-5 text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus rhoncus mi. Aliquam sagittis, ante faucibus tincidunt sodales, velit nibh eleifend nibh, vitae molestie urna ipsum vitae lectus. Ut porttitor pretium lacus non feugiat. Phasellus massa nisl, laoreet vel</p>
              <p class="card-text fs-5 text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dapibus rhoncus mi. Aliquam sagittis, ante faucibus tincidunt sodales, velit nibh eleifend nibh, vitae molestie urna ipsum vitae lectus. Ut porttitor pretium lacus non feugiat. Phasellus massa nisl, laoreet vel</p>
            </div>
          </div>
          <div class="col-md-5 ps-3">
            <img class="img-fluid card-img" src="{{asset('images/aboutus.png')}}"  alt="...">
          </div>
        </div>
      </div>
    </div>
    
    <div class="more container-fluid bg-dark text-light">
        <div class="container py-5">
            <p  class="card-text fs-6 text">
             Integer ut tempor ipsum. Nam feugiat viverra pharetra. Nulla in tellus at lorem tristique placerat. Proin lacus lorem, ultricies id sapien sit amet, aliquet pretium sapien. Proin eleifend turpis eget augue finibus, ac imperdiet magna malesuada. In sed ipsum non neque molestie lobortis. Nam suscipit efficitur nulla vel rhoncus. Curabitur et erat id metus eleifend ultricies. Vivamus vestibulum ut nibh in finibus. Vestibulum laoreet nisl in pulvinar mollis. Mauris eu nulla hendrerit, malesuada orci sed, rhoncus tortor. Integer ullamcorper fermentum magna a consectetur.
            </p>
            <p  class="card-text fs-6 text">
             Sed malesuada blandit orci eu interdum. Maecenas elementum, sapien eget consequat dignissim, arcu tortor lobortis arcu, dignissim maximus diam mauris ac arcu. In at consectetur lectus. Cras non purus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque a nulla eleifend, rutrum magna eu, pellentesque mauris. Suspendisse erat justo, sodales ut sagittis vitae, sodales ut elit. Sed ac pretium nisl. Nam gravida erat ut nunc dignissim tincidunt. Curabitur ultricies lacus et porta finibus. Sed tempor elit ut scelerisque dignissim. Morbi ac nunc at augue efficitur bibendum. Integer nec nulla a risus vestibulum fermentum nec vel lectus. In urna libero, egestas sit amet tristique sed, consectetur eget nulla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            </p>
            <p  class="card-text fs-6 text">
                Nullam non sollicitudin diam. Donec mollis nunc suscipit libero iaculis, non luctus enim efficitur. Maecenas congue sed est aliquet fringilla. Donec varius maximus leo at mattis. Curabitur tempor mauris id ornare semper. Ut dapibus lacus augue, sed posuere ex lobortis vel. Nullam leo nisl, sollicitudin vel felis id, aliquet auctor ipsum. Curabitur non odio hendrerit, facilisis libero in, mattis lectus. Suspendisse eu nulla sit amet urna commodo dictum eget vel tellus.
            </p>
         </div>
    </div>
@endsection