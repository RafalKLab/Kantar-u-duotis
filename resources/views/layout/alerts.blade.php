@if (Session::has('info'))
    <div class="alert alert-primary mt-2" role="alert">
        {{Session::get('info')}}
    </div>
@endif
