<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class TransaksiController extends Controller
{
    public function index()
    {
         
        $buku = Buku::all(); 

        
        return view('show-transaction', compact('buku')); 
    }

    
    public function store(Request $request)
{
    
    $request->validate([
        'buku_id' => 'required|exists:buku,id',
        'jumlah_beli' => 'required|integer|min:1|max:' . Buku::findOrFail($request->buku_id)->stok,
    ]);
    
    
    $buku = Buku::findOrFail($request->buku_id);
    
    $total_harga = $buku->harga * $request->jumlah_beli;

    if ($buku->stok < $request->jumlah_beli) {
        return back()->with('error', 'Stok tidak mencukupi.');
    }

    // $buku->stok -= $request->jumlah_beli;
    // $buku->save();

    return redirect()->route('transaksi.show', [
        'judul' => $buku->judul,
        'jumlah_beli' => $request->jumlah_beli,
        'total_harga' => $total_harga,
    ]);
}


public function showTransaction(Request $request)
{
    $judul = $request->query('judul');
    $jumlah_beli = $request->query('jumlah_beli');
    $total_harga = $request->query('total_harga');

    return view('show-transaction', compact('judul', 'jumlah_beli', 'total_harga'));
}

}
