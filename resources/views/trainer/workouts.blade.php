@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column w-75 m-5">
            <div class="row">
                <div class="col-8">
                    <h1>Workouts</h1> {{-- Trainer menu workouts page --}}
                </div>
                <div class="col-4 align-self-center">
                    <a class="btn primary-btn text-light" href="/trainer/workouts/newworkout" role="button">
                        New workout
                    </a>
                </div>
            </div>
            @include('partials.success')
            <div class="row w-80">
                @if($workouts)
                <table id="workoutTable" class="table table-striped" style="width:100%"> {{-- Table to list all workouts from trainer --}}
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Assign</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workouts as $workout)
                        <tr>
                            <td>{{$workout->workout_title}}</td>
                            <td>Coming soon</td>
                            <td><a class="btn secondary-btn" href="/trainer/workouts/{{$workout->workout_id}}/assign" role="button">
                                Assign
                            </a></td>
                            <td> <a class="btn secondary-btn" href="/trainer/workouts/{{$workout->workout_id}}" role="button">
                                Edit
                            </a></td>
                            <td><a class="btn secondary-btn" href="/trainer/workouts/{{$workout->workout_id}}/delete" role="button">
                                Delete
                            </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <h3>You don't have any workouts yet.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection