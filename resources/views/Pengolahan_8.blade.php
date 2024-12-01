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
        <h2 class="text-xl font-semibold text-black mb-4">Tabel Pembentukan Asosiasi</h2>
        {{-- Berikut aturan asosiasi yang  memenuhi aturan minimum support = {} dan minimum confidence = {} --}}

        <div class="bg-[#D9D9D9] p-4 w-full h-96 flex flex-col items-start">
            <h2 class="text-xl text-black mb-4 text-left">
                Berikut aturan asosiasi yang memenuhi aturan minimum support = {} dan minimum confidence = {}
            </h2>
            <h2 class="text-xl  text-black mb-4 text-left">
                Min Confident : { }
            </h2>
            <div class="bg-[#746868] w-[99%] h-70 overflow-y-scroll p-4">
                <table class="table table-bordered table-striped w-full border border-black text-white">
                    <thead class="border border-black">
                        <tr class="border border-black">
                            {{-- @foreach ($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach --}}
                            <th class="border border-black">No</th>
                            <th class="border border-black">Aturan</th>
                            <th class="border border-black">Support</th>
                            <th class="border border-black">Confidence</th>
                        </tr>
                    </thead>
                    <tbody class="border border-black">
                        {{-- @foreach ($data as $row)
                            <tr>
                                @foreach ($columns as $column)
                                    <td>{{ $row[$column] }}</td>
                                @endforeach
                            </tr>
                        @endforeach --}}
                        <tr>
                            <td class="border border-black">1</td>
                            <td class="border border-black">Jika A maka B</td>
                            <td class="border border-black">Nilainya Support</td>
                            <td class="border border-black">Nilainya Conf</td>
                        </tr>
                        <tr>
                            <td class="border border-black">2</td>
                            <td class="border border-black">Jika A maka B</td>
                            <td class="border border-black">Nilainya Support</td>
                            <td class="border border-black">Nilainya Conf</td>
                        </tr>
                        <tr>
                            <td class="border border-black">3</td>
                            <td class="border border-black">Jika A maka B</td>
                            <td class="border border-black">Nilainya Support</td>
                            <td class="border border-black">Nilainya Conf</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <h2 class="text-xl font-bold bg-[#746868] text-white sticky top-0 p-2 text-center">
                Aturan | Confidence
              </h2>
              
              <!-- Konten panjang -->
              <div class="text-white space-y-4">
                <p>Ini adalah bagian pertama dari konten panjang.</p>
                <p>Ini adalah bagian kedua dari konten panjang.</p>
                <p>Ini adalah bagian ketiga dari konten panjang.</p>
                <p>Ini adalah bagian keempat dari konten panjang.</p>
                <p>Ini adalah bagian kelima dari konten panjang.</p>
                <p>Konten ini bisa terus bertambah sesuai kebutuhan Anda.</p>
              </div> --}}
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
        onclick="window.location.href='/Hasil'">
        HASIL
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
