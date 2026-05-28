<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lost and found form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body style="background:#f6f7fb; font-family:'Poppins', sans-serif;">
<div class="container py-5">
    <div class="row align-items-center">

        <div class="col-lg-6 mb-4">
            <p class="text-muted">WE ARE HERE TO HELP</p>
            <h1 class="fw-bold">
                Report Your <br>
                <span style="color:#355872;">Lost or Found Item</span>
            </h1>

            <p class="text-muted mt-3">
                Found something? Lost something? Report it here so others can
                help return it to the rightful owner.
            </p>

            <div class="mt-4">
                <p>
                    <i class='bx bx-envelope' style="color:#355872;"></i>
                    support@lostfound.com
                </p>

                <p>
                    <i class='bx bx-phone' style="color:#355872;"></i>
                    +62 812-3456-7890
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-lg border-0 p-4 rounded-4 mt-3">
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form method="POST" action="/report" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="website" style="display:none">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" name="title" class="form-control" placeholder="Wallet, Phone, Bag...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option selected disabled>Select category</option>
                            <option>Electronics</option>
                            <option>Bags</option>
                            <option>Keys</option>
                            <option>Documents</option>
                            <option>Makeup</option>
                            <option>Others</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Where was it lost or found?">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="" disabled selected>Select status</option>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Describe the item..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control" placeholder="your@email.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Item Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn w-100 text-white"
                        style="background:#355872; border-radius:30px;">
                        <i class='bx bx-send'></i> Submit Report
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     @if(session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Report Submitted!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#355872'
        }).then(() => {
            window.location.href = '/items';
        });
        </script>
    @endif
  </body>
</html>