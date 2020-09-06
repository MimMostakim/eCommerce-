@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders Page</h1>
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
                    <h3 class="card-title">Orders</h3>
                    <a href="{{url('brand/create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Time & Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->fullname}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/y H:i A')}}</td>
                                <td>{{$order->order_status == 1 ? 'Approved':'pending'}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    <a href="{{url('manage-order-details',['id' => $order->id])}}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <a href="{{url('brand/'.$order->id.'/edit')}}" class="btn btn-sm btn-success">
                                        <i class="fa fa-arrow-circle-down"></i>
                                    </a>
                                    <a href="{{url('brand/'.$order->id)}}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form" action="{{url('brand/'.$order->id)}}" method="post" style="display: none;">
                                        @csrf
                                        @METHOD('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Total</th>
                            <th>Order Time & Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <a href="{{url('/excel-export')}}" class="btn btn-info">Excel Import</a>
        </section>
        <!-- /.content -->
    </div>
@endsection