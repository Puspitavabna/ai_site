@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <p class="alert-danger"><?php
                        $exception=Session::get('exception');

                        if($exception){
                            echo $exception;
                            Session::put('exception',null);
                        }
                        ?></p>
                    <form method="post" action="{{ route('admin_tutorial.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name" >Title</label>
                            <input class="form-control" name="title" type="text" placeholder="Title" required />
                        </div>

                        <div class="form-group"> <!-- Name field -->
                            <label class="control-label " for="name">Description</label>

                            <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                        </div>
                        <div class="form-group category-box">
                            <div>Select category here:</div>
                            <select name="category_id" class="form-control category_select" data-value="1">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id}}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group category-box">
                            <div>Select User here:</div>
                            <select name="user_id" class="form-control category_select" data-value="1">
                                <option value="">Select Category</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id}}"> {{ $user->name }} </option>
                                @endforeach
                            </select>
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