@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex flex-row h-100" >
        @include('trainer.sidemenu')
        <div class="d-flex flex-column m-5 h-85 w-100">
            @include('partials.success')
            <div class="bg-light h-80 w-80 px-2">
                <div class="row h-93">
                    
                </div>
                <div>
                    <form class="row" method="POST" action="/trainer/message/{{$id}}"> {{-- Form to send new message to client *WIP* --}}
                        {{ csrf_field() }}
                            <div class="col-11">
                                <label for="message"></label>
                                <input type="text" class="form-control" id="message" name="message" placeholder="Enter message here">
                            </div>
                    
                            <div class="col-1">
                                <button style="cursor:pointer" type="submit" class="btn secondary-btn">Send</button>
                            </div>
                        @include('partials.formerrors')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 