<?php

namespace App\Http\Controllers;

use App\Exports\InvoicesExport;
use App\Exports\OrderExport;
use App\Imports\CategoryImport;
use App\Order;
use App\Payment;
use PDF;
use Excel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->get();
//        return $order;
        return view('admin.order.manage-order',[
            'orders' => $orders
        ]);
    }

    public function orderDetails($id){
        $order = Order::with('customer','shipping','orderDetails.product')->find($id);
        $payment = Payment::where('order_id',$order->id)->first();
        //return $payment;
        return view('admin.order.order-details',[
            'order' => $order,
            'payment' => $payment
        ]);
    }

    public function invoice($id){
        $order = Order::with('customer','shipping','orderDetails.product')->find($id);
//        return $order;
        return view('admin.order.order-invoice',[
            'order' => $order
        ]);
    }

    public function invoicePdf($id){
        $order = Order::with('customer','shipping','orderDetails.product')->find($id);
        $pdf = PDF::loadView('admin.order.order-invoice',[
            'order' => $order
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function export()
    {
        return Excel::download(new InvoicesExport, 'order.xlsx');
    }

    public function import()
    {
        Excel::import(new CategoryImport, 'order.xlsx');

        return back()->with('success', 'All good!');
    }
}









