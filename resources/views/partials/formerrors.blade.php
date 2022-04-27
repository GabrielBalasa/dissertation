@if(count($errors)) {{-- Template used to display any errors in forms --}}
    <div class="form-group verticalHeight20 my-5 pb-3">
        <div class="alert p-0  alert-danger">
            <ul class="list-unstyled m-2">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif