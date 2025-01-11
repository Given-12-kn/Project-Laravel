@extends('layout.template')

@section('title', 'Home')

@section('content')
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex flex-col items-center justify-center py-10" style="height: 100vh ">

    <h1 class="text-3xl font-bold text-center mb-4">Judul</h1>

    <p class="text-center text-gray-600 mb-8">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet lorem ut nisi fringilla accumsan.
    </p>

    <div class="relative w-4/5 overflow-hidden">
  
        <div id="card-slider" class="flex items-center space-x-4 transition-transform duration-500 ease-in-out">
            @for ($i = 1; $i <= 10; $i++)
            <div class="card relative flex-shrink-0 w-1/3 bg-white shadow-lg rounded-lg p-4 transform transition-all duration-500 ease-in-out">
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-blue-300 rounded-full"></div>
                </div>
                <h3 class="text-lg font-semibold text-center mb-2">Card {{ $i }}</h3>
                <p class="text-sm text-gray-500 text-center">Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            @endfor
        </div>

        <button id="prev" class="absolute top-1/2 left-2 transform -translate-y-1/2 text-3xl text-gray-400 focus:outline-none z-10">
            <ion-icon name="arrow-back"></ion-icon>
        </button>
        <button id="next" class="absolute top-1/2 right-2 transform -translate-y-1/2 text-3xl text-gray-400 focus:outline-none z-10">
            <ion-icon name="arrow-forward"></ion-icon>
        </button>      
  </div>
    <div class="mt-8 flex justify-center">
      <a href="/your-link-here" class="btn-bottom">Add Keluhan</a>
    </div>
    <div>
      <h3 class="text-lg font-semibold mb-4 text-center">Proses Keluhan</h3>
    </div>
    
    <div class="mt-12 flex justify-center items-start w-full px-10">
      
      <div class="flex-shrink-0 w-1/2 bg-white shadow-lg rounded-lg p-6">
          <h3 class="text-lg font-semibold mb-4">Judul Container</h3>
          <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at ultricies lorem.</p>
      </div>
  
      <div class="ml-6 flex-shrink-0">
     
          <ul class="list-disc pl-4">
              <li class="text-gray-600">Step 1: Lorem ipsum dolor sit amet.</li>
              <li class="text-gray-600">Step 2: Consectetur adipiscing elit.</li>
              <li class="text-gray-600">Step 3: Sed do eiusmod tempor.</li>
              <li class="text-gray-600">Step 4: Ut enim ad minim veniam.</li>
          </ul>
      </div>
  </div>
    </div>
</div>


<script>
  const slider = document.getElementById("card-slider");
  const cards = document.querySelectorAll(".card");
  const prevButton = document.getElementById("prev");
  const nextButton = document.getElementById("next");
  let currentIndex = 1; 

  function updateCards() {
      cards.forEach((card, index) => {
          if (index === currentIndex) {
           
              card.style.opacity = "1";
              card.style.transform = "scale(1)";
              card.style.zIndex = "2";
          } else if (index === currentIndex - 1 || index === currentIndex + 1) {
    
              card.style.opacity = "0.5";
              card.style.transform = "scale(0.9)";
              card.style.zIndex = "1";
          } else {
            
              card.style.opacity = "0.2";
              card.style.transform = "scale(0.8)";
              card.style.zIndex = "0";
          }
      });

      const cardWidth = 100 / 3; 
      slider.style.transform = `translateX(-${currentIndex * cardWidth - cardWidth}%)`;
  }

  function slideTo(newIndex) {

      currentIndex = newIndex;
      if (currentIndex < 0) currentIndex = cards.length - 1; 
      if (currentIndex > cards.length - 1) currentIndex = 0; 

      updateCards();
  }

  prevButton.addEventListener("click", () => {
      slideTo(currentIndex - 1); 
  });

  nextButton.addEventListener("click", () => {
      slideTo(currentIndex + 1); 
  });

  updateCards();
</script>


<style>
    #card-slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .card {
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out, z-index 0.5s ease-in-out;
    }

    button {
        z-index: 10;
        cursor: pointer;
    }
    .btn-bottom {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    text-decoration: none; 
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  .btn-bottom:hover {
      background-color: #45a049;
      transform: scale(1.1);
  }
  .container-card {
    background-color: #ffffff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    padding: 20px;
    width: 50%;
}

.list-text {
    margin-left: 20px;
}



.list-text ul {
    list-style-type: disc;
    padding-left: 16px;
    color: #4a4a4a;
}

.list-text li {
    margin-bottom: 8px;
}
h3.text-center {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 1.5rem;
}
</style>
@endsection
