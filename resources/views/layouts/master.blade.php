<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/master.css')}}">
    @stack('styles')
</head>
<body>
    @include('components.header')

    <main>
        @yield('content')
    </main>


    


    <script>
        const searchBtn = document.querySelector('.btn-search');
const browseBtn = document.querySelector('.btn-browse');
const searchImg = searchBtn.querySelector('.search-img');
const browseImg = browseBtn.querySelector('.browse-img');

// Menyimpan gambar default untuk search dan browse
const searchImgDefault = '{{ asset('images/search.svg' )}}';
const searchImgHover = '{{ asset('images/search-hover.svg' )}}'; // Ganti dengan path gambar saat hover
const browseImgDefault = '{{ asset('images/browse.svg' )}}';
const browseImgHover = '{{ asset('images/browse-hover.svg' )}}'; // Ganti dengan path gambar saat hover

// Fungsi untuk mengganti gambar saat hover
function changeSearchImgOnHover() {
  searchImg.src = searchImgHover;
}

function revertSearchImg() {
  searchImg.src = searchImgDefault;
}

function changeBrowseImgOnHover() {
  browseImg.src = browseImgHover;
}

function revertBrowseImg() {
  browseImg.src = browseImgDefault;
}

// Menambahkan event listener untuk hover pada tombol search dan browse
searchBtn.addEventListener('mouseenter', changeSearchImgOnHover);
searchBtn.addEventListener('mouseleave', revertSearchImg);

browseBtn.addEventListener('mouseenter', changeBrowseImgOnHover);
browseBtn.addEventListener('mouseleave', revertBrowseImg);
    </script>
</body>
</html>