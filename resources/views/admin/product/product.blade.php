@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>
                    <a href="{{url('product/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->categories->cat_name}}</td>
                                <td>{{$product->brands->brand_name}}</td>
                                <td>{{$product->pro_name}}</td>
                                <td><img src="{{asset($product->pro_image)}}" alt="" width="100"></td>
                                <td>{{$product->pro_price}}</td>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>
                                    {{--<a href="{{url('product/'. $product->id)}}" class="btn btn-sm btn-warning">--}}
                                        {{--<i class="fa fa-search-plus"></i>--}}
                                    {{--</a>--}}
                                    <a href="{{url('brand/'.$product->id.'/edit')}}" class="btn btn-sm btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{--@if(Auth::user()->role == 1)--}}
                                    {{--<a href="{{url('product/'.$product->id)}}" class="btn btn-sm btn-danger" >--}}
                                        {{--<i class="fa fa-trash"></i>--}}
                                    {{--</a>--}}
                                    {{--<form action="{{url('product/'.$product->id.'/delete')}}" method="post">--}}
                                        {{--@csrf--}}
                                        {{--@method('DELETE')--}}
                                        {{--<button type="submit" class="btn btn-sm btn-danger" >--}}
                                            {{--<i class="fa fa-trash"></i>--}}
                                        {{--</button>--}}
                                    {{--</form>--}}
                                    {{--@endif--}}
                                    @if(Auth::user()->role == 1)
                                    <a href="{{url('product/'.$product->id)}}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form" action="{{url('product/'.$product->id)}}" method="post" style="display: none;">
                                        @csrf
                                        @METHOD('delete')

                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection