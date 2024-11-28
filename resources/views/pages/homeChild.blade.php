@extends('pages.home')

@section('panel')
    <div class="container-content-utama">
        <div class="btn-filter">
            <button>All</button>
            <button>Music</button>
            <button>Podcast</button>
        </div>

        <div class="container-fluid d-flex mt-4">
            <div class="row">
                @foreach ($playlists as $playlist)
                    <div class="col-lg-4 col-sm-6 mb-3">
                        <div class="card card-playlist" style="height: 72px;">
                            <div class="row g-2">
                              <div class="col-md-2">
                                <img src="{{ $playlist['imgUrl'] }}" class="rounded-start" alt="$playlist['name']" style="height: 70px; width: 70px;">
                              </div>
                              <div class="col-md-10">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $playlist['name'] }}</h5>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <h5 style="margin: 20px">Made For Egbert</h5>

        <div class="container-fluid d-flex">
            <div class="row">
                @foreach ($madefor as $item)
                <div class="col-lg-2 col-md-4 col-sm-6 card-madeforyou-container">
                    <div class="card card-madeforyou text-white">
                        <img src="{{ $item['imgUrl'] }}" class="card-img-top rounded" alt="{{ $item['name'] }}" style="width: 200px; height: 200px;">
                        <div class="card-body p-2">
                            <h6 class="card-title">{{ $item['artists'] }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        <h5 style="margin: 20px; margin-top: 0;">Jump back in</h5>

        <div class="container-fluid d-flex" style="margin-top: 10px">
            <div class="row">
                @foreach ($jumpback as $item)
                <div class="col-lg-2 col-md-4 col-sm-6 card-jumpback-container">
                    <div class="card card-jumpback text-white">
                        <img src="{{ $item['imgUrl'] }}" class="card-img-top rounded" alt="{{ $item['name'] }}" style="width: 200px; height: 200px;">
                        <div class="card-body p-2">
                            <h6 class="card-title">{{ $item['name'] }}</h6>
                            <h6 class="card-title">By {{ $item['by'] }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection