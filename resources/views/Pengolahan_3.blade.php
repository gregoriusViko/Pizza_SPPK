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

    <main class="content flex-grow mb-5 mt-4 pt-28 px-12 mx-24"> <!-- Gunakan padding top sesuai tinggi header -->
        <h2 class="text-xl font-semibold text-black mb-4">Transformation Tabular</h2>
        <div class="overflow-x-auto max-h-[340px]"> <!-- Scroll horizontal ditambahkan -->
            <!-- Tabel dengan kolom Pizza1 hingga Pizza7 dan scroll horizontal -->
            <table class="min-w-full max-w-full bg-[#746868] text-white border border-gray-300">

                <thead class="sticky top-0 bg-[#5f4b44]"> <!-- Sticky untuk baris pertama -->
                    <tr>
                        <th class="px-1 py-2 border-b text-sm font-semibold"> </th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza1</th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza2</th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza3</th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza4</th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza5</th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza6</th>
                        <th class="px-1 py-2 border-b text-sm font-semibold">Pizza7</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 1; $i <= 53; $i++)
                        <!-- Iterasi minggu -->
                        <tr class="hover:bg-[#8c7368]">
                            <td class="px-1 py-2 border-b">Minggu {{ $i }}</td>
                            <td class="px-1 py-2 border-b"></td>
                            <td class="px-1 py-2 border-b"></td>
                            <td class="px-1 py-2 border-b"></td>
                            <td class="px-1 py-2 border-b"></td>
                            <td class="px-1 py-2 border-b"></td>
                            <td class="px-1 py-2 border-b"></td>
                            <td class="px-1 py-2 border-b"></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </main>

    <x-buttonScroll />
    <button
    class="mt-[-10px] w-[80px] h-[40px] bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#56e743] hover:scale-105 ml-auto mr-[150px]"
    onclick="window.location.href='/Pengolahan_4'">
    NEXT
</button>

    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}
</body>
