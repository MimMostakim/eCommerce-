@extends('front-end.master')
@section('body')
    @include('front-end.includes.menu')
    <div class="container">
        <div class="row mt-5">
            <div class="offset-1 col-md-10">
                <h1>Hello {{Session::get('customerName')}}! Please Provide your shipping address</h1>
                <form action="{{url('/shipping/save')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full name</label>
                        <input type="text" class="form-control" name="fullname" value="{{$customer->fullname}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$customer->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea class="form-control" name="address">{{$customer->address}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Shipping Info</button>
                </form>
            </div>
        </div>
    </div>

@endsection
