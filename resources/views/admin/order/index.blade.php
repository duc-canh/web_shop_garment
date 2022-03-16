@extends('admin.layout.master')
@section('title')

@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Orders
                            <small>List</small>
                        </h1>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>User</th>
                                <th>Product name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Price</th>
                                <th>Total count</th>
                                <th>Total money</th>
                               
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->title }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->total_count }}</td>
                                <td>{{ $order->total_money }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.user.delete',$user->id )}}"> Delete</a></td>
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