@extends('pages.home')

@section('panel')
    <div class="container-fluid" style="margin: 30px">
        <div class="d-flex">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlIM1EpjrEL7O9qh3vAlIdUtUuDd9HTM0iww&s" alt="likedLogo" style="height: 180px; width: 180px">
            <div style="margin-left: 30px; margin-top: auto">
                <div>
                <span>Playlist</span>
                <h1>Liked Songs</h1>
                <p style="white-space: pre;">Egbert Wangarry    |   {{ $likedSongsCount }} Songs</p>
            </div>
            </div>
        </div>

        <div class="d-flex justify-content-between" style="margin-right: 50px; margin-top: 20px;">
            <div>
                <img src="{{ asset('images/play.svg') }}" alt="play" style="margin-right: 15px">
                <img src="{{ asset('images/shuffle.svg') }}" alt="shuffle" style="margin-right: 15px">
                <img src="{{ asset('images/download.svg') }}" alt="download">
            </div>

            <div>
                <img src="{{ asset('images/search.svg') }}" alt="search">
                <span style="color: gray; margin-left: 13px;">Data added<img src="{{ asset('images/filter.svg') }}" alt="filter" style="margin-left: 5px"></span>
            </div>
        </div>

        <div class="container-fluid" style="margin-top: 50px">
            <table class="table tableLike">
                <thead style="border-color: gray">
                    <th>#</th>
                    <th>Title</th>
                    <th>Album</th>
                    <th>Date added</th>
                    <th>Duration</th>
                </thead>
                <tbody>
                    @foreach ($likedSongs as $index => $item)
                    <a href="/likedsongs/{{ $item['id'] }}">
                        <tr class="eachRow" onclick="window.location.href='/likedsongs/{{ $item['id'] }}'">
                            <td>{{ $index + 1 }}</td>
                            <td> 
                                <div class="d-flex">
                                    <img src="{{ $item['imgUrl'] }}" alt="{{ $item['title'] }}" class="likeGambar">
                                    <div class="likedSongCaption"> 
                                        <p>{{ $item['title'] }}</p>
                                        <p class="underCaption">{{ $item['type'] }} | {{ $item['artist'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item['album'] }}</td>
                            <td>{{ $item['dateAdded'] }}</td>
                            <td>{{ $item['duration'] }}</td>
                        </tr>
                    </a>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('footer')
    <div class="footer fixed-bottom">
        <div class="container-fluid d-flex justify-content-between">
            <div class="d-flex leftmost" style="align-items: center">
                <img src="{{ $selectedSong['imgUrl'] }}" alt="{{ $selectedSong['title'] }}" style="width: 56px; height: 60px; border-radius: 8px;">
                <div >
                    <p>{{ $selectedSong['title'] }}</p>
                    <p style="color: gray">{{ $selectedSong['type'] }} | {{ $selectedSong['artist'] }}</p>
                </div>
            </div>
            

            <div class="middle">
                <div class="middle1">
                    <img class="gambar1" src="{{ asset('images/shuffle.svg') }}" alt="shuffle">
                    <img class="gambar2" src="{{ asset('images/previous.svg') }}" alt="previous">
                    <img class="gambar3" src="{{ asset('images/play.svg') }}" alt="play">
                    <img class="gambar4" src="{{ asset('images/next.svg') }}" alt="next">
                    <img class="gambar5" src="{{ asset('images/repeat.svg') }}" alt="repeat">
                </div>
                <div class="d-flex middle2">
                    <p>0:00</p><hr style="width: 500px"><p>{{ $selectedSong['duration'] }}</p>
                </div>
            </div>


            <div class="rightmost">
                <img class="gambar1" src="{{ asset('images/play-kotak.svg') }}" alt="play-kotak">
                <img class="gambar2" src="{{ asset('images/mic.svg') }}" alt="mic">
                <img class="gambar3" src="{{ asset('images/list.svg') }}" alt="list">
                <img class="gambar4" src="{{ asset('images/pc.svg') }}" alt="pc">
                <img class="gambar5" src="{{ asset('images/fullscreen.svg') }}" alt="fullscreen">
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/likePage.css')}}">
@endpush