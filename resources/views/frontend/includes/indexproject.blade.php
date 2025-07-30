<style>
  .Service {
    color: var(--primary);
    padding: 20px 2rem;
  }

  .image-bg {
    border-radius: 8px;
    padding: 2px;
  }

  .course-card {
    transition: transform 0.3s ease;
    border: none;
    border-radius: 12px;
    overflow: hidden;
  }

  .course-card:hover {
    transform: translateY(-5px);
  }

  .course-img {
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .card-body {
    padding: 1rem;
  }

  .course-title {
    color: #2c3e50;
    margin-bottom: 0.75rem;
    font-size: 1.1rem;
    min-height: 40px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .course-desc {
    color: #5d6d7e;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    min-height: 20px;
  }

  .join-btn {
    display: inline-block;
    padding: 4px 12px;
    background: var(--primary);
    color: white;
    border-radius: 15px;
    font-size: 0.8rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid var(--primary);
  }

  .join-btn:hover {
    background: transparent;
    color: var(--primary);
  }

  .view-more-btn {
    padding: 8px 24px;
    font-size: 0.95rem;
  }
</style>

<section class="py-5 Service">
  <div class="container">

    <!-- Section Title -->
    <div class="text-center mb-5">
      <h1 class="extralarger blackhighlight">Most popular project</h1>
      <p class="xs-text">
        "Explore our most popular classes - where wellness meets wisdom. Join us in the journey to holistic well-being."
      </p>
    </div>
    <!-- Carousel for remaining demands or all -->
    <div id="coursesCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        @php
          $chunks = $demands->chunk(3);
        @endphp

        @foreach ($chunks as $index => $coursesChunk)
          <div class="carousel-item @if($index == 0) active @endif">
            <div class="row g-4 justify-content-center">
              @foreach ($coursesChunk as $course)
                <a class="col-md-4" style="text-decoration: none;">
                  <div class="card course-card shadow-sm">
                    @if ($course->image)
                      <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
                    @else
                      <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" class="card-img-top course-img" alt="Default Image">
                    @endif
                    <div class="card-body d-flex flex-column">
                      <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
                      <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
                      <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        @endforeach

      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#coursesCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#coursesCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- View More Button -->
    <div class="text-center mt-5">
      <a href="{{ route('Demand') }}" class="btn btn-primary px-4 py-2 view-more-btn">View More</a>
    </div>

  </div>
</section>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Bootstrap JS Bundle (Popper + Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
