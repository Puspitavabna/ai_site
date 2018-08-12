@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('includes.message')
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_quiz_answer.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
4
                        {{--<div class="form-group"> <!-- Name field -->--}}
                            {{--<label class="control-label " for="name" >quiz_option</label>--}}
                            {{--<input class="form-control" name="title" type="text" placeholder="title" required />--}}
                        {{--</div>--}}

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="correct_answer">question</label>
                            <input class="form-control" name="correct_answer" type="text" placeholder="correct_answer" required/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                            <button type="button" class="btn btn-danger pull-right" id="clear">Clear</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection