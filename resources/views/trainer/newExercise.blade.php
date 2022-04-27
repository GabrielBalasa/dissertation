@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/trainer/exercises/newexercise"> {{-- Form to create new exercise for trainers --}}
            <h2 class="mb-4">Create new exercise</h2>
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-12 mb-1">
                    <label for="exercise_title">Title:</label>
                    <input type="text" class="form-control" id="title" name="exercise_title" placeholder="Exercise title">
                </div>
                
                <div class="col-12 mb-1">
                    <label for="exercise_description">Description:</label>
                    <input type="text" class="form-control" id="description" name="exercise_description" placeholder="Exercise description">
                </div>
        
                <div class="col-12 mb-1">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link to exercise demonstration">
                </div>
                
                <div class="col-12 mb-1">
                    <label for="sets">Sets:</label>
                    <input type="text" class="form-control" id="sets" name="sets" placeholder="Number of sets">
                </div>
                
                <div class="col-12 mb-1">
                    <label for="reps">Reps:</label>
                    <input type="text" class="form-control" id="reps" name="reps" placeholder="Number of reps">
                </div>
        
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
                @include('partials.formerrors')
            </form>
        </div>
    </div>
@endsection 