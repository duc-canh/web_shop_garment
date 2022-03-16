@extends('admin.layout.master')
@section('title')
Product add
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
                        <form action="{{ route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Category</label>
                               <select name="category_id" class="form-control">
                                   @foreach($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                                    @endforeach
                               </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" placeholder="Please Enter title" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="description" placeholder="Please Enter description" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*"  />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter price" />
                            </div>
                            <div class="form-group">
                                <label>Inventory</label>
                                <input class="form-control" name="inventory" placeholder="Please Enter inventory" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="demo" class="ckeditor" name="content"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Product Add</button>
                           
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection