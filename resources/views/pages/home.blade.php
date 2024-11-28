@extends('layouts.master')

@section('title', 'Home Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
@endpush

@section('content') 
    <div class="container-fluid container-induk">
        <div class="left-panel resizable-panel">
            <div class="konten-top d-flex" style="align-items: center ; margin-top: 15px; margin-left: 25px; margin-right: 20px;">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/library.svg')}}" alt="Logo" class="d-inline-block align-text-top logo-library">
                    <span class="span-library" style="color: #9c9a9a; margin-left: 5px;">Your Library</span>
                </a>
                <div class="ms-auto">
                    <button class="btn btn-primary btn-top-sidebar">
                        <img class="img-top-sidebar-right" src="{{ asset('images/plus.svg') }}" alt="add">
                    </button>
                    <button class="btn btn-primary btn-top-sidebar" style="margin-left: 8px">
                        <img class="img-top-sidebar-right" src="{{ asset('images/arrow-right.svg') }}" alt="extend">
                    </button>
                </div>
            </div>

            <div class="button-filter-sidebar d-flex" style="margin: 15px 20px">
                <button>Playlist</button>
                <button>Artists</button>
            </div>

            <div class="search-area-sidebar d-flex justify-content-between" style="margin: 15px 0px; margin-left: 15px; margin-right: 20px; align-items: center">
                <button><img class="img-search" src="{{ asset('images/search.svg') }}" alt="search-sidebar"></button>
                <span style="color: gray">Recents<img src="{{ asset('images/filter.svg') }}" alt="filter"></span>
            </div>
            
            <div class="library-sidebar">
                @foreach($librarySidebar as $item)
                @if($item['name'] === 'Liked Songs')
                    <a href="{{ route('likedsongs') }}" style="text-decoration: none; color: white">
                @endif
                    <div class="song-item d-flex">
                        <img src="{{ $item['imgUrl'] }}" alt="{{ $item['name'] }}">
                        <div class="song-info">
                            <p>{{ $item['name'] }}</p>
                            <p class="sub-info">
                                {{ $item['type'] }}
                                @if ($item['name'] === 'Liked Songs')
                                    <span>| {{ $likedSongsCount }} songs</span>
                                @endif
                                @if (!empty($item['owner']))
                                    <span>| {{ $item['owner'] }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @if($item['name'] === 'Liked Songs')
                    </a>
                @endif
                @endforeach
            </div>
        </div>
        <div class="divider"></div>
        <div class="right-panel resizable-panel">
            @yield('panel')
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const divider = document.querySelector('.divider');
            const leftPanel = document.querySelector('.left-panel');
            const rightPanel = document.querySelector('.right-panel');

            let isResizing = false;

            divider.addEventListener('mousedown', (e) => {
                isResizing = true;
                document.body.style.cursor = 'col-resize';
                document.body.style.userSelect = 'none';
            });

            document.addEventListener('mousemove', (e) => {
                if (!isResizing) return;

                const container = document.querySelector('.container-induk');
                const containerRect = container.getBoundingClientRect();
                const newLeftWidth = ((e.clientX - containerRect.left) / containerRect.width) * 100;

                if (newLeftWidth >= 10 && newLeftWidth <= 90) {
                    leftPanel.style.width = `${newLeftWidth}%`;
                    rightPanel.style.width = `${100 - newLeftWidth}%`;
                }
            });

            document.addEventListener('mouseup', () => {
                if (isResizing) {
                    isResizing = false;
                    document.body.style.cursor = 'default';
                    document.body.style.userSelect = 'auto';
                }
            });
        });
    </script>
@endpush

