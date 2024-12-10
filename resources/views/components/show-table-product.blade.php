<div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="GET" action="dashboard" class="flex">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" name="search" id="default-search" class="block w-full pl-10 pr-16 py-2 text-sm text-gray-900 border border-gray-300 rounded-l-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search books..." value="{{ request('search') }}">
                        </div>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-700 rounded-r-lg border-l border-gray-700 hover:bg-blue-red focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Judul
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Penulis
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Penerbit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tahun Terbit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok
                                </th>
                                <th scope="col" class="px-6 py-3">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $buku)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $buku->judul }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $buku->penulis }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $buku->penerbit }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $buku->tahun_terbit }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp.{{ number_format($buku->harga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $buku->stok }}
                                </td>
                                <td class="px-6 py-4 text-center align-middle">
                                    <a href="/edit-product/{{ $buku->id }}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('delete-product', $buku->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('delete-product', $buku->id) }}" class="delete-button ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 dark:focus:ring-red-800">
                                            Hapus
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-lg p-6 max-w-sm w-full">
            <h3 class="text-lg font-medium text-gray-900">Apakah Anda yakin ingin menghapus produk ini?</h3>
            <div class="mt-4 flex justify-end space-x-4">
                <button id="cancelButton" class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded hover:bg-gray-300">
                    Batal
                </button>
                <form id="deleteForm" action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            const modal = document.getElementById('deleteModal');
            const cancelButton = document.getElementById('cancelButton');
            const deleteForm = document.getElementById('deleteForm');
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Ambil URL dari tombol hapus
                    const deleteUrl = button.getAttribute('href');
                    
                    // Set action form ke URL hapus produk
                    deleteForm.setAttribute('action', deleteUrl);
                    
                    // Tampilkan modal
                    modal.classList.remove('hidden');
                });
            });

            // Tombol Batal
            cancelButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
        });
    </script>