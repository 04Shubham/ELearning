@extends('layouts.client.master')

@section('title', $course->title . '-ELearers')

@section('content')
@include('layouts.client.nav ')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <h1 class="text-center">{{ $course->title }}</h1>
                
            </div>
        </div>
    </div>
@endsection
