@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('user.sidemenu')
        <div class="d-flex flex-column w-75 m-5">
            <div class="row">
                <div class="col-8">
                    <h1>Workouts</h1> {{-- User menu workouts page --}}
                </div>
            </div>
            @include('partials.success')
            <div class="row w-80">
                @if($workouts)
                <table id="workoutsTableClient" class="table table-striped" style="width:100%"> {{-- Table list for workouts assigned to user --}}
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workouts as $workout)
                            <tr>
                                <td>{{$workout->workout->workout_title}}</td>
                                <td>{{$workout->workout_start_date}}</td>
                                <td>{{$workout->workout_end_date}}</td>
                                <td>
                                    <a class="btn secondary-btn" href="/user/exercises/{{$workout->workout_id}}" role="button">
                                        View
                                    </a>
                                </td>
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