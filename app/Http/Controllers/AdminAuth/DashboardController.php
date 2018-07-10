<?php

namespace App\Http\Controllers\AdminAuth;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $customers = Customer::all();
        $products = Product::all();
        $order_all = Order::with('customer','order_detail', 'courier', 'payment')->get();
        $orders = Order::with('order_detail')->where('status', '=', 1)->get();
        $laku=0;
        foreach ($orders as $order) {
        }
        $laku = DB::select("SELECT sum(quantity) as laku FROM order_details INNER JOIN orders ON orders.id = order_details.order_id AND orders.status = 1");


//        dd($laku[0]->laku);
        return view('admin.home')->with(['customers' => $customers, 'products' => $products, 'orders' => $orders, 'laku' => $laku, 'order_all' => $order_all]);
    }

    public function sales()
    {

        $orders = Order::with('customer','order_detail', 'courier', 'payment')->get();

//        return $orders;
        return view('admin.sales.index')->with(['orders' => $orders]);
    }
}
