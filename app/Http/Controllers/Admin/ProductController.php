<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list(){
        $products = Product::paginate(10);
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request){
        $this->validate($request,[
        'title' =>'required',
        'description' =>'required',
        'content' =>'required',
        'price' =>'required',
        'inventory' =>'required',
        'category_id' =>'required',
        'image' =>'required'
        ]);

        $slug = Str::slug($request->title);
        $checkSlug = Product::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();
            $extension = strtolower($extension);

            if(strcasecmp($extension,'jpg') == 0 || strcasecmp($extension,'png') == 0 || 
            strcasecmp($extension,'jepg') == 0){
                $image = Str::random(5)."_".$name_file;
                while(file_exists("image/product/".$image)){
                    $image = Str::random(5)."_".$name_file;
                }
                $file->move("image/product",$image);
            }
        }

        Product::create([
        'title'=>$request->title,
        'view_count'=>0,
        'description'=>$request->description,
        'content'=>$request->content,
        'price'=>$request->price,
        'inventory'=>$request->inventory,
        'category_id'=>$request->category_id,
        'slug'=>$slug,
        'image'=>$image,
        ]);

        return redirect()->route('admin.product.list')->with('success','create successfully');
    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit',\compact('product','categories'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title' =>'required',
            'description' =>'required',
            'content' =>'required',
            'price' =>'required',
            'inventory' =>'required',
            'category_id' =>'required',
            
        ]);
        $slug = Str::slug($request->title);
        $checkSlug = Product::where('slug',$slug)->first();
    
        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();
            $extension = strtolower($extension);

            if(strcasecmp($extension,'jpg') == 0 || strcasecmp($extension,'png') == 0 || 
            strcasecmp($extension,'jepg') == 0){
                $image = Str::random(5)."_".$name_file;
                if(file_exists("image/product/".$image)){
                    $image = Str::random(5)."_".$name_file;
                }
                $file->move("image/product",$image);
            }
        }

        $product = Product::find($id);
        $product->update([
            'title'=>$request->title,
            
            'description'=>$request->description,
            'content'=>$request->content,
            'price'=>$request->price,
            'inventory'=>$request->inventory,
            'category_id'=>$request->category_id,
            'slug'=>$slug,
            'image'=>isset($image) ? $image:$product->image,
        ]);

        return redirect()->route('admin.product.list')->with('success','update successfully');
    }

    public function delete($id){
        Product::where('id',$id)->delete();
        return redirect()->route('admin.product.list')->with('success','delete successfully');
    }
}
