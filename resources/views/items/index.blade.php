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
                    <i class='bx bx-plus-medical'></i>
                </a>
                <a href="/profile"
                   class="btn btn-primary rounded-pill px-4">
                    <i class='bx bxs-user'></i> Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger rounded-pill px-4">
                        <i class='bx bxs-door-open' style='color:#ffffff' ></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
    </div>
    <div class="container content-wrapper">
        <h4>“Not all those who wander are lost.”</h4>
        <p>— J. R. R. Tolkien</p>
    <br>
    <div class="row g-2">
        <div class="col-lg-3 col-md-6">
            <select class="form-select" id="categoryFilter">
                <option value="">All Categories</option>
                <option value="Electronics">Electronics</option>
                <option value="Bags">Bags</option>
                <option value="ID Cards">ID Cards</option>
                <option value="Keys">Keys</option>
                <option value="Books">Books</option>
                <option value="Makeup">Makeup</option>
                <option value="Accessories">Accessories</option>
                <option value="Documents">Documents</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <div class="col-lg-3 col-md-6">
            <select class="form-select" id="locationFilter">
                <option value="">All Locations</option>
                <option>OCR 1</option>
                <option>OCR 2</option>
                <option>OCR 3</option>
                <option>OCR 4</option>
                <option>OCR 5</option>
                <option>OCR 6</option>
                <option>OCR 7</option>
                <option>TCR 1</option>
                <option>TCR 2</option>
                <option>TCR 3</option>
            </select>
        </div>

        <div class="col-lg-2 col-md-6">
            <select class="form-select" id="statusFilter">
                <option value="">All Status</option>
                <option value="lost">Lost</option>
                <option value="found">Found</option>
                <option value="returned">Returned</option>
            </select>
        </div>

        <div class="col-lg-2 col-md-6">
            <select class="form-select" id="sortFilter">
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>

        <div class="col-lg-2 d-grid">
            <button class="btn btn-outline-secondary" id="resetFilter">
                Reset
            </button>
        </div>

    </div>
<div class="row g-4 mt-3">
    @foreach($items as $item)
    <div class="col-md-6 col-lg-3 item-card">
        <div class="text-decoration-none text-dark">
            <div class="card report-card shadow-sm h-100" data-search="{{ strtolower($item->title) }} {{ strtolower($item->category) }} {{ strtolower($item->location) }} {{ strtolower($item->status) }}" data-category="{{ strtolower($item->category) }}" data-location="{{ strtolower($item->location) }}" data-status="{{ strtolower($item->status) }}" data-date="{{ $item->created_at->timestamp }}">
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
        const category=document.getElementById("categoryFilter");
        const locationFilter=document.getElementById("locationFilter");
        const status=document.getElementById("statusFilter");

        function filterCards(){
            let keyword=searchInput.value.toLowerCase();
            let cat=category.value.toLowerCase();
            let loc=locationFilter.value.toLowerCase();
            let stat=status.value.toLowerCase();
            document.querySelectorAll(".item-card").forEach(card=>{
                let data=card.querySelector(".report-card");
                let search=data.dataset.search;
                let categoryData=data.dataset.category;
                let locationData=data.dataset.location;
                let statusData=data.dataset.status;

                let show=true;

                if(keyword && !search.includes(keyword))
                    show=false;

                if(cat && categoryData!=cat)
                    show=false;

                if(loc && locationData!=loc)
                    show=false;

                if(stat && statusData!=stat)
                    show=false;

                card.style.display=show?"":"none";

            });

        }

        searchInput.addEventListener("keyup",filterCards);
        category.addEventListener("change",filterCards);
        locationFilter.addEventListener("change",filterCards);
        status.addEventListener("change",filterCards);

        document.getElementById("resetFilter").addEventListener("click",()=>{

            searchInput.value="";
            category.value="";
            locationFilter.value="";
            status.value="";

            filterCards();
        });
        </script>
        <script>
            const params = new URLSearchParams(window.location.search);
            const selectedCategory = params.get("category");

            if (selectedCategory) {
                category.value = selectedCategory;
            }

            filterCards();
        </script>
  </body>
</html>