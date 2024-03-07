@extends('layouts.admin.master')

@section('title', 'Trash - ELearner')

@section('custom_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

@endsection

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trash Course</h1>  
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
                <div class="p-3 card shadow rounded">
                    <table id="categoryTable" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashed_courses as $course)
                                <tr>
                                    <td>{{ $course->title }}</td>
                                    <td><img src="{{ asset('uploads/course/' . $course->image) }}" alt=""
                                            height="32"></td>
                                    <td>{{ $course->deleted_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ url('/admin/trash/course/delete/' . $course->id) }}"
                                            onclick="return confirm('Are you sure want to delete this course permanently ?')"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure want to restore this course ?')"
                                            href="{{ url('/admin/trash/course/restore/' . $course->id) }}"
                                            class="btn btn-success"><i class="fas fa-trash-restore"></i></a>
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

@section('custom_script')

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#categoryTable');
    </script>
@endsection
