@extends('admin.layout.master')
@section('title')
Category List
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Categories
                            <small>List</small>
                        </h1>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name}}</td>
                                <td>{{ $category->email}}</td>
                                <td>{{ $category->address}}</td>
                                <td>{{ $category->phone}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.category.delete',$category->id) }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.category.edit',$category->id) }}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection