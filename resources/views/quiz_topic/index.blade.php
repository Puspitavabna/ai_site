@extends('layouts.master')
@section('content')
    @include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Machine Learning </h3>
            @foreach($quiz_topics as $quiz_topic)
                <p><a href="{{ route('quiz_question.index', ['quiz_topic_id' => $quiz_topic->id])}}">{{$quiz_topic->topic_name}}</a></p
            @endforeach
        </div>
    </div>
</div>

@endsection