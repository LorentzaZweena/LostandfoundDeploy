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
            <a class="nav-link fw-semibold active" href="#hero">Home</a>
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
    <section class="hero py-5" id="hero">
  <div class="container">
  <div class="row align-items-center py-5">

    <div class="col-lg-6">
      <h1 class="fw-bold display-5">
        Find Lost Items or Help Others Get Them Back
      </h1>

      <p class="text-muted mt-3">
        Lost something important? Found an item that belongs to someone else?
        Lost&Found helps people report, search, and reconnect lost belongings
        with their rightful owners quickly and easily.
      </p>

      <div class="mt-4 d-flex align-items-center gap-3">
        <a href="/report" class="btn btn-primary rounded-pill px-4 py-2">
          Report Item
        </a>

        <a href="/items" class="btn btn-outline-secondary rounded-pill px-4 py-2">
          Browse Lost Items
        </a>
      </div>
    </div>

    <div class="col-lg-6 text-center">
      <img src="{{ asset('img/undraw_job-offers_55y0.png') }}" class="img-fluid">
    </div>

  </div>
</div>

    <section class="companies py-4">
  <div class="container">
    <div class="row text-center align-items-center g-3 text-white">

      <div class="col-6 col-md-4 col-lg">
        <div class="company-item">
          <img src="{{ asset('img/UI.png') }}" height="60" class="mb-2">
          <div>Universitas Indonesia</div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg">
        <div class="company-item">
          <img src="{{ asset('img/unesa.png') }}" height="50" class="mb-2">
          <div>Universitas Negeri Surabaya</div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg">
        <div class="company-item">
          <img src="{{ asset('img/telu.png') }}" height="55" class="mb-2">
          <div>Telkom University</div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg">
        <div class="company-item">
          <img src="{{ asset('img/ut.png') }}" height="50" class="mb-2">
          <div>Universitas Terbuka</div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg">
        <div class="company-item">
          <img src="{{ asset('img/pa.png') }}" height="50" class="mb-2">
          <div>Politeknik APP Jakarta</div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg">
        <div class="company-item">
          <img src="{{ asset('img/stp.png') }}" height="50" class="mb-2">
          <div>Sekolah tinggi perikanan</div>
        </div>
      </div>

    </div>
  </div>
</section>
</section>
    <section class="categories py-5" id="categories">
      <div class="container">

        <div class="text-center mb-5">
          <h2 class="fw-bold">Lost & Found Categories</h2>
          <p class="text-muted">
            Browse items by category to quickly find what you lost or report what you found.
          </p>
        </div>

        <div class="row g-4">

      <div class="col-md-4">
        <div class="category-card">
          📱 Electronics
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          🎒 Bags
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          🪪 ID Cards
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          🔑 Keys
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          📚 Books
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          💄 Make up
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          💍 Accessories
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          📄 Documents
        </div>
      </div>

      <div class="col-md-4">
        <div class="category-card">
          📦 Others
        </div>
      </div>

    </div>
      </div>
    </section>
    <section class="about py-5">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-lg-6 text-center mb-4 mb-lg-0">
        <img src="{{ asset('img/undraw_web-search_7oif.png') }}" class="img-fluid rounded">
      </div>

      <div class="col-lg-6">

        <p class="text-uppercase text-muted fw-semibold">About Lost&Found</p>

        <h2 class="fw-bold mb-3">
          Reconnect <span class="text-primaryy">Lost Items</span> <br> With Their Owners
        </h2>

        <p class="text-muted">
          Lost&Found helps students and communities report lost items,
          search for belongings, and return them to their rightful owners
          quickly and safely.
        </p>

        <ul class="list-unstyled mt-4">
          <li class="mb-2">✔ Report lost or found items easily</li>
          <li class="mb-2">✔ Search items by category or location</li>
          <li class="mb-2">✔ Connect with the owner, finder, and staffs</li>
        </ul>

      </div>

    </div>
  </div>
</section>
<section class="services py-5" id="services">
  <div class="container text-center">

    <p class="text-muted fw-semibold">Our Services</p>
    <h2 class="fw-bold mb-5">How Lost&Found Helps You</h2>

    <div class="row g-4">

      <div class="col-md-4">
        <div class="service-box p-4">
          <div class="icon mb-3">📢</div>
          <h5 class="fw-bold">Report Lost Items</h5>
          <p class="text-muted">
            Easily report items you lost with details like category,
            location, and description so others can help find them.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="service-box p-4">
          <div class="icon mb-3">🔍</div>
          <h5 class="fw-bold">Search Found Items</h5>
          <p class="text-muted">
            Browse through reported found items by category
            to see if someone has already found your belongings.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="service-box p-4">
          <div class="icon mb-3">🤝</div>
          <h5 class="fw-bold">Reconnect everyone</h5>
          <p class="text-muted">
            Contact the finder, owner, and staff directly through the
            platform to safely return lost belongings.
          </p>
        </div>
      </div>

    </div>

  </div>
</section>
<section class="pricing py-5 bg-light-subtle">
  <div class="container text-center">
    <h2 class="fw-bold mb-5">Pricing Plan</h2>
    <div class="row g-4 justify-content-center">
      <div class="col-md-4">
        <div class="pricing-card p-4 text-start">
          <div class="d-flex align-items-center mb-3">
            <div class="icon-circle me-2 "></div>
            <h6 class="fw-semibold mb-0">Free Plan</h6>
          </div>

          <h3 class="fw-bold">IDR 0</h3>
          <p class="text-muted small mb-4">
            Perfect for users who want to report and browse lost items.
          </p>

          <ul class="list-unstyled feature-list">
            <li><i class='bx bx-check'></i> Unlimited reports</li>
            <li><i class='bx bx-check'></i> View all items</li>
            <li><i class='bx bx-check'></i> Basic support</li>
          </ul>

          <a href="#" class="btn btn-outline-primary w-100 rounded-pill mt-4">
            Selected
          </a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="pricing-card active p-4 text-start">
          <div class="d-flex align-items-center mb-3">
            <div class="icon-circle me-2"></div>
            <h6 class="fw-semibold mb-0">Priority Plan</h6>
          </div>

          <h3 class="fw-bold">IDR 17.000</h3>
          <p class="text-muted small mb-4">
            Ideal for users who want better visibility and faster responses.
          </p>

          <ul class="list-unstyled feature-list">
            <li><i class='bx bx-check'></i> Priority listing in search</li>
            <li><i class='bx bx-check'></i> Highlighted report card</li>
            <li><i class='bx bx-check'></i> Auto bump reports</li>
            <li><i class='bx bx-check'></i> Faster support</li>
          </ul>

          <button class="btn btn-primary w-100 rounded-pill mt-4 pay-button" data-price="17000">
              Get Started
          </button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="pricing-card p-4 text-start">
          <div class="d-flex align-items-center mb-3">
            <div class="icon-circle me-2"></div>
            <h6 class="fw-semibold mb-0">Premium Plan</h6>
          </div>

          <h3 class="fw-bold">IDR 50.000</h3>
          <p class="text-muted small mb-4">
            Take full control of your reports with advanced tools and customization.
          </p>

          <ul class="list-unstyled feature-list">
            <li><i class='bx bx-check'></i> Premium badge on report</li>
            <li><i class='bx bx-check'></i> Upload multiple images</li>
            <li><i class='bx bx-check'></i> Edit & update anytime</li>
            <li><i class='bx bx-check'></i> Detailed report analytics</li>
          </ul>

          <a href="#" class="btn btn-outline-primary w-100 rounded-pill mt-4">
            Get Started
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="faq py-5 bg-light">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
      <p class="text-muted">Everything you need to know about Lost&Found</p>
    </div>

    <div class="accordion" id="faqAccordion">

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
            How do I report a lost item?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Simply click "Report Item" and fill in the required details such as title, location, and description.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
            Is this platform free to use?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! Basic features are free. Premium plans offer additional benefits like priority listing.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
            How do I contact the item owner?
          </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Each report includes contact details so you can directly reach the owner or finder.
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
<section class="contact py-5" id="contact">
    <div class="container">

    <div class="row g-5 align-items-start">

    <div class="col-lg-7">

    <p class="text-primaryy fw-semibold small">SEND US A MESSAGE</p>
    <h3 class="fw-bold mb-3">
      Seamless Communication, Global Impact.
    </h3>

    <p class="text-muted mb-4">
      Need help returning a lost item or reporting something you found?
      Send us a message and our team will assist you.
    </p>

    <form>
      <div class="row g-3">

      <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Name">
      </div>

      <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Company">
      </div>

      <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Phone">
      </div>

      <div class="col-md-6">
      <input type="email" class="form-control" placeholder="Email">
      </div>

      <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Subject">
      </div>

      <div class="col-md-6">
      <input type="text" class="form-control" placeholder="Topic">
      </div>

      <div class="col-12">
      <textarea class="form-control" rows="4" placeholder="Message"></textarea>
</div>

    <div class="col-12">
    <button class="btn btn-primary rounded-pill px-4">
      Send Message
    </button>
    </div>

    </div>
    </form>

    </div>

    <div class="col-lg-5">

    <div class="contact-card text-white p-4 rounded">

    <p class="small fw-semibold">GET IN TOUCH</p>

    <h5 class="fw-bold mb-4">
    Seamless Communication, Global Impact.
    </h5>

    <div class="mb-3">
    📍 <strong>Head Office</strong><br>
    Depok, Indonesia
    </div>

    <div class="mb-3">
    ✉️ <strong>Email Support</strong><br>
    lostfound@gmail.com
    </div>

    <div class="mb-4">
    📞 <strong>Let's Talk</strong><br>
    +62 812 3456 7890
    </div>

    <p class="mb-2">Follow us :</p>

    <span class="social-icon">
      <a class="social-btn" href="#"><i class='bx bx-link'></i></a>
    </span>

    <span class="social-icon">
      <a class="social-btn" href="#"><i class='bx bxl-linkedin-square'></i></a>
    </span>

    <span class="social-icon">
      <a class="social-btn" href="#"><i class='bx bxl-instagram-alt'></i></a>
    </span>

    <span class="social-icon">
      <a class="social-btn" href="#"><i class='bx bxl-discord-alt'></i></a>
    </span>

    </div>

    </div>

    </div>
    </div>

    <div class="map mt-5">
    <iframe
    src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
    width="100%"
    height="370"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
    </iframe>
    </div>

</section>

      <footer class="footer text-white pt-5 pb-3">

      <div class="container">

      <div class="row g-4">

      <div class="col-lg-3">
        <h5 class="fw-bold">Lost&Found</h5>
        <p class="small text-light">
        Helping communities reconnect lost items with their rightful owners quickly and safely.
        </p>
      </div>

          <div class="col-lg-3">
            <h6 class="fw-bold">Services</h6>
            <ul class="list-unstyled small">
              <li>Report Lost Item</li>
              <li>Report Found Item</li>
              <li>Browse Items</li>
              <li>Item Management</li>
            </ul>
            </div>

            <div class="col-lg-3">
              <h6 class="fw-bold">Support</h6>
              <ul class="list-unstyled small">
                <li>Help Center</li>
                <li>FAQ</li>
                <li>Contact Us</li>
                <li>Safety Tips</li>
              </ul>
            </div>

            <div class="col-lg-3">
              <h6 class="fw-bold">Newsletter</h6>
              <p class="small">Subscribe for updates</p>

              <div class="d-flex">
                <input type="email" class="form-control me-2" placeholder="Email">
                <button class="btn btn-secondary">Sign Up</button>
              </div>

            </div>

            </div>

      <hr class="mt-4">

        <p class="text-center small mb-0">
          Copyright © 2026 Lost&Found
        </p>

      </div>

      </footer>
      <script>
          const sections = document.querySelectorAll("section");
          const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

          window.addEventListener("scroll", () => {
            let current = "";

            sections.forEach(section => {
              const sectionTop = section.offsetTop - 120;
              const sectionHeight = section.clientHeight;

              if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute("id");
              }
            });

            navLinks.forEach(link => {
              link.classList.remove("active");
              link.classList.remove("fw-bold");

              if (link.getAttribute("href") === "#" + current) {
                link.classList.add("active");
                link.classList.add("fw-bold");
              }
            });
          });
      </script>
      <script>
        const mobileNavLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        mobileNavLinks.forEach(link => {
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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
      document.querySelectorAll('.pay-button').forEach(button => {

          button.addEventListener('click', async function () {

              const price = this.dataset.price;

              const response = await fetch('/pay', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
                  body: JSON.stringify({
                      price: price
                  })
              });

              const data = await response.json();
              if (!data.token) {
                  console.log(data);
                  alert(data.error || "No token received");
                  return;
              }
              snap.pay(data.token, {
                  onSuccess: function(result){
                      alert("Payment Success!");
                      window.location.reload();
                  },

                  onPending: function(result){
                      alert("Waiting for payment!");
                  },

                  onError: function(result){
                      alert("Payment failed!");
                  }
              });

          });

      });
</script>
  </body>
</html>