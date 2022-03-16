@extends('admin.layout.master')
@section('title')
Product list
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
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
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Inventory</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td><img style="max-width:20px" src="{{ $product->imageUrl() }}" alt=""></td>
                                <td>{{ $product->category->name}}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->inventory }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ route('admin.product.delete',$product->id) }}"> Delete</a></td>
                                <!-- <td class="center"><i class="fa fa-trash-o  fa-fw"><button data-id_xoa="{{ $product->id }}" class="delData" name="delete_data"> Delete</button></td> -->
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.product.edit',$product->id) }}">Edit</a></td>
                               
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                     {{ $products->links() }}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

</script>
@endsection