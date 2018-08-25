@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get tutorial. <a href="{{ route('admin_quiz_topic.create') }}">Create topic</a>

                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Category_name</th>
                            <th>Topic name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz_topics as $quiz_topic)
                            <tr>
                                <td>{{$quiz_topic->category->name}}</td>
                                <td>{{$quiz_topic->topic_name}}</td>
                                <td>
                                    {{--<form method="POST" action="{{ route('admin_topic.destroy', $quiz_topic->slug) }}">--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--<input name="_method" type="hidden" value="DELETE">--}}
                                        {{--<input type="submit" value="Delete" class="btn btn-danger">--}}
                                    {{--</form>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection