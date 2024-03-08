@extends('layouts.admin.master')

@section('title', 'Featured Courses - ELearns')

@section('content')
    <div class="container py-3">
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
                <form action="{{ url('/admin/featured/courses/store') }}" method="post" class="d-flex">
                    @csrf
                    <select name="course_id" class="form-control">
                        @foreach ($courses as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mx-2">Add</button>
                </form>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-md-12 card shadow rounded">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Course Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($featured_courses as $fcos)
                        <tr>
                            <td>{{$fcos->course->title}}</td> 
                            <td>
                                <a href="{{url('/admin/featured/courses/delete/'.$fcos->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
