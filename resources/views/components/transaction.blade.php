<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

@props(['judul', 'jumlah_beli', 'total_harga'])
<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Detail Pembelian</h3>
    
    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-md mb-4">
        <p class="text-lg text-gray-600 dark:text-gray-300">Judul Buku: <strong class="text-gray-800 dark:text-gray-200">{{ $judul }}</strong></p>
        <p class="text-lg text-gray-600 dark:text-gray-300">Jumlah Beli: <strong class="text-gray-800 dark:text-gray-200">{{ $jumlah_beli }}</strong></p>
        <p class="text-lg text-gray-600 dark:text-gray-300">Total Harga: <strong class="text-lg text-blue-600 dark:text-blue-400">Rp {{ number_format($total_harga, 0, ',', '.') }}</strong></p>
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="text-blue-500 hover:text-blue-700 dark:hover:text-blue-300">Kembali ke Daftar Buku</a>
        <button onclick="confirmPurchase()" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
            Konfirmasi Pembelian
        </button>
    </div>
</div>

<script>
function confirmPurchase() {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda tidak dapat membatalkan ini setelah konfirmasi!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, beli sekarang!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Dikonfirmasi!',
                'Pembelian Anda telah dikonfirmasi.',
                'success'
            ).then(() => {
                window.location.href = '/generate-receipt';
            });
        }
    })
}

</script>
