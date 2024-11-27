<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
    @include('partials.header') {{-- Sesuaikan jalur folder --}}

    <div class="content flex-grow">
        <h1 class="text-2xl font-bold">content</h1> 
    </div>

    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}
</body>
