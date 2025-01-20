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
        <div class="bg-white shadow-lg rounded-lg max-w-3xl w-full p-6">
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
            <!-- Input Jawaban -->
            <textarea id="replyInput" rows="4" class="w-full border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Tulis jawaban Anda di sini..."></textarea>
            
            <!-- Tombol Kirim -->
            <button id="sendButton" class="btn-send bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-400 transition-colors">
                Send
            </button>
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
                    replyInput.value = ''; // Kosongkan input
                }, 2000);
            });
        });
    </script>
</body>
</html>
