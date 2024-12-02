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
    <main class="content flex-grow mb-5 mt-4 pt-28 px-12 mx-24"> <!-- Gunakan padding top sesuai tinggi header -->
        <div class="bg-gray-300 rounded-md">
            <div class="font-poppins font-normal text-base ml-5 p-2">Informasi</div>
            <div class="font-poppins font-light text-sm pb-2 ml-10">Dengan data yang tersedia, User dapat menentukan rentang waktu yang diinginkan untuk melihat tren penjualan. User melakukan input Minimum Support dan Minimum Confident</div>
        </div>
        <form action="{{ route('olahdata.kelompok-hari') }}" method="get">
            <div class="border border-black rounded-md mt-2 p-4 ">
                <div class="grid grid-cols-2 grid-flow-row gap-y-2">
                    <div class="font-poppins font-normal text-base">Kolom yang dibutuhkan: </div>
                    <div class="">
                        <textarea class="pl-3 py-2 font-poppins font-normal text-base border  border-black rounded-md w-full h-24 resize-none">daftar item kolom </textarea>
                    </div>
                    <div class="font-poppins font-normal text-base">Rentang waktu (hari)</div>
                    <div class="">
                        <input type="number" class="pl-3 py-2  border  border-black rounded-md" name="hari">
                    </div>
                    <div class="font-poppins font-normal text-base">Minimum Support</div>
                    <div class="">
                        <input type="number" class="pl-3 py-2  border  border-black rounded-md" name="min_sup">
                    </div>
                    <div class="font-poppins font-normal text-base">Minimum Confident</div>
                    <div class="">
                        <input type="number" class="pl-3 py-2 font-normal text-base  border  border-black rounded-md" name="min_conf">
                    </div>
                </div>
            </div>
            <div class="flex place-content-end">
                <button
                    class="mt-5 px-5 py-2 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#56e743] hover:scale-105" type="submit">NEXT</button>
            </div>
        </form>
    </main>
    <x-buttonScroll />
   
    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}
</body>
