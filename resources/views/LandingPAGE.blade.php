<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</head>

<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white text-black border border-red shadow-lg z-10 h-28">
        @include('partials.header') {{-- Sesuaikan jalur folder --}}
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
                <button
                    class="ml-80 mt-12 border border-gray px-6 py-3 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#19A7CE] hover:scale-105"
                    onclick="request()->is('/lihatdata')">
                    MULAI
                </button>
            </div>

            <div class="w-full md:w-2/5 p-4 flex items-center justify-center ">
                <img src="{{ asset('./images/gambar 1.png') }}" alt="gambar 1r" class="max-w-full h-auto rounded-lg ">
            </div>

        </div>
    </main>
    <button id="scrollToTopBtn"
        class="fixed bottom-6 right-8 bg-[#405D72] text-white px-3 pt-2 pb-2 rounded-full shadow-lg place-content-center hover:bg-indigo-600 transition duration-300 hidden"
        onclick="scrollToTop()">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg> --}}
        <ion-icon name="arrow-up-circle-outline" class="h-6 w-6"></ion-icon>
    </button>
    <div class="content flex-grow">

    </div>

    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}
</body>
<script>
    const scrollToTopBtn = document.getElementById("scrollToTopBtn");

    // Tampilkan tombol saat pengguna scroll ke bawah
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.remove("hidden");
        } else {
            scrollToTopBtn.classList.add("hidden");
        }
    });

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }
</script>
