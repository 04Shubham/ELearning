@extends('layouts.admin.master')

@section('title', 'Edit Category - ELearner')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Categories</h1>
        <a href="{{url('/admin/categories/')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> View All Categories</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/admin/category/update/'.$category->id) }}" method="post" class="card shadow rounded  p-3"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label form="">Categories Title</label>
                        <input class="form-control" type="text" name="title" value="{{$category->title}}">
                    </div>
                    <div class="md-3">
                        <label form="">Categories Desceription</label>
                        <input class="form-control" type="text" name="description" value="{{$category->description}}">
                    </div>
                    <div class="md-3">
                        <label form="">Slug</label>
                        <input class="form-control" type="text" name="slug" value="{{$category->slug}}">
                    </div>
                    <div class="row md-3">
                        <div class="col-md-6">
                            <label form="">Categories Thumbnail</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('uploads/category/'.$category->image)}}" alt="" height="200">
                        </div>
                    </div>
                    <div class="md-3">
                        <label form="">Meta Categories Title</label>
                        <input class="form-control" type="text" name="meta_title" value="{{$category->meta_title}}">
                    </div>
                    <div class="md-3">
                        <label form="">Meta Categories Desceription</label>
                        <input class="form-control" type="text" name="meta_description" value="{{$category->meta_description}}">
                    </div>
                    <div class="md-3 p-3">
                        <button class="btn btn-primary" type="Submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
