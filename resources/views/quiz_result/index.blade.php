@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news-grid">

                    <div class="col-md-6 news-text two">
                        <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>User </th>
                            <th>Quiz_topic</th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz_results as $quiz_result)
                        <tr>
                            <td>{{$quiz_result->user->name}}</td>
                            <td>{{$quiz_result->quiz_topic->topic_name}}</td>
                            <td>{{$quiz_result->marks}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>

                    {{--<div>--}}
                    {{--Tutorial Title--}}
                    {{--Category-id--}}
                    {{--Description--}}
                    {{--</div>--}}
                    {{--<div>--}}
                    {{--{{ $tutorial->title }}--}}
                    {{--{{ $tutorial->category_id }}--}}
                    {{--{{ $tutorial->description }}--}}
                    {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection