@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order Details</h1>
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
                    <h3 class="card-title">Customer Information</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$order->customer->fullname}}</td>
                        </tr>
                        <tr>
                            <th>Customer Phone</th>
                            <td>{{$order->customer->phone}}</td>
                        </tr>
                        <tr>
                            <th>Customer Address</th>
                            <td>{{$order->customer->address}}</td>
                        </tr>
                        <tr>
                            <th>Customer Email</th>
                            <td>{{$order->customer->email}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shipping Information</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Shipment Customer Name</th>
                            <td>{{$order->shipping->fullname}}</td>
                        </tr>
                        <tr>
                            <th>Shipment Customer Phone</th>
                            <td>{{$order->shipping->phone}}</td>
                        </tr>
                        <tr>
                            <th>Shipment Customer Address</th>
                            <td>{{$order->shipping->address}}</td>
                        </tr>
                        <tr>
                            <th>Shipment Customer Email</th>
                            <td>{{$order->shipping->email}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payment Information</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Payment Type</th>
                            <td>{{$payment->payment_type}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$payment->payment_status}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Information</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Sl.</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        {{--{{dd($order)}}--}}
                        @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td></td>
                            <td>{{$orderDetail->product_id}}</td>
                            <td>{{$orderDetail->product_name}}</td>
                            <td>{{$orderDetail->product_price}}</td>
                            <td>{{$orderDetail->product_quantity}}</td>
                            <td>{{$orderDetail->product_price*$orderDetail->product_quantity}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
        <div class="content">
            <a class="btn btn-info" href="{{url('/invoice/'.$order->id)}}">Generate Invoice</a>
        </div>
    </div>
@endsection