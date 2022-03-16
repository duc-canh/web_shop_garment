<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function list(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:categories',
            'address'=>'required',
            'phone'=>'required',
        ]);

        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        $category = Category::create([
            'name'=>$request->name,
            'slug'=>$slug,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
        ]);

        return redirect()->route('admin.category.list')->with('success','create successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            
            'address'=>'required',
            'phone'=>'required',
        ]);
        $slug = Str::slug($request->name);
        $checkSlug = Category::where('slug',$slug)->first();

        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        $category = Category::where('id',$id);
        $category->update([
            'name'=>$request->name,
            'slug'=>$slug,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
        ]);

        return redirect()->route('admin.category.list')->with('success','update successfully');
    }

    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('admin.category.list')->with('success','delete successfully');
    }
}
