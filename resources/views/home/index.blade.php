@extends('layouts.master')
@section('content')
@include('includes.header')
    <div class="container">
        <div class="text-center"> Tutorials </div>
        <div class="row">
            @foreach($tutorials as $tutorial)
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image-wrap">
                            <a href="#" ></a>
                        </div>
                        <div class="text-wrap">
                            <p class="category">{{$tutorial->category->name}}</p>
                            <p class="meta">{{ $tutorial->created_at->format('m-d-Y') }}</p>
                            <h4><a href="{{ route('tutorial.show', $tutorial->slug) }}">{{$tutorial->title}}</a></h4>
                            <p>{{ str_limit(strip_tags($tutorial->description), $limit = 120, $end = '...') }}</p>
                        </div>
                        <div class="btn-wrap">
                            <a class="btn btn-info" href="{{ route('tutorial.show', $tutorial->slug) }}">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{--<div class="pagination">--}}
        {{--<a href = "#">&laquo;</a>--}}
        {{--<a href = "#">1</a>--}}
        {{--<a href = "#" class="active">2</a>--}}
        {{--<a href = "#">3</a>--}}
        {{--<a href = "#">4</a>--}}
        {{--<a href = "#">5</a>--}}
        {{--<a href = "#">6</a>--}}
        {{--<a href = "#">&raquo;</a>--}}
        {{--</div>--}}
    </div>
@endsection
