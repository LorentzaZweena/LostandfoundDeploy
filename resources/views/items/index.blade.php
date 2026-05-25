<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lost and found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body style="background:#f6f7fb; font-family:'Poppins', sans-serif;">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white py-4 fixed-top">
        <div class="container">

        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="{{ asset('img/briefcase-alt-solid-24.png') }}" width="30" class="me-2">
            Lost&found
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="/#categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="/#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="/#contact">Contact</a>
          </li>
        </ul>

        <div class="d-flex gap-2">
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">
                    Login
                </a>
            @endguest

            @auth
                <a href="/profile" class="btn btn-primary rounded-pill px-4">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger rounded-pill px-4">
                        Logout
                    </button>
                </form>
            @endauth
        </div>

        </div>
        </div>
        </nav>
    </div>
    <div class="container mt-5 pt-5">

    <div class="d-flex justify-content-between align-items-center mb-4 mt-3 pt-3">
        <h5 class="fw-bold">Reports</h5>

        <a href="/report" class="btn btn-primary rounded-pill px-4">
            Add New Report
        </a>
    </div>

    <div class="row g-4">
        @foreach($items as $item)
        <div class="col-md-6 col-lg-3">
            <a href="{{ url('/items/'.$item->id) }}" class="text-decoration-none text-dark">
                <div class="card report-card shadow-sm h-100">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/pp.jpg') }}" class="profile-img mb-2">
                        <h6 class="fw-semibold mb-1">
                            @if($item->user)
                                {{ $item->user->name }}
                            @else
                                Guest
                            @endif
                        </h6>

                        <small class="text-muted d-block mb-3">
                            {{ $item->title }}
                        </small>
                        <hr>
                        <div class="info-row">
                            <i class='bx bx-map'></i>
                            <span>{{ $item->location }}</span>
                        </div>

                        <div class="info-row">
                            <i class='bx bx-envelope'></i>
                            <span>{{ $item->contact_email }}</span>
                        </div>

                        <div class="info-row">
                            <i class='bx bx-image'></i>
                            <span>
                                @if($item->image)
                                    See image
                                @else
                                    No Image
                                @endif
                            </span>
                        </div>

                        <div class="info-row">
                            <i class='bx bx-category'></i>
                            <span>{{ $item->category }}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script>
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        navLinks.forEach(link => {
          link.addEventListener('click', () => {
            const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
              toggle: false
            });
            bsCollapse.hide();
          });
        });
      </script>
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  </body>
</html>