<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dosen Detail Keluhan</title>
    @vite('resources/css/app.css')
    <style>
        .btn-send:hover {
            background-color: #38a169;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-send {
            transition: all 0.3s ease;
        }

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
        
            <a href="/dosen" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-400 transition-colors">
                Back
            </a>
            
            <h1 class="text-3xl font-bold text-center flex-1">Detail Keluhan</h1>
            
            <div class="w-[84px]"></div>
        </div>
    </div>

    <div class="p-8 flex justify-center items-center">
        <div id="detailKeluhanCard" class="bg-white shadow-lg rounded-lg max-w-3xl w-full p-6 opacity-0 scale-95 transition-all duration-500 ease-in-out">
            <!-- Judul Keluhan -->
            <h2 class="text-2xl font-semibold mb-4 text-center">{{ $keluhan->judul_keluhan}}</h2>
            
            <!-- Isi Keluhan -->
            <p class="text-gray-700 leading-relaxed mb-4">
                {{ $keluhan->deskripsi}}
            </p>
        </div>
    </div>

    <div class="pl-8 pr-8 pb-8 flex justify-center items-center">
        <div class="bg-white shadow-lg rounded-lg max-w-3xl w-full p-6 fade-in">
          
            <textarea id="replyInput" rows="4" class="w-full border border-gray-300 rounded-lg p-3 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Tulis jawaban Anda di sini..."></textarea>
            
            <button id="sendButton" class="btn-send bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-400 transition-colors">
                Send
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sendButton = document.getElementById('sendButton');
            const replyInput = document.getElementById('replyInput');

            sendButton.addEventListener('click', () => {
                const replyContent = replyInput.value.trim();

                if (!replyContent) {
                    alert('Mohon isi jawaban terlebih dahulu.');
                    return;
                }

                sendButton.innerText = 'Sending...';
                sendButton.disabled = true;

                setTimeout(() => {
                 
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