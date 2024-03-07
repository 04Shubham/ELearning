@extends('layouts.client.master')
@section('title', 'Profile- - ELearers')


@section('content')
@include('layouts.client.nav ')
    
    <div class="container-fluid py-2">
        <div class="container py-2">
            <div class="text-center mb-5">
                <div class="bg-secondary p-4">
                    <h2 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">{{ Auth::user()->name }} </h2>
                    <h4>{{ Auth::user()->email }}</h4>
                    {{-- <h4>{{ Auth::user()->email }}</h4> --}}
                </div>
            </div>
            <div class="row">
                 <div class="col-md-12">
                        <div class="rounded overflow-hidden mb-2">
                           <h2>Enrolled Courses</h2>
                            <div class="bg-secondary p-4">
                                <div class="border-top mt-4 pt-4">
                                    @foreach ($enrolled_courses as $course)
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="m-0">{{$course->title}}</h5>
                                        <a class="btn btn-primary" href="{{url('/courses/'.$course->slug)}}">Continue learning</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         

 @endsection