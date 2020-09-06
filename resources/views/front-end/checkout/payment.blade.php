@extends('front-end.master')
@section('body')
    @include('front-end.includes.menu')
    <div class="container">
        <div class="row mt-5">
            <div class="offset-1 col-md-10">
                <h1>Hello {{Session::get('customerName')}}! Please Provide your payment info</h1>
                <h1>your total is Tk. {{Cart::total()}}</h1>
                <form action="{{url('/order-confirm')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cash on delivery</label>
                        <input type="radio" class="form-control" name="payment_type" value="cash">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bkash</label>
                        <input type="radio" class="form-control" name="payment_type" value="bkash">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Paypal</label>
                        <input type="radio" class="form-control" name="payment_type" value="paypal">
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>

@endsection
