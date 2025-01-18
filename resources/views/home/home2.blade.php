@extends('layout.template')

@section('title', 'Home')

@section('no-headerAdmin', true)

@section('content')
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] flex flex-col items-center justify-center py-10" >

    <h1 class="text-5xl font-semibold text-center mb-4 mt-8">Open Talk</h1>

    <p class="text-center text-justify-center text-gray-600 mt-10 mb-20 mx-14 md:mx-24 lg:mx-56 font-semibold">
        Sebuah platform interaktif yang dirancang khusus untuk mahasiswa dalam menyampaikan keluhan, berbagi pandangan, dan berdiskusi secara konstruktif. Open Talk memberikan ruang bagi setiap suara untuk didengar, menjembatani komunikasi antara mahasiswa dan pihak terkait. Di sini, Anda dapat menyampaikan ide, menemukan solusi bersama, dan menciptakan perubahan positif bagi komunitas kampus. Kami percaya, dengan dialog yang terbuka dan saling mendukung, setiap tantangan dapat diatasi."
    </p>

    <div class="relative w-4/5 overflow-hidden">
        <div id="card-slider" class="flex items-center  transition-transform duration-500 ease-in-out">
            @for ($i = 1; $i <= 10; $i++)
            <div class="card relative flex-shrink-0 w-1/3 bg-white shadow-lg rounded-lg p-4 transform transition-all duration-500 ease-in-out">
                <div class="absolute top-2 right-2 bg-gradient-to-r from-blue-300 to-blue-500 text-white rounded-full px-3 py-1 flex items-center space-x-2 shadow-md">
                    <ion-icon name="thumbs-up" class="text-xl"></ion-icon>
                    <span class="text-sm font-bold">{{ $i }}</span>
                </div>
                <h3 class="text-lg font-semibold text-center mb-2 mt-14">Judul keluhan {{ $i }}</h3>
                <p class="text-sm text-gray-500 text-center break-words">ini hanyalah deskripsi, ini hanyalah deskripsi, ini hanyalah deskripsi, ini hanyalah deskripsi, ini hanyalah deskripsi</p>
            </div>
            @endfor
        </div>
    </div>
    

    
    <div class="mt-8 mb-40 flex justify-center">
        <a href="/your-link-here" class="bg-blue-400 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-500 transition-transform transform hover:scale-105 duration-300">Add Keluhan</a>
    </div>

    <div>
      <p class="text-4xl font-semibold mb-4 text-center">Proses Keluhan</p>
    </div>

    <div class="mt-12 mb-20 flex flex-col lg:flex-row justify-center items-start w-full px-10">
        <!-- Gambar -->
        <div class="flex-shrink-0 mb-8 w-full lg:w-1/2 bg-white shadow-lg rounded-lg p-6" lg:mb-0>
            <img id="guide-image" src="{{ asset('step1.png') }}" alt="Guide Step" class="w-full rounded-lg ">
        </div>
    
        <!-- Langkah-langkah -->
        <div class="lg:ml-6 lg:w-1/2 w-full">
            <!-- Langkah 1 -->
            <div class="flex flex-col mb-4 step-container" data-step="1">
                <div class="flex items-center cursor-pointer" onclick="activateStep(1)">
                    <div class="w-0.5 h-16 bg-gray-300 mr-4 transition-all duration-500 ease-in-out step-line"></div>
                    <p class="text-gray-600 font-medium step-title">Discover real product opportunities</p>
                </div>
                <div class="pl-6 border-l-2 border-transparent opacity-0 step-description" id="desc-1">
                    <p class="text-gray-500">Description for step 1: This is where you discover product opportunities by understanding the market and user needs.</p>
                </div>
            </div>
    
            <!-- Langkah 2 -->
            <div class="flex flex-col mb-4 step-container" data-step="2">
                <div class="flex items-center cursor-pointer" onclick="activateStep(2)">
                    <div class="w-0.5 h-16 bg-gray-300 mr-4 transition-all duration-500 ease-in-out step-line"></div>
                    <p class="text-gray-600 font-medium step-title">Accelerate product discovery with user feedback</p>
                </div>
                <div class="pl-6 border-l-2 border-transparent opacity-0 step-description" id="desc-2">
                    <p class="text-gray-500">Description for step 2: Leverage user feedback to improve and refine your product faster.</p>
                </div>
            </div>
    
            <!-- Langkah 3 -->
            <div class="flex flex-col mb-4 step-container" data-step="3">
                <div class="flex items-center cursor-pointer" onclick="activateStep(3)">
                    <div class="w-0.5 h-16 bg-gray-300 mr-4 transition-all duration-500 ease-in-out step-line"></div>
                    <p class="text-gray-600 font-medium step-title">Navigate problem spaces with confidence</p>
                </div>
                <div class="pl-6 border-l-2 border-transparent opacity-0 step-description" id="desc-3">
                    <p class="text-gray-500">Description for step 3: Develop confidence in addressing complex challenges through structured analysis.</p>
                </div>
            </div>
    
            <!-- Langkah 4 -->
            <div class="flex flex-col mb-4 step-container" data-step="4">
                <div class="flex items-center cursor-pointer" onclick="activateStep(4)">
                    <div class="w-0.5 h-16 bg-gray-300 mr-4 transition-all duration-500 ease-in-out step-line"></div>
                    <p class="text-gray-600 font-medium step-title">Align solutions to genuine user desires</p>
                </div>
                <div class="pl-6 border-l-2 border-transparent h-0 opacity-0 step-description" id="desc-4">
                    <p class="text-gray-500">Description for step 4: Ensure your solutions truly meet user needs and drive value.</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>


<script>
    const slider = document.getElementById("card-slider");
    const cards = document.querySelectorAll(".card");
    let currentIndex = 1; 
    let autoSlideInterval; 
    let isDragging = false;
    let startX = 0;
    let currentX = 0;

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
        if (currentIndex > cards.length - 1) currentIndex = 1; 
        updateCards();
    }

    function autoSlide() {
        autoSlideInterval = setInterval(() => {
            slideTo(currentIndex + 1);
        }, 3000); 
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    function handleTouchStart(e) {
        startX = e.touches[0].clientX;
    }

    function handleTouchMove(e) {
        currentX = e.touches[0].clientX;
    }

    function handleTouchEnd() {
        const distance = currentX - startX;
        if (distance > 50) {
            slideTo(currentIndex - 1); 
        } else if (distance < -50) {
            slideTo(currentIndex + 1); 
        }
    }

    function handleMouseDown(e) {
        isDragging = true;
        startX = e.clientX;
    }

    function handleMouseMove(e) {
        if (!isDragging) return;
        currentX = e.clientX;
    }

    function handleMouseUp() {
        if (!isDragging) return;
        isDragging = false;
        const distance = currentX - startX;
        if (distance > 50) {
            slideTo(currentIndex - 1); 
        } else if (distance < -50) {
            slideTo(currentIndex + 1); 
        }
    }


    slider.addEventListener("touchstart", handleTouchStart);
    slider.addEventListener("touchmove", handleTouchMove);
    slider.addEventListener("touchend", handleTouchEnd);

    slider.addEventListener("mousedown", handleMouseDown);
    slider.addEventListener("mousemove", handleMouseMove);
    slider.addEventListener("mouseup", handleMouseUp);
    slider.addEventListener("mouseleave", handleMouseUp);

    updateCards();
    autoSlide();

// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   
    document.addEventListener("DOMContentLoaded", () => {
    activateStep(1); 
    });

    function activateStep(step) {
        const stepContainers = document.querySelectorAll(".step-container");
        stepContainers.forEach((container) => {
            const stepLine = container.querySelector(".step-line");
            const stepDescription = container.querySelector(".step-description");

            stepDescription.classList.remove("transition-all", "duration-300", "ease-in-out", "opacity-100", "h-auto");
            stepDescription.classList.add("opacity-0", "h-0", "border-transparent");

            if (parseInt(container.dataset.step) === step) {
                stepLine.classList.remove("bg-gray-300");
                stepLine.classList.add("bg-black");

                setTimeout(() => {
                    stepDescription.classList.remove("opacity-0", "h-0", "border-transparent");
                    stepDescription.classList.add("transition-all", "duration-300", "ease-in-out", "opacity-100", "h-auto", "border-black");
                }, 0);
            } else {
                stepLine.classList.add("bg-gray-300");
                stepLine.classList.remove("bg-black", "w-1");
                
            }
        });
    }
</script>
  
  
  

<style>
    #card-slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .card {
        flex-shrink: 0;
        widows: 33.33%;
        box-sizing: border-box;
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
