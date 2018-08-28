@extends('layouts.master')
@section('content')
    @include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php $category = [] ?>
            @foreach($quiz_topics as $quiz_topic)
                @if(!in_array($quiz_topic->category->name, $category))
                    <br/>
                    <h3>{{ $quiz_topic->category->name }}</h3>
                @endif
                <div><a href="{{ route('quiz_question.index', ['quiz_topic_id' => $quiz_topic->id])}}">{{$quiz_topic->topic_name}}</a></div>
                <?php array_push($category, $quiz_topic->category->name); ?>
            @endforeach
        </div>
    </div>
</div>

@endsection