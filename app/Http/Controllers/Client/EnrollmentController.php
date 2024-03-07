<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{

    public function store($course_id){
        $isEnrolled = Enrollment::where('user_id', Auth::user()->id)->where('course_id', $course_id)->latest()->first();
        if($isEnrolled){
            return redirect('/profile');
        }
        else{
            $enroll = new Enrollment;
            $enroll->course_id = $course_id;
            $enroll->user_id = Auth::user()->id;
            $enroll->save();
            return redirect('/profile');
        }
    }
}
