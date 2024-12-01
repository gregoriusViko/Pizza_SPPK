<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white text-black border border-red shadow-lg z-10 h-28">
        @include('partials.header') {{-- Sesuaikan jalur folder --}}
    </header>

    <main class="content flex-grow mb-5 mt-4 pt-28 px-12 mx-24">  
        <h2 class="text-xl font-semibold text-black mb-4">Tabel 2 itemset</h2>


        <div class="bg-[#D9D9D9] p-4 w-full h-96 flex flex-col items-start justify-center">
 
            <h2 class="text-xl text-black mb-4 text-left">
              Berikut hasil dari 2 itemset yang memiliki nilai support diatas nilai minimum support
            </h2>
            <h2 class="text-xl text-black mb-4 text-left">
              Min Support : { }
            </h2>
          
            <!-- Box scrollable -->
            <div class="bg-[#746868] w-[99%] h-70 overflow-y-scroll p-4">
              <!-- Konten panjang -->
              <div class="text-white space-y-4">
                <h2 class="text-xl font-bold">Halaman Panjang</h2>
                <p>Ini adalah bagian pertama dari konten panjang.</p>
                <p>Ini adalah bagian kedua dari konten panjang.</p>
                <p>Ini adalah bagian ketiga dari konten panjang.</p>
                <p>Ini adalah bagian keempat dari konten panjang.</p>
                <p>Ini adalah bagian kelima dari konten panjang.</p>
                <p>Konten ini bisa terus bertambah sesuai kebutuhan Anda.</p>
              </div>
            </div>
          </div>
          
</div>

          
    </main>

    <button id="scrollToTopBtn"
        class="fixed bottom-6 right-8 bg-[#405D72] text-white px-3 pt-2 pb-2 rounded-full shadow-lg place-content-center hover:bg-indigo-600 transition duration-300 hidden"
        onclick="scrollToTop()">
        <ion-icon name="arrow-up-circle-outline" class="h-6 w-6"></ion-icon>
    </button>
    <button
    class="mt-[-10px] w-[80px] h-[40px] bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#56e743] hover:scale-105 ml-auto mr-[150px]"
    onclick="window.location.href='/Pengolahan_6'">
    NEXT
</button>

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
