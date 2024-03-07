@extends('layouts.client.master')

@section('title', $course->title . '-ELearers')

@section('content')
@include('layouts.client.nav ')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <h1>{{ $course->title }}</h1>
                <p><span class="badge bg-secondary">{{ $category->title }}</span></p>
                <p>
                    {{ $course->description }}
                </p>
                <p>

                    {!! $course->long_description !!}
                </p>
                <div>
                    <h2 class="text-danger"><i class="fas fa-rupee-sign"></i> {{ $course->price }}</h2>

                    @php
                        $isEnrolled = App\Models\Enrollment::where('user_id', Auth::user()->id)
                            ->where('course_id', $course->id)
                            ->latest()
                            ->first();
                    @endphp
                    @if ($isEnrolled)
                        <button class="btn btn-primary disabled">Enrolled</button>
                        <a href="{{ url('/profile') }}" class="btn btn-primary " >Vist</a>
                    @else
                        <a href="{{ url('/enroll/' . $course->id) }}" class="btn btn-primary">Enroll</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
