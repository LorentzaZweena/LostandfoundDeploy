<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>User Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
body{
    background:#f5f7fb;
}

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:260px;
    height:100vh;
    background:#fff;
    padding:25px;
    box-shadow:0 0 20px rgba(0,0,0,.08);
    z-index:1000;
}

.sidebar a{
    display:flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    color:#495057;
    padding:12px;
    border-radius:12px;
    margin-bottom:8px;
    transition:.2s;
}

.sidebar a:hover{
    background:#f1f3f5;
}

.sidebar a.active{
    background:#355872;
    color:white;
}

.content{
    margin-left:280px;
    padding:30px;
}

.user-card{
    border:none;
    border-radius:18px;
}

.role-badge{
    padding:8px 14px;
    border-radius:30px;
    font-size:.85rem;
}

.role-staff{
    background:#d1e7dd;
    color:#146c43;
}

.role-user{
    background:#e2e3e5;
    color:#41464b;
}

@media(max-width:768px){

    .content{
        margin-left:0;
        padding-top:90px;
    }

}
</style>

</head>
<body>

<!-- Mobile Navbar -->
<nav class="navbar bg-white shadow-sm d-md-none fixed-top">
    <div class="container-fluid">

        <button class="btn btn-outline-secondary"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">
            <i class='bx bx-menu'></i>
        </button>

        <span class="fw-bold">
            User Management
        </span>

    </div>
</nav>

<!-- Desktop Sidebar -->
<div class="sidebar d-none d-md-block">

    <h4 class="fw-bold mb-4">
        IT Support
    </h4>

    <a href="/admin/reports">
        <i class='bx bx-home'></i>
        Home
    </a>

    <a href="/admin/reports">
        <i class='bx bx-file'></i>
        Pending Reports
    </a>

    <a href="/admin/users" class="active">
        <i class='bx bx-user'></i>
        User Management
    </a>

    <form method="POST"
          action="{{ route('logout') }}">
        @csrf

        <button class="btn btn-danger w-100 mt-4">
            Logout
        </button>
    </form>

</div>

<!-- Mobile Sidebar -->
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

        <a href="/admin/users"
           class="btn btn-outline-dark w-100 mb-2">
            User Management
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

<!-- Content -->
<div class="content">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">
                User Management
            </h2>

            <p class="text-muted">
                Manage user accounts and roles.
            </p>
        </div>

    </div>

    <div class="row g-3">

        @foreach($users as $user)

        <div class="col-lg-6">

            <div class="card user-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <div>

                            <h5 class="fw-bold mb-1">
                                {{ $user->name }}
                            </h5>

                            <small class="text-muted">
                                {{ $user->email }}
                            </small>

                        </div>

                        <span class="role-badge {{ $user->role == 'staff' ? 'role-staff' : 'role-user' }}">
                            {{ ucfirst($user->role) }}
                        </span>

                    </div>

                    <form method="POST"
                          action="/admin/users/{{ $user->id }}/role">

                        @csrf

                        <div class="row g-2">

                            <div class="col-md-8">

                                <select name="role"
                                        class="form-select">

                                    <option value="user"
                                        {{ $user->role == 'user' ? 'selected' : '' }}>
                                        User
                                    </option>

                                    <option value="staff"
                                        {{ $user->role == 'staff' ? 'selected' : '' }}>
                                        Staff
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-4">

                                <button class="btn btn-primary w-100">
                                    Update
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>