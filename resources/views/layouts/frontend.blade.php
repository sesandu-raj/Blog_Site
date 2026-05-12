<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inkwell — A Modern Blog</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet"/>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  @vite('resources/css/blog.css')
</head>
<body>
<!-- ═══════════ NAVBAR ═══════════ -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Ink<span>well</span></a>

    <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#navMain">
      <i class="bi bi-list fs-4"></i>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto ms-3">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Technology</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Design</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Culture</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
      </ul>

      <div class="d-flex align-items-center gap-3">
        <div class="search-wrap d-none d-lg-block">
          <input type="text" placeholder="Search articles…">
          <i class="bi bi-search"></i>
        </div>
          <a href="{{ route('login') }}" class="nav-link">Login</a>
          <a href="{{ route('register') }}" class="nav-link btn-subscribe">Register</a>
      </div>
    </div>
  </div>
</nav>

<!-- ═══════════ HERO ═══════════ -->
 @yield('hero')

<!-- ═══════════ MAIN CONTENT ═══════════ -->
<main class="container my-5">
  <div class="row g-5">

    <!-- ── LEFT: Articles ── -->
    <div class="col-lg-8">

      <!-- Latest Posts Grid -->
      <div class="section-header">
        <h2>Latest Stories</h2>
        <a href="#">View All <i class="bi bi-arrow-right"></i></a>
      </div>

      @yield('content')

      <!-- Most Read List -->

      <!-- Pagination -->

    </div>
  </div>
</main>

<!-- ═══════════ FOOTER ═══════════ -->
<footer>
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-4">
        <div class="brand mb-3">Ink<span>well</span></div>
        <p>An independent publication built for curious minds. No algorithms. No clickbait. Just good writing.</p>
        <div class="social-links mt-3">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
          <a href="#"><i class="bi bi-rss-fill"></i></a>
        </div>
      </div>
      <div class="col-6 col-lg-2">
        <h6>Topics</h6>
        <ul>
          <li><a href="#">Technology</a></li>
          <li><a href="#">Design</a></li>
          <li><a href="#">Science</a></li>
          <li><a href="#">Culture</a></li>
          <li><a href="#">Politics</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h6>Company</h6>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Advertise</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h6>Legal</h6>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Cookie Policy</a></li>
          <li><a href="#">Sitemap</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h6>Readers</h6>
        <ul>
          <li><a href="#">Newsletter</a></li>
          <li><a href="#">RSS Feed</a></li>
          <li><a href="#">Write for Us</a></li>
          <li><a href="#">Community</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© 2025 Inkwell. All rights reserved.</span>
      <span>Made with <i class="bi bi-heart-fill" style="color:var(--accent);font-size:0.75rem;"></i> for readers everywhere</span>
    </div>
  </div>
</footer>

<!-- Back to Top -->
<button id="backToTop"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Back to top button
  const btn = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    btn.style.display = window.scrollY > 400 ? 'flex' : 'none';
  });
  btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  // Active nav on scroll (simple highlight)
  const navLinks = document.querySelectorAll('.topic-tabs .nav-link');
  navLinks.forEach(l => l.addEventListener('click', function(e) {
    e.preventDefault();
    navLinks.forEach(x => x.classList.remove('active'));
    this.classList.add('active');
  }));
</script>
</body>
</html>
