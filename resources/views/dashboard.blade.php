<x-app-layout>
    

    @if (auth()->user()->role === 'admin')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <x-show-table-product :buku="$buku"></x-show-table-product>
    @elseif (auth()->user()->role === 'customer')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product') }}
            </h2>
        </x-slot>
        <x-show-product :buku="$buku"></x-show-product>
    @else
        <p class="text-red-500">Role tidak dikenali.</p>
    @endif

</x-app-layout>
