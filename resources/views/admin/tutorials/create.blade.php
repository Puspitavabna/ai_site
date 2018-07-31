@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <form method="post" action="{{ route('admin_tutorials.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Title</label>
                            <input class="form-control" name="title" type="text" required />
                        </div>

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">URL Slug</label>
                            <input class="form-control" name="slug" type="text" required />
                        </div>

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Keyword</label>
                            <input class="form-control" name="keyword" type="text" required />
                        </div>

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Meta Description</label>
                            <textarea class="form-control" name="meta_description" type="text" required></textarea>
                        </div>

                        <input type="hidden" value="5" name="category_id" class="category_id_value">

                        {{--<div class="form-group category-box">--}}
                        {{--<div>Select category here:</div>--}}
                        {{--<select class="form-control category_select" data-value="1">--}}
                        {{--<option value="">Select Category</option>--}}
                        {{--@foreach ($categories as $category)--}}
                        {{--<option value="{{ $category->id}}" data-browse-node-id="{{ $category->browse_node_id }}" > {{ $category->name }} </option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <div class="alert alert-success">
                                <h5>Upload Thumbnail Image</h5>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group"> <!-- Message field -->
                            <label class="control-label " for="message">Message</label>
                            <textarea class="form-control" id="summernote" name="body" required></textarea>
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