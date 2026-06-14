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
  <body>
    <div class="container">
        <nav class="navbar bg-white py-3 fixed-top shadow-sm">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand fw-bold d-flex align-items-center me-3" href="/">
            <img src="{{ asset('img/briefcase-alt-solid-24.png') }}"
                 width="30"
                 class="me-2">
            Lost&found
        </a>

        <div class="flex-grow-1 mx-3">
            <div class="position-relative">
                <i class='bx bx-search' style="position:absolute; left:18px; top:50%; transform:translateY(-50%); font-size:22px; color:#777;"></i>

                <input type="text" id="searchInput" class="form-control rounded-pill ps-5" placeholder="Search item, category, or location...">
            </div>
        </div>

        <div class="d-flex gap-2">
            @guest
                <a href="{{ route('login') }}"
                   class="btn btn-primary rounded-pill px-4">
                    Login
                </a>
                <a href="/report"
                   class="btn btn-primary rounded-pill px-4">
                    Add new report
                </a>
            @endguest

            @auth
                <a href="/report"
                   class="btn btn-primary rounded-pill px-4">
                    Add new report
                </a>
                <a href="/profile"
                   class="btn btn-primary rounded-pill px-4">
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
</nav>
    </div>
    <div class="container content-wrapper">
        <br><br><br>
<div class="row g-4">
    @foreach($items as $item)
    <div class="col-md-6 col-lg-3 item-card">
        <div class="text-decoration-none text-dark">
            <div class="card report-card shadow-sm h-100" data-search=" {{ strtolower($item->title) }} {{ strtolower($item->category) }} {{ strtolower($item->location) }} {{ strtolower($item->status) }}">
                <div class="position-relative">
                    @if($item->image)
                    <div data-bs-toggle="modal" data-bs-target="#imageModal{{ $item->id }}" onclick="event.stopPropagation();">

                    <img
                    src="{{ asset('storage/'.$item->image) }}" class="card-img-top" style=" height:220px;width:100%; object-fit:cover; object-position:center; cursor:pointer;">

                    </div>
                    @else
                    <img src="{{ asset('img/no-image.png') }}"
                         class="card-img-top"
                         style="height:220px;object-fit:cover;">
                    @endif

                    <div class="position-absolute bottom-0 start-0 w-100 p-2 text-white"
                         style="background:rgba(0,0,0,.45);font-size:12px;">
                        <div><i class='bx bx-map'></i> {{ $item->location }}</div>
                        <div><i class='bx bx-time'></i> {{ $item->created_at->format('d M Y') }} - {{ $item->created_at->format('H:i') }}</div>
                    </div>
                </div>

                <div class="card-body">
                    <h6 class="fw-bold mb-3">{{ $item->title }}</h6>

                    <div class="info-row mb-2">
                        <i class='bx bx-map'></i>
                        <span>{{ $item->location }}</span>
                    </div>

                    <div class="info-row mb-2">
                        <i class='bx bx-category'></i>
                        <span>{{ $item->category }}</span>
                    </div>

                    <div class="info-row mb-2">
                        <i class='bx bx-check-circle'></i>
                        @if($item->status=="lost")
                            <span class="badge bg-danger">Lost</span>
                        @elseif($item->status=="found")
                            <span class="badge bg-success">Found</span>
                        @else
                            <span class="badge bg-primary">Returned</span>
                        @endif
                    </div>

                    <div class="info-row">
                        <i class='bx bx-time'></i>
                        <span>{{ $item->created_at->format('l') }} - {{ $item->created_at->format('H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 bg-transparent">
                    <div class="modal-body p-0 text-center">
                        @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" class="img-fluid rounded shadow" style=" max-height:85vh; width:auto; object-fit:contain;">
                        @else
                        <img src="{{ asset('img/no-image.png') }}" class="img-fluid w-100">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
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
     @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Report Submitted!',
        text: '{{ session('success') }}',
        confirmButtonColor: '#355872'
    });
    </script>
    @endif
    <script>
        const searchInput=document.getElementById("searchInput");
        searchInput.addEventListener("keyup",function(){
            let keyword=this.value.toLowerCase();
            let cards=document.querySelectorAll(".item-card");
            cards.forEach(function(card){
                let text=card.querySelector(".report-card")
                            .dataset.search
                            .toLowerCase();
                if(text.includes(keyword)){
                    card.style.display="";
                }
                else{
                    card.style.display="none";
                }
            });
        });
        </script>
  </body>
</html>