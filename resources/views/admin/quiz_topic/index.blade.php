@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get topic. <a href="{{ route('admin_quiz_topic.create') }}">Create topic</a>
                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Topic name</th>
                            <th>Category_name</th>
                            <th>View Question</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz_topics as $quiz_topic)
                            <tr>
                                <td>{{$quiz_topic->topic_name}}</td>
                                <td>{{$quiz_topic->category->name}}</td>
                                <td><a href="{{ route('admin_quiz_question.index', ['quiz_topic_id' => $quiz_topic->id])}}" class="btn btn-warning">View Question</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection