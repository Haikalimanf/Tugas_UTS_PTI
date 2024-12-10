```blade
<section id="best-seller" class="py-20 bg-gray-800 dark:bg-gray-900">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold text-gray-200 mb-6">Discover Our Best Products!</h2>
        <p class="text-lg text-gray-400 mb-12">Temukan koleksi buku terbaik yang paling dicari oleh pelanggan kami!</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($buku as $buku)
                <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <div class="relative">
                        <!-- Label Diskon -->
                        @if ($buku->discount)
                            <span class="absolute top-2 left-2 bg-red-500 text-white text-sm px-2 py-1 rounded-md">Diskon {{ $buku->discount }}%</span>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-1">{{ $buku->judul }}</h3>
                        <!-- Nama Author -->
                        <p class="text-sm text-gray-500 dark:text-gray-400 italic mb-4">by {{ $buku->penulis }}</p>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($buku->description, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-bold text-blue-500 dark:text-blue-400">Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                            @if ($buku->original_price)
                                <p class="text-sm text-gray-500 line-through">Rp {{ number_format($buku->original_price, 0, ',', '.') }}</p>
                            @endif
                        </div>
                        <form method="POST">
                            @csrf
                            <button type="submit" class="mt-4 w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-2 rounded-md hover:from-blue-500 hover:to-blue-600 focus:ring-4 focus:ring-blue-300 transition duration-300">
                                Beli Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
```