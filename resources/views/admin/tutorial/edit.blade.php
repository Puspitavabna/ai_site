@extends('layouts.master')
@section('content')
@section('run_custom_css_file')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endsection

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p class="alert-danger"></p>
                    <form method="post" action="{{ route('admin_tutorial.update', $tutorial->slug) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Title</label>
                            <input class="form-control" name="title" type="text"  value="{{$tutorial->title}}" />
                        </div>

                        <div class="form-group">
                            <textarea class="summernote" name="description" placeholder="Description">{{ $tutorial->description }}</textarea>
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Category_id</label>

                            <input class="form-control" name="category_id" type="number" value="{{$tutorial->category_id}}"  />
                        </div>
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">User_id</label>

                            <input class="form-control" name="user_id" type="number" value="{{$tutorial->user_id}}"  />
                        </div>
                        {{--<input type="hidden" value="5" name="category_id" class="category_id_value">--}}

                        {{--<div class="form-group category-box">--}}
                        {{--<div>Select category here:</div>--}}
                        {{--<select class="form-control category_select" data-value="1">--}}
                        {{--<option value="">Select Category</option>--}}
                        {{--@foreach ($categories as $category)--}}
                        {{--<option value="{{ $category->id}}" data-browse-node-id="{{ $category->browse_node_id }}" > {{ $category->name }} </option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}


                        {{--<div class="form-group"> <!-- Message field -->--}}
                        {{--<label class="control-label " for="message">Message</label>--}}
                        {{--<textarea class="form-control" id="summernote" name="body" required></textarea>--}}
                        {{--</div>--}}

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
@section('run_custom_js_file')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@endsection
@section('run_custom_jquery')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection