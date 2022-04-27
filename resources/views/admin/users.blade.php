@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('admin.sidemenu')
        <div class="d-flex flex-column w-75 m-5">
            <div class="row">
                <div class="col-8">
                    <h1>Users</h1> {{-- Admin menu users page --}}
                </div>
            </div>
            @include('partials.success')
            <div class="row w-80">
                @if($users) {{-- Check if any users exist, except user with "admin" role --}}
                <table id="usersTableAdmin" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postcode</th>
                            <th>Date of Birth</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->city }}</td>
                                <td>{{ $user->postcode }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a class="btn secondary-btn" href="/admin/users/{{$user->id}}" role="button"> {{-- Redirect to edit users details page --}}
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a class="btn secondary-btn" href="/admin/users/{{$user->id}}/delete" role="button"> {{-- Button to delete user record --}}
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <h3>There are no users.</h3>
                @endif
            </div>
        </div>
    </div>
@endsection