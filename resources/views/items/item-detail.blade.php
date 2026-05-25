<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $item->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/item-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white py-4 fixed-top">
        <div class="container">

        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
        <img src="{{ asset('img/briefcase-alt-solid-24.png') }}" width="30" class="me-2">
        Lost&found
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="/items">Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#contact">Contact</a>
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

<div class="container py-5 mt-5">
    <div class="card-custom shadow-sm">
        <div class="mb-3">
            <span class="category-badge">
                {{ $item->category }}
            </span>

            <small class="text-muted ms-2">
                {{ $item->created_at->format('F d, Y') }}
            </small>
        </div>

        <h2 class="fw-bold mb-4">
            {{ $item->title }}
        </h2>

        @if($item->image)
            <img src="{{ asset($item->image) }}" class="hero-img mb-4">
        @else
            <img src="{{ asset('img/no-image.png') }}" class="hero-img mb-4">
        @endif

        <h6 class="fw-semibold mb-3">
            Reported by:
            {{ $item->user->name ?? 'Guest' }}
        </h6>

        <p class="text-muted" style="line-height: 1.8;">
            {{ $item->description }}
        </p>

        <hr>

        <div class="mt-3">
            <p><strong>Location:</strong> {{ $item->location }}</p>
            <p><strong>Contact:</strong> {{ $item->contact_email }}</p>
            <p>
                <strong>Status:</strong>
                <span class="badge {{ $item->status == 'lost' ? 'bg-danger' : 'bg-success' }}">
                    {{ ucfirst($item->status) }}
                </span>
            </p>
        </div>
    </div>
</div>

</body>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</html>