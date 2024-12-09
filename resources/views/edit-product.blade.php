<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('edit-product', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Title Book -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title Book</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Title Book Here...">
                    </div>

                    <!-- Author -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $buku->penulis) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Name Author Here...">
                    </div>

                    <!-- Publisher -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
                        <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Input Name Publisher Here...">
                    </div>

                    <!-- Year of Publication -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year of Publication</label>
                        <input type="text" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="2024">
                    </div>

                    <!-- Price -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" id="harga" name="harga" value="{{ old('harga', $buku->harga) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20000">
                    </div>

                    <!-- Stock -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                        <input type="text" id="stok" name="stok" value="{{ old('stok', $buku->stok) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="20">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-center items-center space-x-4 mb-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <a href="{{ route('dashboard') }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
