@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                        @if(count($errors))
                                @foreach($errors->all() as $err)
                                <div class="alert alert-danger">
                                    {{ $err }}<br>
                                </div>
                                @endforeach
                            @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Category</label>
                               <select name="category_id" class="form-control">
                                   @foreach($categories as $category)
                                    <option value="{{ $category->id}}" @if($product->category_id == $category->id) checked @endif>{{ $category->name}}</option>
                                    @endforeach
                               </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{ $product->title }}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="description" value="{{ $product->description }}" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*"  />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" value="{{ $product->price }}" />
                            </div>
                            <div class="form-group">
                                <label>Inventory</label>
                                <input class="form-control" name="inventory" value="{{ $product->inventory }}" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" class="ckeditor" name="content">{!! $product->content !!}"</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Update</button>
                           
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection