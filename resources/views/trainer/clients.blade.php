@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100">
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5 w-65">
            <h1>Clients</h1>
            <table id="clientsTable" class="table table-striped" style="width:100%"> {{-- Table list for clients --}}
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subscription tier</th>
                        <th>Subscription price</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{$subscriber->user->firstname}} {{$subscriber->user->lastname}}</td>
                            <td>{{$subscriber->user->email}}</td>
                            <td>{{$subscriber->subscription_tier}}</td>
                            <td>{{$subscriber->subscription["tier{$subscriber->subscription_tier}_price"]}}</td>
                            <td>
                                <a class="btn secondary-btn" href="/trainer/message/{{$subscriber->user->id}}" role="button">
                                    Message
                                </a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection