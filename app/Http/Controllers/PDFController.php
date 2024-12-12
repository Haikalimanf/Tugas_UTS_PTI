<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{
    public function generateReceipt(Request $request)
    {
        $data = [
            'judul' => $request->query('judul'),
            'jumlah_beli' => $request->query('jumlah_beli'),
            'total_harga' => $request->query('total_harga'),
            'tanggal' => now()->format('d-m-Y H:i:s'),
        ];
    
        $pdf = PDF::loadView('receipt', $data);
    
        $fileName = 'resi_pembelian_' . str_replace(' ', '_', $data['judul']) . '.pdf';

        return $pdf->download($fileName);
    }
    
}
