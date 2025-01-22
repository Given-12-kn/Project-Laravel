@extends('layout.template')

@section('title', 'Keluhan')

@section('no-headerAdmin', true)
@section('no-headerDosen', true)

@section('content')
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

<div class="bg-gradient-to-r from-white via-[#f0e6fa] to-[#d2eaff] pb-12">

    <div class="header-container flex justify-end items-center px-4 py-2">
        <div class="flex items-center gap-2 relative mt-8">
            <button id="addButton" class="btn-add bg-blue-400 text-white px-4 py-2 rounded shadow">Tambah Keluhan</button>
            <button class="px-4 py-2 rounded shadow" id="dropdownBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filter-right" viewBox="0 0 16 16">
                    <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5m0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5"/>
                </svg>
            </button>
            <div id="dropdownMenu" class="dropdown-menu mt-2">
                <ul class="list-none p-2">
                    <li><button id="baru"  class="block px-4 py-2">Terbaru</button></li>
                    <li><button id="lama" class="block px-4 py-2">Terlama</button></li>
                    <li><button id="terbanyak" class="block px-4 py-2">Vote terbanyak</button></li>
                </ul>
            </div>
        </div>
    </div>



    <div id="formContainer" class="mt-4 w-full hidden">
        <div class="max-w-6xl mx-auto bg-white transform transition-transform duration-300 ease-in-out p-8 rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Form Penambahan Keluhan</h2>
            <form id="addComplaintForm" action="{{url('keluhan/detail/add')}}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-lg font-semibold text-gray-700">Judul</label>
                    <input type="text" id="title" name="title" placeholder="Masukkan judul" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-800 sm:text-md px-4 py-2 bg-gray-50">
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-lg font-semibold text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" placeholder="Jelaskan keluhan anda secara detail" rows="4" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-800 sm:text-md px-4 py-2 bg-gray-50"></textarea>
                </div>

                <div class="mb-6">
                    <label for="category" class="block text-lg font-semibold text-gray-700">Kategori</label>
                    <select id="category" name="category" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-800 sm:text-md px-4 py-2 bg-gray-50">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelButton" class="bg-gray-400 text-white px-5 py-2 rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105 hover:bg-gray-500">Cancel</button>
                    <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-600">Submit</button>
                </div>
            </form>
        </div>
    </div>



    <div id="card-container"></div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", (event) => {
        if (event.target.classList.contains("btn-upvote")) {
            event.preventDefault();
            const idKeluhan = event.target.dataset.idKeluhan;

            fetch("{{ url('/keluhan/detail/upvote') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    id_keluhan: idKeluhan,
                    username: "{{ Auth::user()->nama }}", // Pastikan username dikirim
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Upvote berhasil!");
                        // Perbarui tampilan jumlah upvote jika diperlukan
                        const upvoteCount = event.target.previousElementSibling.querySelector("span");
                        upvoteCount.textContent = parseInt(upvoteCount.textContent) + 1;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error("Error:", error));
        }
    });
});

    var myurl = "<?php echo URL::to('/'); ?>";
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById('card-container');
        var status = 'lama';
        loadCard();
        
        $(document).ready(function () {
           $('#baru').click(function (e) {
                e.preventDefault();
                status = 'baru';
                loadCard();
            });
            $('#lama').click(function (e) {
                e.preventDefault();
                status = 'lama';
                loadCard();
            });
            $('#terbanyak').click(function (e) {
                e.preventDefault();
                status = 'terbanyak';
                loadCard();
            });

        });

        $(document).ready(function () {
            $('.btn-upvote').click(function () {
                $(this).toggleClass('bg-blue-300 bg-blue-500');
            });
        });

        function loadCard(){
            $(document).ready(function () {
                $.ajax({
                    type: "post",
                    url: myurl + "/keluhan/detail/keluhanAjax",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status
                    },
                    success: function (response) {
                        console.log(response.success);
                        console.log(response);
                        container.innerHTML = '';
                        for (var i = 0; i < response.dataKeluhan.length; i++) {
                            var sudahUpvote = false;
                            for (var j = 0; j < response.dataKeluhan[i].daftarUpvote.length; j++) {
                                console.log(response.dataKeluhan[i].daftarUpvote[j]);
                                if (response.dataKeluhan[i].daftarUpvote[j].username == `{{Auth::user()->nama}}`) {
                                    sudahUpvote = true;
                                    break;
                                }
                            }
                            if(!sudahUpvote){
                                const card = document.createElement('div');
                                card.className = 'card fade-out';
                                card.className = 'card bg-white p-4 shadow rounded fade-in';
                                card.innerHTML = `
                                <a href="{{ url('/keluhan/detailKeluhan/${response.dataKeluhan[i].id_keluhan}') }}" class="w-full h-full">
                                    <div class="card">
                                        <div class="absolute top-2 right-2 bg-gradient-to-r from-blue-300 to-blue-500 text-white rounded-full px-3 py-1 flex items-center space-x-2 shadow-md">
                                            <ion-icon name="thumbs-up" class="text-xl"></ion-icon>
                                            <span class="text-sm font-bold">` + response.dataKeluhan[i].daftarUpvote + `</span>
                                        </div>
                                        <div>
                                            <h2 class="text-center font-semibold text-lg mt-14 mb-4 truncate">` + response.dataKeluhan[i].judul_keluhan + `</h2>
                                            <div class="line-clamp-4">` + response.dataKeluhan[i].deskripsi + `</div>
                                        </div>
                                        <button class="btn-upvote bg-gradient-to-r from-blue-300 to-blue-500 rounded-full" data-id-keluhan="` + response.dataKeluhan[i].id_keluhan + `">Upvote</button>
                                    </div>
                                </a>
                            `;
                            container.appendChild(card);
                            observer.observe(card);
                            }
                            else{
                                const card = document.createElement('div');
                            card.className = 'card bg-white p-4 shadow rounded fade-in';
                            card.innerHTML = `
                            <a href="{{ url('/keluhan/detailKeluhan/${response.dataKeluhan[i].id_keluhan}') }}" class="w-full h-full">
                                <div class="card">
                                    <div class="absolute top-2 right-2 bg-gradient-to-r from-blue-300 to-blue-500 text-white rounded-full px-3 py-1 flex items-center space-x-2 shadow-md">
                                        <ion-icon name="thumbs-up" class="text-xl"></ion-icon>
                                        <span class="text-sm font-bold">` + response.dataKeluhan[i].daftarUpvote + `</span>
                                    </div>
                                    <div>
                                        <h2 class="text-center font-semibold text-lg mt-14 mb-4 truncate">` + response.dataKeluhan[i].judul_keluhan + `</h2>
                                        <div class="line-clamp-4">` + response.dataKeluhan[i].deskripsi + `</div>
                                    </div>
                                    <button class="btn-upvote bg-gradient-to-r from-blue-300 to-blue-500 rounded-full" data-id-keluhan="` + response.dataKeluhan[i].id_keluhan + `">Upvote</button>
                                </div>
                            </a>
                            `;
                            container.appendChild(card);
                            observer.observe(card);
                            }

                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
            });
        }
        setInterval(loadCard, 60000);

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

        // Handle form submission (example behavior)
        // const form = document.getElementById("addComplaintForm");
        // form.addEventListener("submit", (e) => {
        //     e.preventDefault();
        //     alert("Form submitted!");
        //     form.reset();
        //     formContainer.classList.add("hidden");
        // });
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
        grid-template-columns: repeat(auto-fill, minmax(250px, auto));
        gap: 3rem;
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
        justify-content: flex-start;
        text-align: left;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 16rem;
        /* min-height: 10rem; */
        width: 700px;
        max-height: 300px;
        min-height: 300px;
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
