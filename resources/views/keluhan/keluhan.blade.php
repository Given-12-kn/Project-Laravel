<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Keluhan</title>
    <style>
        /* Animasi untuk muncul dan hilang */
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
            padding: 0.75rem; /* Reduced padding */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            aspect-ratio: 1; /* Ensures the card is square */
            overflow: hidden; /* Avoid content overflowing */
            position: relative; /* To position the Upvote button absolutely */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 16rem; /* Reduced max width */
            width: 100%; /* Ensure it fills available space */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Card hover effect */
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
        }

        /* Button hover effect */
        .btn-upvote {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .btn-upvote:hover {
            transform: scale(1.1);
            background-color: #38a169; /* Darker green */
        }

        /* Hover effect for "Add" button */
        .btn-add:hover {
            transform: scale(1.05);
            background-color: #3182ce; /* Slightly darker blue */
        }

        /* Positioning the Upvote button at the bottom-right of the card */
        .btn-upvote {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
        }

        /* Add spacing between header and cards */
        .header-container {
            margin-bottom: 2rem; /* Add margin below header */
        }

        /* Center the card container with padding on the sides */
        #card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem; /* Increased gap between cards */
            justify-items: center;
            max-width: 1200px; /* Maximum width for the grid */
            margin: 0 auto; /* Centers the grid container */
        }

        /* Dropdown menu styling */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            min-width: 200px;
            z-index: 10;
        }

        .dropdown-menu.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] min-h-screen">

    <!-- Header with margin-bottom -->
    <div class="header-container p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold text-center w-full">Keluhan</h1>
            <div class="flex items-center gap-2 relative">
                <button class="btn-add bg-blue-500 text-white px-4 py-2 rounded shadow">Add</button>
                <!-- Dropdown Button (Using FontAwesome icon) -->
                <button class="bg-gray-200 px-4 py-2 rounded shadow" id="dropdownBtn">
                    <i class="fas fa-chevron-down"></i>
                </button>
                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="dropdown-menu">
                    <ul class="list-none p-2">
                        <li><a href="#" class="block px-4 py-2">Option 1</a></li>
                        <li><a href="#" class="block px-4 py-2">Option 2</a></li>
                        <li><a href="#" class="block px-4 py-2">Option 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Container with center alignment -->
    <div id="card-container" class="p-4"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById('card-container');
            const dropdownBtn = document.getElementById('dropdownBtn');
            const dropdownMenu = document.getElementById('dropdownMenu');

            // Generate 100 cards
            for (let i = 1; i <= 100; i++) {
                const card = document.createElement('div');
                card.className = 'card bg-white p-4 shadow rounded fade-in';
                card.innerHTML = ` 
                    <p class="mb-4">Keluhan ${i}</p>
                    <button class="btn-upvote bg-green-500 text-white px-4 py-2 rounded">Upvote</button>
                `;
                container.appendChild(card);
            }

            // Toggle dropdown menu on button click
            dropdownBtn.addEventListener('click', () => {
                dropdownMenu.classList.toggle('active');
            });

            // Add animation on scroll
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

            // Observe all cards
            document.querySelectorAll('.card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>
