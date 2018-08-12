<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use PDF;

class ReportController extends Controller
{

    public function generateNota($id)
    {
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', '=', $id)->get();

        $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make()
            ->number($id)->tax($order->service_price)->notes('Hormat Kami : Non-Organik')
            ->customer([
                    'name' => $order->customer->name,
                    'id' => $id,
                    'phone' => '',
                    'zip' => '',
                    'city' => '',
                    'country' => $order->delivery]);

        foreach ($order_details as $od) {
            $invoice->addItem($od->product->name, $od->product->price, $od->quantity, $od->product->price * $od->quantity);
        }

        $invoice->download('nota');
    }

    public function generateSalesReport()
    {
        $html2pdf = new Html2Pdf();
        $orders = Order::all();

        $html2pdf->writeHTML(view('sales_report')->with(compact('orders')));
        $html2pdf->output();

    }
}
