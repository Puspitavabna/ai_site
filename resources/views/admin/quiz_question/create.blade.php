@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('includes.message')
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_quiz_question.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="quiz_topic_id" value="{{Request::get('quiz_topic_id')}}"/>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name" >Question Details</label>
                            <input class="form-control" name="question_details" type="text" placeholder="Write Question here" required />
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