<header class="bg-white-800 text-black py-5 px-3 flex items-center justify-center">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="absolute flex items-center left-20">
            <img src="{{ asset('./images/logo.png') }}" alt="Logo" class="h-15"> <!-- Increased image size by 50% -->
        </div>

        <!-- Navigation -->
        <nav class="flex gap-8 items-center justify-center flex-grow">
            <a href="/" :active="request() - > is('/')"
                class="text-lg font-semibold hover:text-gray-400 transition text-black font-poppins">
                Home
            </a>
            <a href="/lihatdata" :active="request() - > is('/lihatdata')"
                class="text-lg font-semibold hover:text-gray-400 transition text-black font-poppins">
                Lihat Data
            </a>
            <a href="{{ route('olahdata.input') }}"
                class="text-lg font-semibold hover:text-gray-400 transition text-black font-poppins">
                Pengolahan
            </a>


            <a href="/hasil" :active="request() - > is('/hasil')"
                class="text-lg font-semibold hover:text-gray-400 transition text-black font-poppins">
                Hasil
            </a>
        </nav>
    </div>
</header>

<style>
    /* Add Poppins font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    .font-poppins {
        font-family: 'Poppins', sans-serif;
    }
</style>
