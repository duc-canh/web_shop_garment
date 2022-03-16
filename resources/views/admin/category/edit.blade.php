@extends('admin.layout.master')
@section('title')
Category edit
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $err)
                            <div class="alert alert-danger">
                                {{ $err}}
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.category.update',$category->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" value="{{ $category->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $category->email }}" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $category->address }}" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $category->phone}}" />
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