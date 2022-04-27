@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('admin.sidemenu')
        <div class="d-flex flex-column w-75 m-5">
            <div class="row">
                <div class="col-8">
                    <h1>Waiting List</h1> {{-- Admin menu waiting list page --}}
                </div>
            </div>
            @include('partials.success')
            <div class="row w-80 mt-4"> 
                @if($waitingList) {{-- Check if there are any users pending approval for trainer --}}
                <table id="waitingListTableAdmin" class="table table-striped" style="width:100%"> {{-- Table showing all waiting list entries under "pending" status --}}
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Applied at</th>
                            <th>Approve</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($waitingList as $pending)
                            <tr>
                                <td>{{ $pending->user->firstname }} {{ $pending->user->lastname }}</td>
                                <td>{{ $pending->user->email }}</td>
                                <td>{{ $pending->user->role }}</td>
                                <td>{{ $pending->applied_at }}</td>
                                <td>
                                    <a class="btn secondary-btn" href="/admin/waitinglist/{{$pending->id}}" role="button"> {{-- Button to approve user request --}}
                                        Approve
                                    </a>
                                </td>
                                <td>
                                    <a class="btn secondary-btn" href="/admin/waitinglist/{{$pending->id}}/delete" role="button"> {{-- Button to delete user request --}}
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3>There are no users pending to be approved to be trainer.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection