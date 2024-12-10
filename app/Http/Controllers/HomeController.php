<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua buku dari database
        $books = Buku::take(4)->get();
        return view('Home', compact('books'));
    }

    public function buy($id)
    {
        // Logika untuk proses transaksi pembelian buku
        $book = Buku::findOrFail($id);
        // Di sini Anda dapat menambahkan logika transaksi atau pembayaran
        // Contoh: menambahkan buku ke keranjang atau ke sistem pembayaran
        return redirect()->back()->with('success', 'Buku ' . $book->title . ' telah berhasil dibeli.');
    }
}

