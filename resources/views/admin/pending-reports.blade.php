<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
<nav class="navbar bg-white shadow-sm d-md-none fixed-top">
    <div class="container-fluid">
        <button class="btn btn-outline-secondary"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">
            <i class='bx bx-menu'></i>
        </button>

        <span class="fw-bold">
            IT Support
        </span>
    </div>
</nav>

<div class="sidebar d-none d-md-block">

    <h4 class="fw-bold mb-4">
        IT Support
    </h4>

    <a href="/">
        <i class='bx bx-home'></i>
        Home
    </a>

    <a href="/admin/reports">
        <i class='bx bx-file'></i>
        Pending Reports
    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger w-100 mt-4">
            Logout
        </button>
    </form>

</div>

<div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="mobileSidebar">

    <div class="offcanvas-header">
        <h5>IT Support</h5>
        <button class="btn-close"
                data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <a href="/" class="btn btn-outline-primary w-100 mb-2">
            Home
        </a>

        <a href="/admin/reports"
           class="btn btn-outline-secondary w-100 mb-2">
            Pending Reports
        </a>

        <form method="POST"
              action="{{ route('logout') }}">
            @csrf

            <button class="btn btn-danger w-100">
                Logout
            </button>
        </form>

    </div>
</div>

<div class="content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">
                Pending Reports
            </h2>

            <p class="text-muted">
                Review and approve submitted reports
            </p>
        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <h3>{{ $items->count() }}</h3>
                    <small class="text-muted">
                        Pending Approval
                    </small>
                </div>
            </div>
        </div>

    </div>

    @forelse($items as $item)

    <div class="card report-card shadow-sm mb-3">

        <div class="card-body">

            <div class="d-flex justify-content-between">

                <div>

                    <h5 class="fw-bold">
                        {{ $item->title }}
                    </h5>

                    <span class="badge badge-pending">
                        Pending
                    </span>

                </div>

            </div>

            <hr>

            <p>
                {{ $item->description }}
            </p>

            <div class="row mb-3">

                <div class="col-md-4">
                    <strong>Category</strong><br>
                    {{ $item->category }}
                </div>

                <div class="col-md-4">
                    <strong>Location</strong><br>
                    {{ $item->location }}
                </div>

                <div class="col-md-4">
                    <strong>Submitted By</strong><br>
                    {{ optional($item->user)->name }}
                </div>

            </div>

            <div class="d-flex gap-2">

                <form method="POST"
                      action="/admin/reports/{{ $item->id }}/approve">

                    @csrf

                    <button class="btn btn-success">
                        <i class='bx bx-check'></i>
                        Approve
                    </button>

                </form>

                <form method="POST"
                      action="/admin/reports/{{ $item->id }}/reject">

                    @csrf

                    <button class="btn btn-danger">
                        <i class='bx bx-x'></i>
                        Reject
                    </button>

                </form>

            </div>

        </div>

    </div>

    @empty

    <div class="card shadow-sm">

        <div class="card-body text-center py-5">

            <i class='bx bx-check-circle fs-1 text-success'></i>

            <h4 class="mt-3">
                No Pending Reports
            </h4>

            <p class="text-muted">
                Everything has been reviewed.
            </p>

        </div>

    </div>

    @endforelse

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>