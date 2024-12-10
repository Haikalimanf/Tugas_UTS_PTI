<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $buku = Buku::all(); // Ambil semua data buku
        return view('dashboard', compact('buku')); // Kirim data ke view
    }
}

