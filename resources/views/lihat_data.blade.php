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
        @include('Partials.header') {{-- Sesuaikan jalur folder --}}
    </header>

    <!-- Main Content -->
    <main class="content flex-grow mb-8 mt-4 pt-28 px-12 mx-24"> <!-- Gunakan padding top sesuai tinggi header -->
        <div class="flex place-content-center font-poppins font-medium mt-2 text-2xl">TABEL TRANSAKSI PIZZA</div>
        <div class="border border-black rounded-md mt-5 p-4 overflow-auto" style="max-height: 420px;">
            <div class="container mt-5">
                <div class="card">
                    <h1>Data CSV yang Dibaca</h1>

                    <!-- Tampilkan tabel data -->
                    <table border="1" class="w-full">
                        <thead>
                            <tr>
                                @foreach ($title as $subtitle)
                                    <th class="px-4 py-2">{{ $subtitle }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paginatedData as $row)
                                <tr>
                                    @foreach ($row as $data)
                                        <td class="px-4 py-2">{{ $data }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    

                </div>
            
            </div>

        </div>
<!-- Menampilkan angka tab di bawah tabel -->
<div class="pagination mt-4 flex justify-center">
    <ul class="flex space-x-2">
        @for ($i = 1; $i <= 10; $i++)
            <li>
                <a href="{{ route('dataTampil', ['page' => $i]) }}"
                    class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 {{ $i == request('page', 1) ? 'bg-blue-500 text-white' : 'text-black' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor
    </ul>
</div>
        <div class="flex place-content-end">
            <button
                class="mt-5 px-5 py-2 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#56e743] hover:scale-105"
                onclick="window.location.href = '{{ route('olahdata.input') }}'">OLAH</button>
        </div>
    </main>

    <button id="scrollToTopBtn"
        class="fixed bottom-6 right-8 bg-[#405D72] text-white px-3 pt-2 pb-2 rounded-full shadow-lg place-content-center hover:bg-indigo-600 transition duration-300 hidden"
        onclick="scrollToTop()">
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
