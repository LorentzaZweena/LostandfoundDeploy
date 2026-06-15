<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

<div class="sidebar shadow-sm text-center">
    <a href="{{ url('/') }}"><i class='bx bx-home'></i></a>
    <a href="/profile/edit"><i class='bx bx-user'></i></a>
    {{-- <a href="#"><i class='bx bx-folder'></i></a> --}}
</div>

<div class="main container py-4">
    <h4 class="fw-bold mb-4">Profile Dashboard</h4>
    <div class="row g-4">
        <div class="col-12 col-12 col-md-4">
            <div class="card-custom bg-white shadow-sm text-center">
                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('img/pp.jpg') }}" class="profile-img mb-3">
                <h5 class="fw-bold">{{ $user->name }}</h5>
                <div class="d-flex flex-column flex-md-row gap-2 mt-3 w-100">
                    <a href="/report" class="btn btn-primary rounded-pill w-100">
                        <i class='bx bx-plus'></i> Add Report
                    </a>

                    <form action="/profile/photo" method="POST" enctype="multipart/form-data" class="w-100">

                    @csrf
                    <label class="btn btn-outline-secondary rounded-pill w-100 mb-0">
                        <i class='bx bx-image'></i> Upload Photo
                        <input type="file" name="photo" hidden onchange="this.form.submit()">
                    </label>
                </form>

                </div>
                <hr>
                <p class="mb-1"><strong>Email:</strong></p>
                <small>{{ $user->email }}</small>
            </div>
        </div>

        <div class="col-md-7">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="stat-box shadow-sm">
                        <h3>{{ $totalReports }}</h3>
                        <small>All Reports</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-box shadow-sm">
                        <h3>{{ $lost }}</h3>
                        <small>Lost</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="stat-box shadow-sm">
                        <h3>{{ $found }}</h3>
                        <small>Found</small>
                    </div>
                </div>

            </div>
            <div class="card-custom bg-white shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                    <h6 class="fw-bold mb-0">Your Reports</h6>
                    <form method="GET" action="/profile" class="row g-2 mb-3">
                    <div class="col-md-4">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">All Status</option>
                            <option value="lost" {{ $status=='lost'?'selected':'' }}>
                                Lost
                            </option>
                            <option value="found" {{ $status=='found'?'selected':'' }}>
                                Found
                            </option>
                            <option value="returned" {{ $status=='returned'?'selected':'' }}>
                                Returned
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <select name="category" class="form-select" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            <option value="Electronics" {{ $category=='Electronics'?'selected':'' }}>Electronics</option>
                            <option value="Bags" {{ $category=='Bags'?'selected':'' }}>Bags</option>
                            <option value="ID Cards" {{ $category=='ID Cards'?'selected':'' }}>ID Cards</option>
                            <option value="Keys" {{ $category=='Keys'?'selected':'' }}>Keys</option>
                            <option value="Books" {{ $category=='Books'?'selected':'' }}>Books</option>
                            <option value="Makeup" {{ $category=='Makeup'?'selected':'' }}>Makeup</option>
                            <option value="Accessories" {{ $category=='Accessories'?'selected':'' }}>Accessories</option>
                            <option value="Documents" {{ $category=='Documents'?'selected':'' }}>Documents</option>
                            <option value="Others" {{ $category=='Others'?'selected':'' }}>Others</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <a href="/profile" class="btn btn-outline-secondary w-100">
                            Reset
                        </a>
                    </div>

                </form>
                </div>
                @forelse($items as $item)
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3" data-bs-toggle="modal" data-bs-target="#itemModal{{ $item->id }}" style="cursor:pointer;">
                    <div>
                        <strong>{{ $item->title }}</strong><br>
                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                    </div>

                    <span class="badge {{ $item->status == 'lost' ? 'badge-lost' : 'badge-found' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>
                <div class="modal fade" id="itemModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Report</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="/items/{{ $item->id }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $item->title }}">
                                    </div>

                                    <div class="mb-2">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control">{{ $item->description }}</textarea>
                                    </div>

                                    <div class="mb-2">
                                        <label>Category</label>
                                        <input type="text" name="category" class="form-control" value="{{ $item->category }}">
                                    </div>

                                    <div class="mb-2">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" value="{{ $item->location }}">
                                    </div>

                                    <div class="mb-2">
                                        <label>Contact</label>
                                        <input type="text" name="contact_email" class="form-control" value="{{ $item->contact_email }}">
                                    </div>

                                    <div class="mb-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="lost" {{ $item->status == 'lost' ? 'selected' : '' }}>Lost</option>
                                            <option value="found" {{ $item->status == 'found' ? 'selected' : '' }}>Found</option>
                                            <option value="returned" {{ $item->status == 'returned' ? 'selected' : '' }}>Returned</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mb-2">
                                        Update Report
                                    </button>
                                </form>
                                <form method="POST" action="/items/{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger w-100">
                                        Delete Report
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-muted">No reports found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>