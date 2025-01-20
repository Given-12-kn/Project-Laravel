@extends('layout.template')
@section('no-headerAdmin', true)

@section('title', 'Live Session')

@section('content')

<nav class="bg-blue-600 text-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div>
                <div class="text-lg font-bold">
                    {{ Auth::user()->nama }}
                </div>
                <div class="text-sm text-gray-200">
                    {{ now()->format('d M Y') }}
                </div>
            </div>
            <!-- Menu untuk layar besar -->
            <div class="hidden md:flex space-x-4">
                <a href="#" class="hover:underline">Q&A</a>
                <a href="#" class="hover:underline">Polls</a>
                <a href="#" class="hover:underline">Share</a>
                <a href="#" class="bg-green-500 px-3 py-1 rounded hover:bg-green-400">Chat Room</a>
            </div>
            <!-- Tombol menu untuk layar kecil -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white">
                    &#8942;
                </button>
            </div>
        </div>
        <!-- Dropdown menu untuk layar kecil -->
        <div id="menu" class="hidden md:hidden flex flex-col space-y-2">
            <a href="#" class="hover:underline">Q&A</a>
            <a href="#" class="hover:underline">Polls</a>
            <a href="#" class="hover:underline">Share</a>
            <a href="#" class="bg-green-500 px-3 py-1 rounded hover:bg-green-400">Present Mode</a>
        </div>
    </div>
</nav>

<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex" style="min-height: calc(100vh - 50px)">
    <div class="flex-1 p-4">
        <!-- Live Chat Section -->
        <h1 class="text-2xl font-bold mb-4">Live Chat</h1>
        <div id="chat-container">
            <div id="main-chat-box" class="border border-gray-300 rounded-md p-4 h-24 bg-white mb-4 flex justify-between items-center">
                <!-- Main chat message will appear here -->
                <span id="main-message-text"></span>
                <button id="upvote-button" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-400">Upvote</button>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-2" id="dynamic-chat-container">
            <!-- Messages waiting in queue will be added here -->
        </div>
        <div class="mt-4">
            <textarea id="chat-input" class="border border-gray-300 rounded-md w-full p-2 h-20 resize-none" placeholder="Type your message here..."></textarea>
            <button id="add-button" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2 w-full hover:bg-blue-400">Send</button>
        </div>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    #main-chat-box {
        background-color: #fffbcc;
        color: #333;
        font-weight: bold;
        border: 2px solid #ffc107;
    }

    #dynamic-chat-container div {
        background-color: #f0f4f8;
        color: #555;
        font-size: 0.9rem;
        border: 1px solid #ccc;
        padding: 8px;
        margin-bottom: 8px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #dynamic-chat-container div:hover {
        background-color: #e0e7ee;
    }
</style>

<script>
    const addButton = document.getElementById('add-button');
    const chatInput = document.getElementById('chat-input');
    const dynamicChatContainer = document.getElementById('dynamic-chat-container');
    const mainMessageText = document.getElementById('main-message-text');
    const upvoteButton = document.getElementById('upvote-button');

    const sendMessage = (messageText) => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch("{{ route('live.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                content: messageText
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Message stored:', data);
        })
        .catch(error => {
            console.error('Error storing message:', error);
        });
    };

    addButton.addEventListener('click', () => {
        const messageText = chatInput.value.trim();
        if (messageText === '') return;

        const messageElement = document.createElement('div');
        messageElement.textContent = messageText;
        messageElement.style.opacity = '0';
        messageElement.style.transform = 'translateY(20px)';

        dynamicChatContainer.appendChild(messageElement);

        setTimeout(() => {
            messageElement.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
            messageElement.style.opacity = '1';
            messageElement.style.transform = 'translateY(0)';
        }, 50);

        if (dynamicChatContainer.children.length === 1 && mainMessageText.textContent === '') {
            setTimeout(() => {
                mainMessageText.textContent = messageText;
                dynamicChatContainer.removeChild(messageElement);
            }, 600);
        }

        sendMessage(messageText);

        chatInput.value = '';
    });

    upvoteButton.addEventListener('click', () => {
        const firstMessage = dynamicChatContainer.firstElementChild;
        if (!firstMessage) return;

        const messageText = firstMessage.textContent;

        firstMessage.style.transition = 'transform 0.5s ease, opacity 0.5s ease';
        firstMessage.style.transform = 'translateY(-20px)';
        firstMessage.style.opacity = '0';

        setTimeout(() => {
            mainMessageText.textContent = messageText;
            dynamicChatContainer.removeChild(firstMessage);
        }, 500);
    });
</script>

@endsection
