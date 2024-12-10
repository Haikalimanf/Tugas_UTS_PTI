<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (auth()->user()->role === 'admin')
        <x-show-table-product :buku="$buku"></x-show-table-product>
    @elseif (auth()->user()->role === 'customer')
        <x-show-product :buku="$buku"></x-show-product>
    @else
        <p class="text-red-500">Role tidak dikenali.</p>
    @endif

</x-app-layout>
