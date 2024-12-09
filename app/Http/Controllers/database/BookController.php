<?php

namespace App\Http\Controllers\database; 

use App\Models\Buku; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        if ($search) {
            $buku = Buku::where('judul', 'like', "%$search%")
                         ->orWhere('penulis', 'like', "%$search%")
                         ->orWhere('penerbit', 'like', "%$search%")
                         ->get();
        } else {
            $buku = Buku::all();
        }


        return view('dashboard', compact('buku'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $buku = Buku::findOrFail($id); 
        return view('edit-product', compact('buku'));  
    }

    public function update(Request $request, $id)
    {
  
        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('dashboard')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('dashboard')->with('success', 'Buku berhasil dihapus!');
    }

    public function create()
{
    return view('add-product'); // Menampilkan form untuk menambahkan produk
}

public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
    ]);

    // Menyimpan data ke database
    Buku::create([
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ]);

    // Redirect ke halaman dashboard setelah data berhasil disimpan
    return redirect()->route('dashboard')->with('success', 'Buku berhasil ditambahkan!');
}



}
