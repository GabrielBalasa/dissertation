@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column w-75 m-5">
            <div class="row">
                <div class="col-8">
                    <h1>Exercises</h1>
                </div>
                <div class="col-4 align-self-center">
                    <a class="btn primary-btn text-light" href="/trainer/exercises/newexercise" role="button"> {{-- Redirect to new exercise page --}}
                        New exercise
                    </a>
                </div>
            </div>
            @include('partials.success')
            <div class="row w-80">
                @if($exercises)
                <table id="exercisesTableTrainer" class="table table-striped" style="width:100%"> {{-- Table to list all exercises --}}
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Sets</th>
                            <th>Reps</th>
                            <th>Assign</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($exercises as $exercise)
                            <tr>
                                <td>{{$exercise->exercise_title}}</td>
                                <td>{{$exercise->exercise_description}}</td>
                                <td>{{$exercise->link}}</td>
                                <td>{{$exercise->sets}}</td>
                                <td>{{$exercise->reps}}</td>
                                <td>
                                    <a class="btn secondary-btn" href="/trainer/exercises/{{$exercise->exercise_id}}/assign" role="button"> {{-- Redirect to assign exercise to workout page --}}
                                        Assign
                                    </a>
                                </td>
                                <td>
                                    <a class="btn secondary-btn" href="/trainer/exercises/{{$exercise->exercise_id}}" role="button"> {{-- Redirect to edit exercise page --}}
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn secondary-btn" href="/trainer/exercises/{{$exercise->exercise_id}}/delete" role="button"> {{-- Button to delete exercise --}}
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3>You don't have any exercises yet.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection