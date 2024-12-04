<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        .typing {
            color: #EA5455;
            font-weight: bold;
        }

        .typed {
            color: black;
        }

        .hidden {
            opacity: 0;
            transform: scale(0.9);
            pointer-events: none;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .visible {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">
    <header class="fixed top-0 left-0 w-full bg-white text-black border border-red shadow-lg z-10 h-28">
        @include('Partials.header') {{-- Sesuaikan jalur folder --}}
    </header>

    <main class="content flex-grow mb-8 mt-4 pt-28 px-12">
        <div class="flex flex-wrap">
            <div class="w-full md:w-3/5 p-4">
                <h2 class="text-6xl font-bold mb-4 ml-16 mt-4">Analisis Tren</h2>
                <h2 class="text-6xl font-bold mb-4 ml-16">Menu Pizza</h2>
                <p id="typingText" class="text-2xl ml-16 mr-16"></p>
                <button id="nextButton" onclick="window.location.href='/lihatdata'"
                    class="ml-80 mt-12 border border-gray px-6 py-3 bg-[#EA5455] rounded-lg text-white font-semibold transition ease-in-out duration-300 transform hover:bg-[#19A7CE] hover:scale-105 hidden">
                    NEXT
                </button>
            </div>

            <div class="w-full md:w-2/5 p-4 flex items-center justify-center">
                <img src="{{ asset('./images/gambar 1.png') }}" alt="gambar 1r" class="max-w-full h-auto rounded-lg">
            </div>
        </div>
    </main>
    <x-buttonScroll />

    @include('Partials.Footer') {{-- Sesuaikan jalur folder --}}

    <script>
        const textContent =
            "Sebuah sistem pendukung pemberian keputusan untuk menganalisa tren dalam rentang waktu yang dapat ditentukan sehingga akan membantu membuat strategi dalam meningkatkan usaha penjualan pizza anda.";
        const typingText = document.getElementById("typingText");
        const nextButton = document.getElementById("nextButton");

        function typeEffectPerWord(text, element, delay = 25) {
            const words = text.split(" ");
            let wordIndex = 0;

            function typeWord() {
                if (wordIndex < words.length) {
                    const wordSpan = document.createElement("span");
                    wordSpan.classList.add("typing");

                    element.appendChild(wordSpan);

                    let charIndex = 0;
                    function typeChar() {
                        if (charIndex < words[wordIndex].length) {
                            wordSpan.textContent += words[wordIndex][charIndex];
                            charIndex++;
                            setTimeout(typeChar, delay);
                        } else {
                            wordSpan.classList.remove("typing");
                            wordSpan.classList.add("typed");

                            if (wordIndex < words.length - 1) {
                                element.appendChild(document.createTextNode(" "));
                            }

                            wordIndex++;
                            setTimeout(typeWord, delay);
                        }
                    }

                    typeChar();
                } else {
                    // Tampilkan tombol NEXT dengan transisi halus
                    nextButton.classList.remove("hidden");
                    nextButton.classList.add("visible");
                }
            }

            typeWord();
        }

        document.addEventListener("DOMContentLoaded", () => {
            typeEffectPerWord(textContent, typingText, 25);
        });
    </script>
</body>
