@extends('front-end.master')
@section('body')
    @include('front-end.includes.menu')
    <div class="container">
        <div class="row">
            <div class="offset-1 col-md-10">
                <h1>Please Login to continue your shopping</h1>
                <h3 class="text-danger">{{Session::get('message')}}</h3>
                <form action="{{url('/checkout/login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="offset-1 col-md-10">
                <h1>If you are not a member please register</h1>
                <form action="{{url('/checkout/registration')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full name</label>
                        <input type="text" class="form-control" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input id="email" type="email" class="form-control" name="email" onblur="emailCheck(this.value)">
                        <div id="res" class="text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // var email = document.getElementById('email');
        function emailCheck(email) {
            // var emailValue = document.getElementById('email').value;
            var xmlHTTP = new XMLHttpRequest();
            var serverpage = 'http://127.0.0.1:8000/email-check/'+email;
            xmlHTTP.open('GET',serverpage);
            xmlHTTP.onreadystatechange = function () {
                //alert(xmlHTTP.readyState);
                if(xmlHTTP.readyState == 4 && xmlHTTP.status == 200){
                    document.getElementById('res').innerHTML = xmlHTTP.responseText;
                }
            }
            xmlHTTP.send();
        }

    </script>

@endsection
