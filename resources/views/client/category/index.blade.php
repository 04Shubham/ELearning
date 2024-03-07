@extends('layouts.client.master')
@section('title', $category->title.'-ELearers')


@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
           
            <div class="col-md-12">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2">
                            <img class="img-fluid" src="{{ asset('uploads/course/' . $course->image) }}"
                                alt="">
                            <div class="bg-secondary p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>45 Students</small>
                                    <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>03h 30m</small>
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                        <small>(250)</small>
                                    </h6>
                                </div>
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text"></p>
                                                               
                                <div class="border-top mt-4 pt-4">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="m-0">Rs.{{$course->price}}/- </h5>
                                        <a class="btn btn-primary" href="{{ url('category/'.$category->slug.'/'.$course->slug) }}">Browse</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{$courses->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection