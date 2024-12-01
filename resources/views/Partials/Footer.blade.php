<footer class="bg-[#D9D9D9] text-black py-1 shadow-t-lg mt-5">
    <div class="container mx-auto grid grid-cols-3 gap-4 justify-between">
        <!-- Box 1 -->
        <div class="p-4">
            <div class="md:pl-[116px]">
                <p class="text-sm font-bold">Universitas Sanata Dharma</p>
                <p class="text-sm font-bold">Dosen Pembimbing</p>
                <p class="text-sm font-bold">Dr. Ir. Anastasia Rita Widiarti</p>
            </div>
        </div>


        <!-- Box 2 -->
        <div class="p-4">
            <div class="grid grid-cols-3 place-items-center">
                <div class="">
                    <p class="text-sm font-bold text-black">
                        <a href="link-to-data-page" class="hover:underline">Lihat Data</a>
                    </p>
                </div>
                <div class="">
                    <p class="text-sm font-bold text-black">
                        <a href="link-to-processing-page" class="hover:underline">Pengolahan</a>
                    </p>
                </div>
                <div class="">
                    <p class="text-sm font-bold text-black">
                        <a href="link-to-results-page" class="hover:underline">Hasil</a>
                    </p>
                </div>

            </div>
        </div>


        <!-- Box 3 -->
        <div class=" p-4 rounded-lg">
            <div class="grid grid-row-2 place-items-center">
                <div class="">
                    <p class="text-sm font-bold">Developer</p>
                </div>
                <div class="grid-start-2">
                    <div class="flex flex-grow space-x-5">
                        <a href="https://www.instagram.com/gregoriusangger93/" target="_blank">
                            <img src="{{ asset('./images/angger.png') }}" alt="Image 1"
                                class="w-14 h-14 rounded-full border-2 ">
                        </a>
                        <a href="https://www.instagram.com/vikodwiatmaka/" target="_blank">
                            <img src="{{ asset('./images/viko.png') }}" alt="Image 2"
                                class="w-14 h-14 rounded-full border-2  ">
                        </a>
                        <a href="https://www.instagram.com/fclns_brianziregar/ target="_blank">
                            <img src="{{ asset('./images/brian.png') }}" alt="Image 3"
                                class="w-14 h-14 rounded-full border-2 ">
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    /* Add Poppins font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    .font-poppins {
        font-family: 'Poppins', sans-serif;
    }
</style>