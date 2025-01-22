@extends('layout.template')

@section('title', 'dosen keluhan')

@section('no-headerAdmin', true)
@section('no-header', true)

@section('content')
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff]">
    
    <div class="header-container flex justify-end items-center px-4 py-2">
        <div class="flex items-center gap-2 relative mt-8">
           
            <button class="px-4 py-2 rounded shadow" id="dropdownBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter-right" viewBox="0 0 16 16">
                    <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5"/>
                </svg>
            </button>
            <div id="dropdownMenu" class="dropdown-menu mt-2">
                <ul class="list-none p-2">
                    <li><a href="#" class="block px-4 py-2">Terbaru</a></li>
                    <li><a href="#" class="block px-4 py-2">Terlama</a></li>
                    <li><a href="#" class="block px-4 py-2">Vote terbanyak</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="card-container" class="p-4"></div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById('card-container');

        for (let i = 1; i <= 100; i++) {
            const card = document.createElement('div');
            card.className = 'card bg-white p-4 shadow rounded fade-in';
            card.innerHTML = ` 
            <a href="{{ url('/dosen/detail') }}" class="w-full h-full">
                <div class="card">
                    <div class="absolute top-2 right-2 bg-gradient-to-r from-blue-300 to-blue-500 text-white rounded-full px-3 py-1 flex items-center space-x-2 shadow-md">
                        <ion-icon name="thumbs-up" class="text-xl"></ion-icon>
                        <span class="text-sm font-bold">3</span>
                    </div>
                    <p class="mt-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum explicabo vero nostrum, iure repellendus perspiciatis non numquam eaque est ipsum quam similique nobis sit assumenda.</p>
                    <button class="btn-upvote bg-gradient-to-r from-blue-300 to-blue-500 rounded-full">Upvote</button>
                </div>
            </a>
            `;
            container.appendChild(card);
        }

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    entry.target.classList.remove('fade-out');
                } else {
                    entry.target.classList.remove('fade-in');
                    entry.target.classList.add('fade-out');
                }
            });
        });

        document.querySelectorAll('.card').forEach(card => {
            observer.observe(card);
        });
    });


    document.addEventListener("DOMContentLoaded", () => {
        const dropdownBtn = document.getElementById("dropdownBtn");
        const dropdownMenu = document.getElementById("dropdownMenu");

        dropdownBtn.addEventListener("click", () => {
            dropdownMenu.classList.toggle("active");
        });

        document.addEventListener("click", (e) => {
            if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove("active");
            }
        });
    });
    

    document.addEventListener("DOMContentLoaded", () => {
        const addButton = document.getElementById("addButton");
        const formContainer = document.getElementById("formContainer");
        const cancelButton = document.getElementById("cancelButton");

        addButton.addEventListener("click", () => {
            formContainer.classList.remove("hidden");
        });

        cancelButton.addEventListener("click", () => {
            formContainer.classList.add("hidden");
        });

        const form = document.getElementById("addComplaintForm");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            alert("Form submitted!");
            form.reset();
            formContainer.classList.add("hidden");
        });
    });
</script>

<style>
    .fade-in {
        animation: fadeIn 0.8s ease-in-out forwards;
    }

    .fade-out {
        animation: fadeOut 0.8s ease-in-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        to {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
    }

    .card {
        background-color: white;
        padding: 0.75rem; 
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        width: 100%; 
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 16rem; 
        min-height: 10rem; 
        height: auto;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
    }

    .btn-upvote {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .btn-upvote:hover {
        transform: scale(1.1);
        background-color: #3182ce;
    }

    .btn-add:hover {
        transform: scale(1.05);
        background-color: #3182ce; 
    }

    

    .header-container {
        margin-bottom: 2rem; 
    }

    #card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem; 
        justify-items: center;
        max-width: 1200px; 
        margin: 0 auto; 
    }

    .dropdown-menu {
        display: block; 
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        min-width: 200px;
        z-index: 10;

        max-height: 0; 
        opacity: 0;
        overflow: hidden; 
        transform: translateY(-10px); 
        transition: all 0.3s ease; 
    }

    .dropdown-menu.active {
        max-height: 500px; 
    opacity: 1;
    transform: translateY(0); 
    }

    .card {
        position: relative; 
        background-color: white;
        padding: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        text-align: left; 
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 16rem;
        min-height: 10rem;
        height: auto;
        overflow: hidden;
    }

    .btn-upvote {
        position: absolute;
        bottom: 1rem; 
        right: 1rem; 
        z-index: 1; 
        padding: 0.5rem 1rem;;
        color: rgb(41, 40, 40);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .card p {
        margin-bottom: 4rem; 
    }

</style>
@endsection