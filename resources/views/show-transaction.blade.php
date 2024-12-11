<!-- resources/views/show-transaction.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <x-transaction 
            :judul="$judul" 
            :jumlah_beli="$jumlah_beli" 
            :total_harga="$total_harga" 
        />

    </div>
</x-app-layout>
