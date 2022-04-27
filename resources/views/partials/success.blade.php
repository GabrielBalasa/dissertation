@if (Session::has('message')) {{-- Template to display all success messages from session function on pages --}}
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif