@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news-grid">

                    <div class="col-md-6 news-text two">


                        <tr>
                            <th>User </th>
                            <th>Quiz_topic</th>
                            <th>Marks</th>
                        </tr>

                        <tbody>
                        <tr>
                            <td>{{$tutorial->user->name}}</td>
                            <td>{{$tutorial->quiz_topic_id}}</td>
                            <td>{{$tutorial->marks}}</td>
                        </tr>
                        </tbody>

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