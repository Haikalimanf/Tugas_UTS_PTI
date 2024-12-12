<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{
    public function generateReceipt()
    {
        $data = [
            'judul' => 'Contoh Buku',
            'jumlah_beli' => 2,
            'total_harga' => 50000,
            'tanggal' => now()->format('d-m-Y H:i:s'),
        ];

        $pdf = PDF::loadView('receipt', $data);

        return $pdf->download('resi_pembelian.pdf');
    }
}
