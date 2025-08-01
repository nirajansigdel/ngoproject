<style>
  .Service {
    color: var(--primary);
    padding: 20px 2rem;
  }

  .image-bg {
    border-radius: 8px;
    padding: 2px;
  }

  /* Dynamic background colors based on the index of child */
  .Service .row .col-md-4:nth-child(1) .image-bg {
    background: var(--bs-yellow);
  }

  .Service .row .col-md-4:nth-child(2) .image-bg {
    background: #2ECD9A;
  }

  .Service .row .col-md-4:nth-child(3) .image-bg {
    background: var(--primary);
  }

  .Service .row .col-md-4:nth-child(4) .image-bg {
    background: gray;
  }

  .Service .row .col-md-4:nth-child(5) .image-bg {
    background: yellow;
  }

  .Service .row .col-md-4:nth-child(6) .image-bg {
    background: purple;
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

  /* Hidden by default */
  .demand-section {
    display: none;
  }

  /* Show the active section */
  .demand-section.active {
    display: block;
  }
</style>

<!-- multiple post of service -->
<section class="py-5">
  <div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
      <h1 class="extralarger blackhighlight">Most popular project</h1>
      <p class="xs-text">
        "Explore our most popular classes - where wellness meets wisdom. Join us in the journey to holistic well-being."
      </p>
    </div>

    <!-- Category Buttons -->
    <div class="text-center mb-4">
        <button class="btn btn-outline-primary mx-2 category-button active" data-category="cyc">Chautari Youth Club</button>
        <button class="btn btn-outline-primary mx-2 category-button" data-category="nsep">Next Steps Education</button>
        <button class="btn btn-outline-primary mx-2 category-button" data-category="frp">Family Reintegration</button>
        <button class="btn btn-outline-primary mx-2 category-button" data-category="community">Community Empowerment</button>
        <button class="btn btn-outline-primary mx-2 category-button" data-category="bamboo">Bamboo Project</button>
        <button class="btn btn-outline-primary mx-2 category-button" data-category="childcare">Child Care Home</button>
    </div>

    <!-- Card 1: Chautari Youth Club (CYC) -->
    <div id="cyc" class="row g-4 demand-section active">
      @foreach ($demands->where('type', 'cyc')->take(3) as $course)
        <div class="col-md-4">
          <div class="card course-card shadow-sm">
            @if ($course->image)
              <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
              <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
              <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
              <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Card 2: Next Steps Education Program (NSEP) -->
    <div id="nsep" class="row g-4 demand-section">
      @foreach ($demands->where('type', 'nsep')->take(3) as $course)
      <div class="col-md-4">
          <div class="card course-card shadow-sm">
            @if ($course->image)
              <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
              <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
              <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
              <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Card 3: Family Reintegration Program (FRP) -->
    <div id="frp" class="row g-4 demand-section">
      @foreach ($demands->where('type', 'frp')->take(3) as $course)
      <div class="col-md-4">
          <div class="card course-card shadow-sm">
            @if ($course->image)
              <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
              <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
              <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
              <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Card 4: Community Empowerment -->
    <div id="community" class="row g-4 demand-section">
      @foreach ($demands->where('type', 'community')->take(3) as $course)
      <div class="col-md-4">
          <div class="card course-card shadow-sm">
            @if ($course->image)
              <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
              <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
              <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
              <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Card 5: Bamboo Project -->
    <div id="bamboo" class="row g-4 demand-section">
      @foreach ($demands->where('type', 'bamboo')->take(3) as $course)
      <div class="col-md-4">
          <div class="card course-card shadow-sm">
            @if ($course->image)
              <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
              <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
              <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
              <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Card 6: Child Care Home -->
    <div id="childcare" class="row g-4 demand-section">
      @foreach ($demands->where('type', 'childcare')->take(3) as $course)
      <div class="col-md-4">
          <div class="card course-card shadow-sm">
            @if ($course->image)
              <img src="{{ asset('uploads/demands/' . $course->image) }}" class="card-img-top course-img" alt="Course Image">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="course-title">{{ Str::limit(strip_tags($course->description), 40) }}</h5>
              <p class="course-desc">{{ Str::limit(strip_tags($course->vacancy), 50) }}</p>
              <p class="course-desc mb-3">{{ Str::limit(strip_tags($course->content), 30) }}</p>
              <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-button');
        const demandSections = document.querySelectorAll('.demand-section');

        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.dataset.category;

                // Remove active class from all buttons and sections
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                demandSections.forEach(section => section.classList.remove('active'));

                // Add active class to the clicked button
                this.classList.add('active');

                // Show the selected section
                document.getElementById(category).classList.add('active');
            });
        });
    });
</script>