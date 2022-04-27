@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5">
            <form method="POST" action="/trainer/workouts/{{$id}}"> {{-- Form to edit workout --}}
            <h2>Edit workout</h2>
                @include('partials.formerrors')
                @include('partials.success')
                {{ csrf_field() }}
                <div class="col-11">
                    <label for="workout_title">Title:</label>
                    <input type="text" class="form-control" id="title" name="workout_title" value="{{$workout['workout_title']}}">
                </div>
                
                <div class="col-12 pt-3">
                    <button style="cursor:pointer" type="submit" class="btn primary-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection 