<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="spotify" width="50" height="45">
            </a>
      
            
            <form class="d-flex ms-auto me-auto" role="search" style="height: 48px; width: 500px">
                <div class="container-fluid d-flex container-home" style="width: 80px; height: 48px">
                  <button class="btn-home rounded-circle" type="submit">
                    <img src="{{ asset('images/home.svg' )}}" alt="home">
                  </button>
                </div>
                <div class="input-group">
                  <button class="btn btn-search" type="submit">
                    <img src="{{ asset('images/search.svg' )}}" alt="browse">
                  </button>
                  <input class="form-control search" type="search" placeholder="What do you want to play?" aria-label="Search">
                  <button class="btn btn-browse" type="submit">
                    <img src="{{ asset('images/divider.svg' )}}" alt="divider" style="transform: rotate(90deg)">
                    <img src="{{ asset('images/browse.svg' )}}" alt="browse">
                  </button>
                </div>
          </form>
      
          <div class="d-flex">
            <img src="{{ asset('images/notification.svg') }}" alt="notification">
            <img src="{{ asset('images/friend.svg') }}" alt="friend" style="margin-left: 10px">
            <img src="{{ asset('images/profile.svg') }}" class="rounded-circle" alt="profile" style="margin-left: 18px">
          </div>
        </div>
    </nav>
</header>