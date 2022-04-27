@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <h3>Select client to assign the workout {{$workout->workout_title}}:</h3>
            <form method="POST" action="/trainer/workouts/{{$id}}/assign"> {{-- Form to assign workout to client --}}
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-11">
                    <label for="user_id">Client:</label>
                    <select id="user_id" name="user_id">
                        @foreach ($users as $user)
                            <option value='{{ $user->user->id }}'>{{ $user->user->email }}</option>
                        @endforeach
                    </select>
                    {{-- Inputs for start and end date of the workout plan --}}
                    <div class="col-11 pt-2">
                        <label for="workout_start_date">Start date of workout:</label>
                        <input type="date" class="form-control" id="workout_start_date" name="workout_start_date">
                    </div>
                    
                    <div class="col-11 pt-2">
                        <label for="workout_end_date">End date of workout:</label>
                        <input type="date" class="form-control" id="workout_end_date" name="workout_end_date">
                    </div>
                </div>
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Assign</button>
                </div>
            </form>
            
            @include('partials.formerrors')
            
            <div>
                <h3>Assigned to:</h3> {{-- List of clients that have the workout already assigned --}}
                <ul>
                    @foreach($assignedTo as $assigned)
                        <li>{{$assigned->user->email}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection 