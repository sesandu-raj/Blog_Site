@extends('layouts.frontend')

@section('hero')
    <section class="hero-section">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div class="hero-label"><i class="bi bi-bookmark-fill me-1"></i>Editor's Pick</div>
        <h1 class="hero-title">The Art of <em>Slow</em> Thinking in a Fast World</h1>
        <p class="hero-excerpt">
          In an age of infinite scroll and instant gratification, the most radical act may be to sit with an idea — to turn it over, examine it, and let it breathe before moving on.
        </p>
        <div class="hero-meta mb-4">
          <img src="https://i.pravatar.cc/80?img=5" alt="Author" class="avatar">
          <span><strong>Sophia Laurent</strong></span>
          <span class="sep">|</span>
          <span>May 10, 2025</span>
          <span class="sep">|</span>
          <span><i class="bi bi-clock me-1"></i>7 min read</span>
        </div>
        <a href="#" class="btn-read">
          Read Article <i class="bi bi-arrow-right"></i>
        </a>
      </div>
      <div class="col-lg-6">
        <div class="hero-img-wrap">
          <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=800&q=80"
               alt="Featured Article">
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content')

    <div class="row g-4 mb-5">
        <!-- Card 1 -->
        <div class="col-md-6">
          <div class="blog-card">
            <div class="blog-card-img-wrap">
              <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?w=600&q=75" alt="AI Article">
            </div>
            <div class="blog-card-body">
              <a href="#" class="category-pill">Technology</a>
              <a href="#" class="blog-card-title">Large Language Models Are Reshaping How We Write</a>
              <p class="blog-card-excerpt">From first drafts to final edits, AI writing tools are now embedded in professional workflows — but at what cost to authentic voice?</p>
              <div class="blog-card-meta">
                <img src="https://i.pravatar.cc/60?img=12" alt="">
                <span>Marcus Chen</span>
                <span class="dot">·</span>
                <span>Apr 28</span>
                <span class="dot">·</span>
                <span>5 min</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-6">
          <div class="blog-card">
            <div class="blog-card-img-wrap">
              <img src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=600&q=75" alt="Design Article">
            </div>
            <div class="blog-card-body">
              <a href="#" class="category-pill">Design</a>
              <a href="#" class="blog-card-title">Why Brutalism Is Making a Comeback in Web Design</a>
              <p class="blog-card-excerpt">Ugly by design, brutalist websites reject the polished aesthetic of modern UI in favour of raw, unapologetic layouts.</p>
              <div class="blog-card-meta">
                <img src="https://i.pravatar.cc/60?img=9" alt="">
                <span>Aya Nakamura</span>
                <span class="dot">·</span>
                <span>Apr 22</span>
                <span class="dot">·</span>
                <span>4 min</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-6">
          <div class="blog-card">
            <div class="blog-card-img-wrap">
              <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=600&q=75" alt="Reading">
            </div>
            <div class="blog-card-body">
              <a href="#" class="category-pill">Culture</a>
              <a href="#" class="blog-card-title">The Quiet Revolution of Independent Bookshops</a>
              <p class="blog-card-excerpt">Despite every prediction of their death, independent bookshops are not just surviving — they're thriving as community anchors.</p>
              <div class="blog-card-meta">
                <img src="https://i.pravatar.cc/60?img=20" alt="">
                <span>Lena Hoffmann</span>
                <span class="dot">·</span>
                <span>Apr 15</span>
                <span class="dot">·</span>
                <span>6 min</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-6">
          <div class="blog-card">
            <div class="blog-card-img-wrap">
              <img src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=600&q=75" alt="Space">
            </div>
            <div class="blog-card-body">
              <a href="#" class="category-pill">Science</a>
              <a href="#" class="blog-card-title">The New Space Race Is Private — And More Dangerous</a>
              <p class="blog-card-excerpt">With billionaires funding lunar missions and Mars ambitions, the ethics and governance of outer space remain dangerously undefined.</p>
              <div class="blog-card-meta">
                <img src="https://i.pravatar.cc/60?img=33" alt="">
                <span>Dario Esposito</span>
                <span class="dot">·</span>
                <span>Apr 10</span>
                <span class="dot">·</span>
                <span>8 min</span>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection