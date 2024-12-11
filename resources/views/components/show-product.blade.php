<section id="best-seller" class="py-20 bg-gray-800 dark:bg-gray-900">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold text-gray-200 mb-6">Discover Our Best Products!</h2>
        <p class="text-lg text-gray-400 mb-12">Temukan koleksi buku terbaik yang paling dicari oleh pelanggan kami!</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($buku as $buku)
                <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-1">{{ $buku->judul }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 italic mb-4">by {{ $buku->penulis }}</p>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($buku->description, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-bold text-blue-500 dark:text-blue-400">Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                            @if ($buku->original_price)
                                <p class="text-sm text-gray-500 line-through">Rp {{ number_format($buku->original_price, 0, ',', '.') }}</p>
                            @endif
                        </div>
                        <!-- Tombol beli jika stok lebih dari 0 -->
                        @if ($buku->stok > 0)
                            <form method="POST" action="{{ route('transaksi.store') }}" class="flex items-center space-x-4">
                                @csrf
                                <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                <input 
                                    type="number" 
                                    name="jumlah_beli" 
                                    value="1" 
                                    max="{{ $buku->stok }}" 
                                    class="w-20 px-2 py-1 border rounded-md text-center"
                                >
                                <button 
                                    type="submit" 
                                    class="flex-grow bg-gradient-to-r from-blue-600 to-blue-700 text-white py-2 px-4 rounded-md hover:from-blue-500 hover:to-blue-600 focus:ring-4 focus:ring-blue-300 transition duration-300"
                                >
                                    Beli Sekarang
                                </button>
                            </form>
                        @else
                            <p class="text-red-500">Stok habis</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
