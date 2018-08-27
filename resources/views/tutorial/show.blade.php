@extends('layouts.master')
@section('content')
    @include('includes.header')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tutorials</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($category_tutorials as $category_tutorial)
                            <tr>
                                <td><a href="#">{{$category_tutorial->title}}</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-9">
                <h3>{{ $tutorial->title }}</h3>
                <p class="category">{{$tutorial->category->name}}</p>
                <p class="meta">{{ $tutorial->created_at->format('m-d-Y') }}</p>
                <p>{{ $tutorial->description }}</p>
            </div>
        </div>
    </div>
@endsection
