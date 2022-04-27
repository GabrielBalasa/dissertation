@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5 w-25">
            <form method="POST" action="/trainer/exercises/{{$id}}"> {{-- Form to edit exercise --}}
            <h2>Edit exercise</h2>
                @include('partials.formerrors')
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-11">
                    <label for="exercise_title">Title:</label>
                    <input type="text" class="form-control" id="title" name="exercise_title" value="{{$exercise->exercise_title}}">
                </div>
                
                <div class="col-11">
                    <label for="exercise_description">Description:</label>
                    <input type="text" class="form-control" id="description" name="exercise_description" value="{{$exercise->exercise_description}}">
                </div>
        
                <div class="col-11">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{$exercise->link}}">
                </div>
                
                <div class="col-11">
                    <label for="sets">Sets:</label>
                    <input type="text" class="form-control" id="sets" name="sets" value="{{$exercise->sets}}">
                </div>
                
                <div class="col-11">
                    <label for="reps">Reps:</label>
                    <input type="text" class="form-control" id="reps" name="reps" value="{{$exercise->reps}}">
                </div>
        
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection 