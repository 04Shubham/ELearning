<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\File;


use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view("layouts.admin.course.index", compact('courses'));
    }
    public function create(){
        $categories = Category::all();
        return view("layouts.admin.course.create", compact('categories'));
    }
    public function store(Request $request){
        $request -> validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'slug' => 'required|unique:courses',

        ]);
        $course = new Course;
        $course->category_id = $request->category_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->long_description = $request->long_description;
        $course->vedio = $request->vedio;
        $course->slug = str::slug ($request->slug);
        
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/course/', $filename);
            $course->image = $filename;
        }

        $course->meta_title = $request->meta_title;
        $course->meta_description = $request->meta_description;
        $course->price = $request->price;
        $course->save();
        return redirect('/admin/courses')->with('success', 'Course Created Successfully ');
    }
    public function edit($id){
        $course = Course::find($id);
        if($course){
            return view('layouts.admin.course.edit', compact('course'));
        }
        else{
            return redirect('admin/courses')->with('error', 'Category not Found!');  
        }
    }
    public function update(Request $request,$id){
        $course = Course::find($id);
        if($course){
            $course->title = $request->title;
            $course->description = $request->description;
            $course->slug = str::slug ($request->slug);
    
            if($request->hasfile('image')){
                $destination = 'uploads/course/'.$course->image;
                if(file::exists($destination)){
                    file::delete($destination);
                }
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/course/',$filename);
                $course->image = $filename;
            }
            $course->meta_title = $request->meta_title;
            $course->meta_description = $request->meta_description;
            $course->update();
            return redirect('admin/courses')->with('success', 'Course Updated Successfully!');
        }
        else{
            return redirect()->back()->with('error','Course not Found!');
        }
    }
    public function destory($id){
        $course = Course::find($id);
        if($course){
            $course->delete();
            return redirect()->back()->with('success','Course moved to Trash!');
        }
        else{
            return redirect()->back()->with('error','Course not Found!');
        }
    }
    public function delete($id){
        $course = Course::withTrashed()->where('id', $id)->first();
        if($course){
            $destination = 'uploads/course/'.$course->image;
            if(file::exists($destination)){
                file::delete($destination);
            }
            $course->forceDelete();
            return redirect()->back()->with('success','Course Deleted Successfully!');
        }
        else{
            return redirect()->back()->with('error','Course not Found!');
        }
    }
    public function trash(){
        $trashed_courses = Course::onlyTrashed()->get();
        return view('layouts.admin.course.trash', compact('trashed_courses'));
    }
}
