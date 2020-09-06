<?php
/**
 * Created by PhpStorm.
 * User: Web App PHP
 * Date: 3/8/2020
 * Time: 8:18 PM
 */

namespace App\Exports;

use App\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    public function view(): View
    {
        $orders = Order::with('customer')->get();
        return view('admin.exports.invoices', [
            'orders' => $orders
        ]);
    }
}