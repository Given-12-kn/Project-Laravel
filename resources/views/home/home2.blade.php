@extends('layout.template')

@section('title', 'Home')

@section('content')
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex" style="height: 100vh">
  <div class="w-1/4 flex flex-col items-center bg-gray-200 shadow-lg rounded-lg m-4 p-4" style="height: 90%;">
    <div class="w-full h-full bg-white rounded-lg overflow-hidden flex flex-col">
      <div class="flex-1 overflow-y-auto p-4" id="chat-display">
        <!-- Chat messages will appear here -->
      </div>
      <div class="p-4 bg-gray-100">
        <input type="text" id="chat-input" class="w-full rounded-md p-2 border" placeholder="Type a message...">
        <button id="chat-send" class="mt-2 w-full bg-blue-500 text-white rounded-md p-2">Send</button>
      </div>
    </div>
  </div>
  <div class="flex-1">
    <!-- Main content here -->
  </div>
</div>




<script>
  // Chat functionality
  const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatDisplay = document.getElementById('chat-display');
  
    chatSend.addEventListener('click', () => {
      const message = chatInput.value.trim();
      if (message) {
        const messageElement = document.createElement('div');
        messageElement.className = 'mb-2 p-2 rounded-md bg-blue-300 text-black';
        messageElement.textContent = message;
        chatDisplay.appendChild(messageElement);
        chatInput.value = '';
        chatDisplay.scrollTop = chatDisplay.scrollHeight;
      }
    });
  
    chatInput.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        chatSend.click();
      }
    });
</script>

@endsection
