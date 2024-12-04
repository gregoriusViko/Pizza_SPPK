<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Transaksi Pizza</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        /* Full-screen loading spinner */
        #loading-spinner {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.9);
            z-index: 50;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
        animation: spin 1s linear infinite;
        will-change: transform;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


        @keyframes rotator {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(270deg);
            }
        }

        .path {
            stroke-dasharray: 187;
            stroke-dashoffset: 0;
            transform-origin: center;
            animation:
                dash 1.4s ease-in-out infinite,
                colors 5.6s ease-in-out infinite;
        }

        @keyframes colors {
            0% {
                stroke: #4285F4;
            }

            25% {
                stroke: #DE3E35;
            }

            50% {
                stroke: #F7C223;
            }

            75% {
                stroke: #1B9A59;
            }

            100% {
                stroke: #4285F4;
            }
        }

        @keyframes dash {
            0% {
                stroke-dashoffset: 187;
            }

            50% {
                stroke-dashoffset: 46.75;
                transform: rotate(135deg);
            }

            100% {
                stroke-dashoffset: 187;
                transform: rotate(450deg);
            }
        }

        /* Hide main content until loading is complete */
        body.loading main {
            display: none;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col loading">
    <!-- Loading Spinner -->
    <div id="loading-spinner" class="fixed inset-0 bg-white flex justify-center items-center">
        <div class="spinner border-t-4 border-b-4 border-red-500 rounded-full w-12 h-12"></div>
    </div>

    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-white text-black border border-red shadow-lg z-10 h-28">
        @include('Partials.header') {{-- Sesuaikan jalur folder --}}
    </header>

    <!-- Main Content -->
    <main class="content flex-grow mb-5 mt-4 pt-28 px-12 mx-24">
        <div class="font-poppins font-medium text-xl">TABEL TRANSAKSI PIZZA per {{ $request->hari }} hari</div>

        <div class="border border-black rounded-md mt-3 p-4 ">
            @php
                $i = 1;
            @endphp

            @foreach ($paginated as $kelompok)
                <h1>Tabel kelompok ke {{ $i++ }}</h1>
                <table border="1">
                    <thead>
                        <tr>
                            @foreach ($title as $subtitle)
                                <th>{{ $subtitle }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelompok as $row)
                            <tr>
                                @foreach ($row as $data)
                                    <td>{{ gettype($data) != 'object' ? $data : $data->format('d-m-Y') }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
        <form action="{{ route('olahdata.data-tabular') }}" method="get">
            <div class="flex place-content-end">
                <input type="hidden" name="hari" value="{{ $request->hari }}">
                <input type="hidden" name="min_sup" value="{{ $request->min_sup }}">
                <input type="hidden" name="min_conf" value="{{ $request->min_conf }}">
                <button
                    class="mt-5 px-5 py-2 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#56e743] hover:scale-105"
                    type="submit">NEXT</button>
            </div>
        </form>
    </main>
    <x-buttonScroll />
    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}

    <script>
        window.addEventListener("load", function() {
            // Hilangkan spinner setelah data selesai dimuat
            document.getElementById("loading-spinner").style.display = "none";
            document.body.classList.remove("loading");
        });
    </script>
</body>

</html>
