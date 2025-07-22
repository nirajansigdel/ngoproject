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

    <!-- Card 1: School Demands -->
    <div class="row g-4">
      @foreach ($demands->where('type', 'school') as $course)
        @include('frontend.includes._demand_card', ['course' => $course])
      @endforeach
    </div>

    <!-- Card 2: College Demands -->
    <div class="row g-4">
      @foreach ($demands->where('type', 'college') as $course)
        @include('frontend.includes._demand_card', ['course' => $course])
      @endforeach
    </div>

    <!-- Card 3: Employer Demands -->
    <div class="row g-4">
      @foreach ($demands->where('type', 'employer') as $course)
        @include('frontend.includes._demand_card', ['course' => $course])
      @endforeach
    </div>


      Cards 4 
    <div class="row g-4">
      @foreach ($demands as $course)
      <div class="col-md-4">
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
            <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

 card 5

    <div class="row g-4">
      @foreach ($demands as $course)
      <div class="col-md-4">
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
            <div class="mb-4">
                <button class="join-btn join-now-btn">Join now</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    

    <!-- View More Button -->
    <div class="text-center mt-5">
      <a href="{{ route('Demand') }}" class="btn btn-primary px-4 py-2 view-more-btn">View More</a>
    </div>
  </div>
</section>