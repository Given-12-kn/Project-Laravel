<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Keluhan</title>
    @vite('resources/css/app.css')
    <style>
        /* Animasi untuk button */
        .btn-send:hover {
            background-color: #38a169;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-send {
            transition: all 0.3s ease;
        }

        /* Animasi Fade */
        .fade-in {
            animation: fadeIn 0.8s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] min-h-screen">

    <div class="header-container p-4">
        <div class="flex justify-between items-center">
            <!-- Tombol Kembali -->
            <a href="/keluhan" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-400 transition-colors">
                Back
            </a>
            
            <!-- Judul -->
            <h1 class="text-3xl font-bold text-center flex-1">Detail Keluhan</h1>
            
            <!-- Placeholder untuk menjaga tata letak agar tombol dan judul tetap seimbang -->
            <div class="w-[84px]"></div>
        </div>
    </div>

    <!-- Card Detail Keluhan -->
    <div class="p-8 flex justify-center items-center">
        <div id="detailKeluhanCard" class="bg-white shadow-lg rounded-lg max-w-3xl w-full p-6 opacity-0 scale-95 transition-all duration-500 ease-in-out">
            <!-- Judul Keluhan -->
            <h2 class="text-2xl font-semibold mb-4 text-center">Judul Keluhan</h2>
            
            <!-- Isi Keluhan -->
            <p class="text-gray-700 leading-relaxed mb-4">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos incidunt maiores ullam fuga atque harum obcaecati officiis, ipsa ad dolorem.
            </p>
        </div>
    </div>

    <!-- Card Jawaban -->
    <div class="p-8 flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-lg max-w-3xl w-full p-6 fade-in">
            <h3 class="text-2xl">respon</h3> <br>
            <span>Jawaban dari dosen akan ditampilkan disini</span>
        </div>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sendButton = document.getElementById('sendButton');
            const replyInput = document.getElementById('replyInput');

            // Tambahkan event listener untuk tombol "Send"
            sendButton.addEventListener('click', () => {
                const replyContent = replyInput.value.trim();

                if (!replyContent) {
                    alert('Mohon isi jawaban terlebih dahulu.');
                    return;
                }

                // Animasi pengiriman data
                sendButton.innerText = 'Sending...';
                sendButton.disabled = true;

                // Simulasikan pengiriman data menggunakan AJAX
                setTimeout(() => {
                    // Simulasikan AJAX berhasil
                    alert('Jawaban berhasil dikirim!');
                    sendButton.innerText = 'Send';
                    sendButton.disabled = false;
                    replyInput.value = ''; 
                }, 2000);
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const detailKeluhanCard = document.getElementById('detailKeluhanCard');

            setTimeout(() => {
                detailKeluhanCard.classList.remove('opacity-0', 'scale-95'); 
            }, 100); 
        });
    </script>
</body>
</html>
