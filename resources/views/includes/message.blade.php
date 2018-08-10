@if (Session::has('error'))
    <div class="alert alert-danger text-center">
        <div id="flash-notice">{{ Session::get('error') }}</div>
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success text-center">
        <div id="flash-notice">{{ Session::get('success') }}</div>
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">
            {{ $error }}
        </div>
    @endforeach
@endif