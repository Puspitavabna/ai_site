@extends('layouts.master')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--<div>--}}
                    {{--Here you will get tutorial. <a href="{{ route('admin_quiz_question.create') }}">Create Tutorials</a>--}}

                {{--</div>--}}


                    <tr class="col-md-6 news-text two">
                <form method="POST" action="{{ route('quiz_result.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($quiz_questions as $question)
                        <tr>
                            <td>{{$question->question_details}}</td>
                            <td>
                                <div>
                                    {{$question->question}}
                                </div>
                                @foreach($question->quiz_answers as $quiz_answer)
                                    <div>
                                        <label>
                                            <input type="radio" name="selected_answers[question_id_{{ $question->id }}]" value="{{ $quiz_answer->id }}"> {{ $quiz_answer->answer_details }}<br>
                                        </label>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                        <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>
                    </div>
                </form>




                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
























{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="alert alert-success">--}}
                    {{--<table id="order-listing" class="table table-striped">--}}
                        {{--<tbody>--}}
                        {{--@foreach($quiz_questions as $question)--}}
                        {{--<tr>--}}
                                {{--<td>{{$question->question_details}}</td>--}}
                                {{--<td>--}}
                            {{--<tr>--}}
                                    {{--@foreach($question->quiz_answers as $quiz_answer)--}}
                                    {{--<td>{{ $quiz_answer->answer_details }}</td>--}}
                                    {{--@endforeach--}}
                        {{--</tr>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}









{{--@extends('layouts.master')--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="alert alert-success">--}}
                    {{--<table id="order-listing" class="table table-striped">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Category_name</th>--}}
                            {{--<th>question</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($quiz_questions as $question)--}}
                            {{--<tr>--}}
                                {{--<td>{{$question->category->name}}</td>--}}
                                {{--<td>{{$question->question_details}}</td>--}}
                                {{--<td>--}}
                                    {{--<div>--}}
                                        {{--{{$question->question}}--}}
                                    {{--</div>--}}

                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
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
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
{{--@endsection--}}