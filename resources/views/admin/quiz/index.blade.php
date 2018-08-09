@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--<div>--}}
                    {{--Here you will get tutorial. <a href="{{ route('admin_tutorial.create') }}">Create Tutorials</a>--}}

                {{--</div>--}}
                <div class="alert alert-success">
                    <table id="order-listing" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Title </th>
                            <th>Category_name</th>
                            <th>User</th>
                            <th>quiz_question</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($questions as $question)
                            <tr>

                                <td>{{$question->title}}</td>
                                <td>{{$question->category->name}}</td>
                                <td>{{$question->user->name}}</td>
                                <td>{{$question->quiz_question}}</td>
                                <td>

                                    <a href="{{ route('admin_tutorial.edit', $question->slug) }}" class="btn btn-outline-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin_tutorial.destroy', $question->slug) }}">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
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