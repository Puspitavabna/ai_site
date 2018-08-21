@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Category_name</th>
                            <th>question</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz_questions as $question)
                            <tr>
                                <td>{{$question->category->name}}</td>
                                <td>{{$question->question_details}}</td>
                                <td>
                                    <div>
                                        {{$question->question}}
                                    </div>

                                </td>
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
@endsection