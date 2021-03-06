@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
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
                        <form action="{{ route('admin.user.update',$user->id )}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" value="{{ $user->name }}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="confirm" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" readonly value="{{ $user->email }}" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="is_admin" value="1" checked type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="is_admin" value="0" type="radio">Member
                                </label>
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