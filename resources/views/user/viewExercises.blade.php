@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('user.sidemenu')
        <div class="d-flex flex-column w-75 m-5">
            <div class="row">
                <div class="col-8">
                    <h1>Exercises</h1> {{-- User menu exercises --}}
                </div>
            </div>
            @include('partials.success')
            <div class="row w-80">
                @if($exercises)
                <table id="exercisesTableClient" class="table table-striped" style="width:100%"> {{-- Table list for exercises assgined to current workout --}}
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Sets</th>
                            <th>Reps</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->exercise->exercise_title}}</td>
                                <td>{{$exercise->exercise->exercise_description}}</td>
                                <td>
                                    <a class="btn secondary-btn" href="{{$exercise->exercise->link}}" role="button">
                                        View link
                                    </a>
                                </td>
                                <td>{{$exercise->exercise->sets}}</td>
                                <td>{{$exercise->exercise->reps}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3>You don't have any exercises in this workout yet.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection