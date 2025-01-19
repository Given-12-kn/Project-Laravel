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
            background-color: #38a169;
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
            padding: 0.5rem 1rem;
            background-color: #38a169;
            color: white;
            border-radius: 0.25rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .card p {
            margin-bottom: 3rem; 
        }

    </style>
    
</head>
<body class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] min-h-screen">

    <div class="header-container p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold text-center w-full">Keluhan</h1>
            <div class="flex items-center gap-2 relative">
                <button class="btn-add bg-blue-500 text-white px-4 py-2 rounded shadow">Add</button>
            
                <button class="bg-gray-200 px-4 py-2 rounded shadow" id="dropdownBtn">
                    <i class="fas fa-chevron-down"></i>
                </button>
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

    <div id="card-container" class="p-4"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById('card-container');
            const dropdownBtn = document.getElementById('dropdownBtn');
            const dropdownMenu = document.getElementById('dropdownMenu');

            for (let i = 1; i <= 100; i++) {
                const card = document.createElement('div');
                card.className = 'card bg-white p-4 shadow rounded fade-in';
                card.innerHTML = ` 
                <div class="card">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum explicabo vero nostrum, iure repellendus perspiciatis non numquam eaque est ipsum quam similique nobis sit assumenda, doloremque quasi fuga molestiae. Eligendi animi repellat deleniti maiores, fugit eaque ratione repudiandae omnis quae qui aliquam sunt illo reprehenderit unde quasi officia odio. Qui, asperiores itaque? At delectus nostrum dignissimos beatae obcaecati harum maxime quos, fugiat asperiores ipsam a suscipit esse, modi vero quaerat natus veritatis eum animi non rem dolore ipsum iusto exercitationem. Possimus, ipsum ad beatae quasi reprehenderit ex facilis dignissimos, rerum blanditiis nisi ea! Perferendis, nemo dolores eum ratione omnis doloremque.</p>
                <button class="btn-upvote">Upvote</button>
                </div> `;
                container.appendChild(card);
            }
            
            dropdownBtn.addEventListener('click', () => {
                dropdownMenu.classList.toggle('active');
            });

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
    </script>

    
</body>
</html>
