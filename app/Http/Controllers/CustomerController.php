<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use Mail;
use Cart;
use Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function checkoutReg(Request $request){
        $customer = new Customer();
        $customer->fullname = $request->fullname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        $customer->save();

        $data = $customer->toArray();
        Mail::send('front-end.mails.confirmation-mail',$data,function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Welcome to Lara 4 Ecommerce');
        });

        $customerId = $customer->id;
        Session::put('customer',$customerId);
        Session::put('customerName',$customer->fullname);

        return redirect('/shipping');
    }

    public function emailCheck($email){
//        echo $email;
        $customer = Customer::where('email',$email)->first();
        if($customer){
            return 'Already Exist';
        } else{
            return 'Available';
        }
    }

    public function checkoutLogin(Request $request){
        $customer = Customer::where('email',$request->email)->first();

        if(password_verify($request->password, $customer->password)){
            Session::put('customer',$customer->id);
            Session::put('customerName',$customer->fullname);

            return redirect('/shipping');
        } else {
            return redirect('/checkout')->with('message','Invalid Email or password');
        }
    }

    public function checkoutLogout(){
        Session::forget('customer');
        Session::forget('customerName');

        return redirect('/checkout');
    }

    public function shippingForm(){
        $customer = Customer::find(Session::get('customer'));
        return view('front-end.checkout.shipping',[
            'customer' => $customer
        ]);
    }

    public function shippingSave(Request $request){
        $shipping = new Shipping();
        $shipping->fullname = $request->fullname;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);

        return redirect('/payment');
    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }

    public function confirmOrder(Request $request){
        $paymentType = $request->payment_type;
        $orderTotal = Cart::total();
        if($paymentType == 'cash'){
            $order = new Order();
            $order->customer_id = Session::get('customer');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = $orderTotal;
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetails();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();

            return redirect('/order-received');

        } elseif ($paymentType == 'bkash'){
            $order = new Order();
            $order->customer_id = Session::get('customer');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = $orderTotal;
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetails();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();

            return redirect('/stripe');

        } elseif ($paymentType == 'paypal'){

        }
    }

    public function confirmReceive(){
        return view('front-end.checkout.order-receive');
    }

}
