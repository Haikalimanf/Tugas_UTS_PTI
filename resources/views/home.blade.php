<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-900 text-gray-200">

    <x-nav-landing-page></x-nav-landing-page>

    <!-- Hero Section -->
    <section class="relative bg-blue-700 overflow-hidden dark:bg-blue-900">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-indigo-600 opacity-70 dark:from-blue-900 dark:to-indigo-800"></div>
        <div class="container mx-auto py-20 text-center relative z-10">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight text-white md:text-5xl lg:text-6xl">
                Temukan Dunia dalam Setiap Halaman
            </h1>
            <p class="mb-6 text-lg font-normal text-gray-200 lg:text-xl sm:px-16 xl:px-48">
                Di Toko Buku Kami, kami menawarkan koleksi buku yang akan memperluas wawasan, menginspirasi imajinasi, dan membawa Anda ke dalam petualangan tak terbatas. Temukan buku favorit Anda dan mulailah perjalanan pengetahuan Anda hari ini.
            </p>
            <div class="text-center mt-10">
                <a href="#best-seller" class="inline-flex items-center justify-center px-5 py-3 text-lg font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 transition duration-300">
                    Temukan Buku
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section id="best-seller" class="py-20 bg-gray-800 dark:bg-gray-900">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold text-gray-200 mb-6">Our Best Seller</h2>
            <p class="text-lg text-gray-400 mb-8">Temukan koleksi buku terbaik yang paling dicari!</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($books as $book)
                    <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $book->judul }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">{{ Str::limit($book->description, 100) }}</p>
                            <p class="text-lg font-semibold text-blue-500 dark:text-blue-400 mt-4">Rp {{ number_format($book->harga, 0, ',', '.') }}</p>
                            <form action="/buy/{{ $book->id }}" method="POST">
                                @csrf
                                <button type="submit" class="mt-4 w-full bg-blue-700 text-white py-2 rounded-md hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 transition duration-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                                    Beli Buku
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</body>


</html>