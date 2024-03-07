<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

Use App\Models\Category;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();
        return view('layouts.admin.category.index',compact('categories'));
    }

    public function create(){
        return view('layouts.admin.category.create');
    }

    public function store(Request $request){
        $newCategory = new Category;
        $newCategory->title = $request->title;
        $newCategory->description = $request->description;
        $newCategory->slug = str::slug ($request->slug);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category/',$filename);
            $newCategory->image = $filename;
        }
        $newCategory->meta_title = $request->meta_title;
        $newCategory->meta_description = $request->meta_description;
        $newCategory->save();

        return redirect('admin/categories')->with('success', 'Category Create Successfully!');
    }

    public function edit($id){
        $category = Category::find($id);
        if($category){
            return view('layouts.admin.category.edit', compact('category'));
        }
        else{
            return redirect('admin/categories')->with('error', 'Category not Found!');  
        }
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        if($category){
            $category->title = $request->title;
            $category->description = $request->description;
            $category->slug = str::slug ($request->slug);
    
            if($request->hasfile('image')){
                $destination = 'uploads/category/'.$category->image;
                if(file::exists($destination)){
                    file::delete($destination);
                }
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/category/',$filename);
                $category->image = $filename;
            }
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_description;
            $category->update();
            return redirect('admin/categories')->with('success', 'Category Updated Successfully!');
        }
        else{
            return redirect()->back()->with('error','Categroy not Found!');
        }
    }

     // It deletes soft delete
    public function destory($id){
        $category = Category::find($id);
        if($category){
            $category->delete();
            return redirect()->back()->with('success','Categroy moved to Trash!');
        }
        else{
            return redirect()->back()->with('error','Categroy not Found!');
        }
    }
     
    // It Deletes permanently 
    public function delete($id){
        $category = Category::withTrashed()->where('id', $id)->first();
        if($category){
            $destination = 'uploads/category/'.$category->image;
            if(file::exists($destination)){
                file::delete($destination);
            }
            $category->forceDelete();
            return redirect()->back()->with('success','Categroy Deleted Successfully!');
        }
        else{
            return redirect()->back()->with('error','Categroy not Found!');
        }
    }

    // It restore the delete items
    public function restore($id){
        $category = Category::withTrashed()->where('id', $id)->first();
        if($category){
           $category->restore();
           return redirect()->back()->with('success','Categroy Restored Successfully!');
        }
        else{
            return redirect()->back()->with('error','Categroy not Found!');
        }
    }

    public function trash(){
        $trashed_categories = Category::onlyTrashed()->get();
        return view('layouts.admin.category.trash', compact('trashed_categories'));
    }
}
