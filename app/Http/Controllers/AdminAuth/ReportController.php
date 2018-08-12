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

    public function ttd(\Codedge\Fpdf\Fpdf\Fpdf $fpdf)
    {
        $fpdf->SetY(-60);
        $fpdf->SetFont("Times", "B", "8");
        $fpdf->Cell(0, 5,  "Madiun, ". Carbon::today('Asia/Jakarta')->format('d F Y'), 0, 1, "R");
        $fpdf->Cell(121, 5, "Mengetahui", 0, 1, "R");
        $fpdf->Cell(122, 3, "Ketua Kopma", 0, 1, "R");
        $fpdf->SetFont("Times", "U", "8");
        $fpdf->Cell(0, 15, "", 0, 1, "C");
        $fpdf->SetFont("Times", "BU", "8");
        $fpdf->Cell(124, 3, "Iqro' Wiradhika", 0, 1, "R");
        $fpdf->Cell(0, 0, "", 0, 1, "C");
        $fpdf->SetFont("Times", "", "8");
        $fpdf->Cell(124, 3, "NIM: 16211033X", 0, 1, "R");

        $fpdf->Footer();
    }

    public function judul(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $teks1, $teks2, $teks3, $teks4)
    {
        $fpdf->Cell(20);
        $fpdf->SetFont("Times", "B", "12");
        $fpdf->Cell(0, 5, $teks1, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->Cell(0, 5, $teks2, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->SetFont("Times", "B", "10");
        $fpdf->Cell(0, 5, $teks3, 0, 1, "C");
        $fpdf->Cell(20);
        $fpdf->SetFont("Times", "I", "8");
        $fpdf->Cell(0, 5, $teks4, 0, 1, "C");
        $fpdf->Cell(20);
//        $fpdf->Cell(0, 2, $teks5, 0, 1, "C");
    }

    function garis(\Codedge\Fpdf\Fpdf\Fpdf $fpdf)
    {
        $fpdf->SetLineWidth(1);
        $fpdf->Line(10, 36, 138, 36);
        $fpdf->SetLineWidth(0);
        $fpdf->Line(10, 37, 138, 37);
    }

    function letak(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $gambar)
    {
        $fpdf->Image($gambar, 15, 10, 15, 15);
    }

    public function TableSales(\Codedge\Fpdf\Fpdf\Fpdf $fpdf, $header, $data)
    {
        // Colors, line width and bold font
        $fpdf->SetFillColor(251, 122, 74);

        $fpdf->SetLineWidth(.3);
        $fpdf->SetFont('', 'B');
        // Header
        $w = array(10, 15, 40, 23, 21, 20);
        for ($i = 0; $i < count($header); $i++)
            $fpdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $fpdf->Ln();

        $fpdf->SetTextColor(0);
        $fpdf->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $x => $row) {
            $fpdf->Cell($w[0], 6, $x+1, 'LR', 0, 'L', $fill);
            if ($row->status == 0) {
                $fpdf->Cell($w[1], 6, "Pending", 'LR', 0, 'R', $fill);
            } else {
                $fpdf->Cell($w[1], 6, "Lunas", 'LR', 0, 'R', $fill);
            }
            $fpdf->Cell($w[2], 6, $row->customer->name, 'LR', 0, 'L', $fill);
            $fpdf->Cell($w[3], 6, $row->payment->name, 'LR', 0, 'R', $fill);
            if ($row->payment_id == 1) {
                $fpdf->Cell($w[4], 6, "-", 'LR', 0, 'R', $fill);
            } else {
                $fpdf->Cell($w[4], 6, $row->courier->name, 'LR', 0, 'R', $fill);
            }
            $fpdf->Cell($w[5], 6, $row->total, 'LR', 0, 'R', $fill);
            $fpdf->Ln();
        }
        // Closing line
        $fpdf->Cell(array_sum($w), 0, '', 'T');
    }

    public function generateReports()
    {
        $fpdf = new \Codedge\Fpdf\Fpdf\Fpdf();
        $orders = Order::all();

        $header = array('No', 'Status', 'Nama Pelanggan', 'Pembayaran', 'Kurir', "Total");
        $fpdf = new \Codedge\Fpdf\Fpdf\Fpdf();
        $fpdf->AddPage("P", "A5");
        $fpdf->SetFont('Courier', 'B', 18);
        $this->letak($fpdf, "admin/app-assets/images/logo/logo.png");
        $this->judul($fpdf, "KURSUS KETERAMPILAN MENJAHIT", "NON-ORGANIK", "Jl. Bahagia 01 Desa Sangen Kabupaten Madiun, Jawa Timur","");
        $this->garis($fpdf);
        $fpdf->Cell(1000, 10, "", null);
        $fpdf->Ln();

        $this->TableSales($fpdf, $header, $orders);
//        $this->total($fpdf, $orders);
//        $this->ttd($fpdf);

        $fpdf->Output();
    }

    public function generateSalesReport()
    {
        $html2pdf = new Html2Pdf();
        $orders = Order::all();

        $html2pdf->writeHTML(view('sales_report')->with(compact('orders')));
        $html2pdf->output();

    }
}
