<!-- resources/views/components/button-scroll.blade.php -->
<div>
    <button id="scrollToTopBtn"
        class="fixed bottom-20 right-8 bg-[#405D72] text-white px-3 pt-2 pb-2 rounded-full shadow-lg place-content-center hover:bg-indigo-600 transition duration-300 hidden"
        onclick="scrollToTop()">
        <ion-icon name="arrow-up-circle-outline" class="h-6 w-6"></ion-icon>
    </button>
    
    <button id="scrollToDownBtn"
        class="fixed bottom-6 right-8 bg-[#405D72] text-white px-3 pt-2 pb-2 rounded-full shadow-lg place-content-center hover:bg-indigo-600 transition duration-300 hidden"
        onclick="scrollToDown()">
        <ion-icon name="arrow-down-circle-outline" class="h-6 w-6"></ion-icon>
    </button>

    <script>
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        const scrollToDownBtn = document.getElementById("scrollToDownBtn");

        // Tampilkan tombol saat pengguna scroll ke bawah
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                scrollToTopBtn.classList.remove("hidden");
                scrollToDownBtn.classList.remove("hidden");
            } else {
                scrollToTopBtn.classList.add("hidden");
                scrollToDownBtn.classList.add("hidden");
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        }

        function scrollToDown() {
            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: "smooth",
            });
        }
    </script>
</div>
