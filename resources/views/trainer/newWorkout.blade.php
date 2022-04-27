@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/trainer/workouts/newworkout"> {{-- Form to create a new workout for trainers --}}
            <h2 class="mb-4">Create new workout</h2>
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-12 mb-2">
                    <label for="workout_title">Title</label>
                    <input type="text" class="form-control" id="title" name="workout_title" placeholder="Exercise title">
                </div>
                
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
                @include('partials.formerrors')
            </form>
        </div>
    </div>
@endsection 