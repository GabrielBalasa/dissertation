@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <h3>Select workout to assign the exercise {{$exercise->exercise_title}}:</h3>
            <form method="POST" action="/trainer/exercises/{{$id}}/assign"> {{-- Form to assign an exercise to a workout --}}
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-11">
                    <label for="workout_id">Workout:</label>
                    <select id="workout_id" name="workout_id">
                        @foreach ($workouts as $workout)
                            <option value='{{ $workout->workout_id }}'>{{ $workout->workout_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Assign</button>
                </div>
            </form>
            
            @include('partials.formerrors')
            
            <div>
                <h3>Assigned to:</h3> {{-- List to display workouts that already have the exercise assigned --}}
                <ul>
                    @foreach($assignedTo as $assigned)
                        <li>{{$assigned->workout->workout_title}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection 