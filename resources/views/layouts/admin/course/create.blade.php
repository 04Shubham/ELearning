@extends('layouts.admin.master')

@section('title', 'Create Course - ELearner')

@section('custom_style')
<link rel="stylesheet" href="{{asset('admin/summernote.min.css')}}">
@endsection

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Course</h1>
        <a href="{{ url('/admin/courses/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View All Courses</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/admin/course/create') }}" method="post" class="card shadow rounded  p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label form="">Course Title</label>
                        <input class="form-control" type="text" name="title">
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label form="">Short Desceription</label>
                        <input class="form-control" type="text" name="description">
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="md-3">
                        <label form="">Long Desceription</label>
                        <textarea name="long_description" id="course_summernote" cols="30" rows="10"></textarea>
                        @error('long_description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label form="">Vedio URL</label>
                        <input class="form-control" type="text" name="vedio">
                    </div>
                    <div class="md-3">
                        <label form="">Slug</label>
                        <input class="form-control" type="text" name="slug">
                        @error('slug')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label form="">Course Thumbnail</label>
                        <input class="form-control" type="file" name="image">
                    </div>
                    <div class="md-3">
                        <label form="">Price</label>
                        <input class="form-control" type="text" name="price">
                    </div>
                    <div class="md-3">
                        <label form="">Meta Course Title</label>
                        <input class="form-control" type="text" name="meta_title">
                    </div>
                    <div class="md-3">
                        <label form="">Meta Course Desceription</label>
                        <input class="form-control" type="text" name="meta_description">
                    </div>
                    <div class="md-3 p-3">
                        <button class="btn btn-primary" type="Submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
<script src="{{asset('admin/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('admin/summernote.min.js')}}"></script>
<script>
        $(document).ready(function() {
            $('#course_summernote').summernote({height: 200});
        });
    </script>
@endsection
