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

    <!-- Main Content -->
    <main class="content flex-grow mb-8 mt-4 pt-28 px-12"> <!-- Gunakan padding top sesuai tinggi header -->
        <div class="flex place-content-center font-poppins font-medium text-2xl">TABEL TRANSAKSI PIZZA</div>
        <div class="border border-black rounded-md mt-3 mx-24 p-4 ">
            #tampilkan tabel pizza
            {{-- <table class="rounded-md w-full text-sm text-left rtl:text-right text-black border border-black">
                <thead class="text-xs text-white uppercase bg-blue-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Tanggal-Waktu</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Harga Produk</th>
                        <th scope="col" class="px-6 py-3">Jumlah</th>
                        <th scope="col" class="px-6 py-3">Total Pembelian</th>
                        <th scope="col" class="px-6 py-3">Metode Pembelian</th>
                        <th scope="col" class="px-6 py-3">Nama Pembeli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ $index }}
                                @php
                                    $index += 1;
                                @endphp
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                {{ $order->order_time->isoFormat('dddd D/MM/YYYY - HH.mm') }}
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                {{ $order->product->type->name }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ Number::currency($order->price, in: 'idr') }}
                            </th>
                            <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                {{ WeightConverter::convert($order->quantity_kg) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ Number::currency($order->price * $order->quantity_kg, in: 'idr') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ ucwords($order->payment_proof) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ strtok($order->buyer->name, ' ') }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <div class="flex place-content-end">
            <button
                class="mx-24 mt-5 px-5 py-2 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#56e743] hover:scale-105"
                onclick="request()->is('/pengolahan')">OLAH</button>
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
