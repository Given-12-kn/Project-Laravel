@extends('layout.template')
@section('no-headerAdmin', true)
@section('no-headerDosen', true)
@section('title', 'Live Session')

@section('content')



<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex w-full" style="min-height: calc(100vh - 50px)">
    <div class="w-3/4 mx-auto">
        <div class="flex-1 p-4">
            <!-- Live Chat Section -->
            <h1 class="text-2xl font-bold mb-4 text-center mt-8 mb-8">Live Chat</h1>
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
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const addButton = document.getElementById('add-button');
    const chatInput = document.getElementById('chat-input');
    const dynamicChatContainer = document.getElementById('dynamic-chat-container');
    const mainMessageText = document.getElementById('main-message-text');
    const upvoteButton = document.getElementById('upvote-button');

    // const sendMessage = (messageText) => {
    //     fetch("{{ route('live.store') }}", {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': {{ csrf_token() }},
    //         },
    //         body: JSON.stringify({
    //             content: messageText
    //         }),
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         console.log('Message stored:', data);
    //     })
    //     .catch(error => {
    //         console.error('Error storing message:', error);
    //     });
    // };
    var myurl = "<?php echo URL::to('/'); ?>";

    $(document).ready(function () {
        $('#add-button').on('click', function (e) {
            e.preventDefault();
            console.log('Button clicked' + chatInput.value);
            $.ajax({
            method: "POST",
            url: myurl + "/live/store",
            data: {
                    _token: '{{ csrf_token() }}',
                    content: chatInput.value
                },
            success: function (response) {
                console.log('Message stored:', response);
                chatInput.value = '';
            },
            error: function () {
                alert('Error storing message');
            }
        });

        });

    });

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

    });

    upvoteButton.addEventListener('click', () => {
        const firstMessage = dynamicChatContainer.firstElementChild;
        if (!firstMessage){
            setTimeout(() => {
                mainMessageText.textContent = "";
            }, 500);
            return;
        }

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
@endsection