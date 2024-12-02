<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>

<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white text-black border border-red shadow-lg z-10 h-28">
        @include('Partials.header') {{-- Sesuaikan jalur folder --}}
    </header>

    <!-- Main Content -->
    <main class="content flex-grow mb-8 mt-4 pt-28 px-12"> <!-- Gunakan padding top sesuai tinggi header -->
        <div class="flex flex-wrap">
            <!-- Box Kiri -->
            <!-- Box Kanan -->
            <div class="w-full md:w-3/5  p-4 ">
                <h2 class="text-6xl font-bold mb-4 ml-16 mt-4 ">Analisis Tren</h2>
                <h2 class="text-6xl font-bold mb-4 ml-16">Menu Pizza</h2>
                <p class="text-2xl ml-16 mr-16">
                    Sebuah sistem pendukung pemberian keputusan
                    untuk menganalisa tren dalam rentang waktu yang dapat ditentukan sehingga akan membantu membuat
                    strategi dalam meningkatkan usaha penjualan pizza anda.
                </p>
                <button onclick="window.location.href='/lihatdata'"
                    class="ml-80 mt-12 border border-gray px-6 py-3 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#19A7CE] hover:scale-105">
                    MULAI
                </button>



            </div>

            <div class="w-full md:w-2/5 p-4 flex items-center justify-center ">
                <img src="{{ asset('./images/gambar 1.png') }}" alt="gambar 1r" class="max-w-full h-auto rounded-lg ">
            </div>

        </div>
    </main>
    <x-buttonScroll />

    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}
</body>
