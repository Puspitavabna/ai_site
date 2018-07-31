@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                Tutorial Title
            </div>
            <div>
                {{ $tutorial->title }}
            </div>
        </div>
    </div>
</div>
@endsection