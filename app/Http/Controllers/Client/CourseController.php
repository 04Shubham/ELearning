<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index($category_slug, $course_slug){
        $category = Category::where('slug', $category_slug)->first();
        $course = Course::where('slug', $course_slug)->first();
        return view('client.course.index',compact('category','course'));
    }
 
    public function view($slug){
        $course = Course::where('slug', $slug)->first();
        return view('client.course.chapter', compact('course'));
    }
}
