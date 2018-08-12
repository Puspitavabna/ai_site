@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    Here you will get tutorial. <a href="{{ route('admin_quiz_answer.create') }}">answers</a>

                </div>
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            {{--<th>Category_name</th>--}}
                            {{--<th>User</th>--}}
                            <th>Correct answer</th>
                            {{--<th>answer Description</th>--}}
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($questions as $question)
                            <tr>

                                {{--<td>{{$question->category->name}}</td>--}}
                                {{--<td>{{$question->user->name}}</td>--}}
                                <td>{{$question->correct_answer}}</td>
                                {{--<td>{{$question->answer_description}}</td>--}}
                                <td>

                                    {{--<a href="{{ route('admin_quiz_question.edit', $question->slug) }}" class="btn btn-outline-warning">Edit</a>--}}
                                    {{--<form method="POST" action="{{ route('admin_quiz_question.destroy', $question->slug) }}">--}}
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