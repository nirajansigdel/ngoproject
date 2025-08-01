 {{-- <style>
 
  .indextestimonial button {
    background: var(--primary);
    color: var(--white);
    padding: 10px 20px;
    border: none;
    border-radius: var( --radius8)!important;
    stroke: none;
  }
  .test-mess{
    font-size: 18px !important;
  }
</style>

<section class="container-fluid indextestimonial mb-5 pt-4">
  <div class="container d-flex flex-column justify-content-center">
    <div class="py-2">
      <p class="companytheme">-Trusted Real estate Care</p>
      <h1 class="extralarger blackhighlight">Dream living Spaces Setting New Build.</h1>
    </div>
    <div class="content-body d-md-flex flex-column pt-3">
      <div class="col-md-12">
     @if(isset($testimonials) && $testimonials->count() > 0)
        @foreach($testimonials->take(4) as $testimonial)

        <div class="flex-md-row box-shadow py-3 testimonialcard" id="grabcard">
  <div class="row rounded">
    <!-- Image Column (col-md-4, 1/3 of the container) -->
    <div class="img-container col-md-4 rounded">
      <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8"
        class="card-img-top w-100 rounded" alt="Service Image" style="object-fit: cover; height: 340px;">
    </div>
    
    <!-- Content Column (col-md-4, 1/3 of the container) -->
    <div class="card-body d-flex flex-column col-md-4 mx-4 gap-2">
   
      <strong class="mb-2 text-success">
        <img src="{{asset('image/dash.png')}}" alt="">
      </strong>
      <h3 class="mb-0 md-text">
    proffesional $ personal
      </h3>

      <p class="sm-text test-mess col-md-10 ">{{ \Str::limit(strip_tags($testimonial->message), 500) }}</p>

      <div class="d-flex pt-2">
      </div>
      <h3 class="mb-0 md-text">
          {{ $testimonial->name }}
      </h3>
    </div>
  </div>
</div>

        @endforeach
        @else
          <p class="sm-text-md">No client messages available at this time.</p>
        @endif
      </div>

      <!-- Navigation Buttons -->
      <div class="d-flex mt-2 mx-2 col-md-12 fcc">
        <button class="next-button mx-2 smallscr" id="forward" onclick="forward()">
          <i class="fa-solid fa-arrow-right"></i>
        </button>

        <button class="next-button mx-2" id="backward" onclick="backward()">
          <i class="fa-solid fa-arrow-left"></i>
        </button>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const cards = Array.from(document.querySelectorAll("#grabcard")); // Select all testimonial cards
    const forwardButton = document.getElementById("forward");
    const backwardButton = document.getElementById("backward");
    let currentIndex = 0;

    function updateDisplay() {
      cards.forEach((card, index) => {
        card.style.display = (index === currentIndex) ? 'block' : 'none';
      });
    }

    function forward() {
      if (currentIndex < cards.length - 1) {
        currentIndex++;
        updateDisplay();
      }
    }

    function backward() {
      if (currentIndex > 0) {
        currentIndex--;
        updateDisplay();
      }
    }

    forwardButton.addEventListener("click", forward);
    backwardButton.addEventListener("click", backward);

    // Initial display setup
    updateDisplay();
  });
</script>
 --}}
 <!-- Bootstrap 5 CSS CDN -->
<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="py-5" style="background-color: #f7f7f7;">
  <div class="container">
    
    <div class="row justify-content-center">
      <div class="col-10 position-relative">

        <div class="row gx-0 align-items-center">

          <!-- Image Column -->
          <div class="col-md-6 position-absolute" style="z-index: 2; left: 0;">
            <div class="floating-wrapper rounded  overflow-hidden" style="height: 320px;">
              <img src="{{ asset('image/rescue.avif') }}" alt="Portrait of a girl"
                class="img-fluid w-100 h-100 floating-image" style="object-fit: cover;">
              <button type="button"
                class="btn btn-play position-absolute top-50 start-50 translate-middle rounded-circle border border-white"
                aria-label="Play Video">
                <svg width="24" height="24" fill="#ef6b20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M8 5v14l11-7z" />
                </svg>
              </button>
            </div>
          </div>

          <!-- Text Content -->
          <div class="offset-md-3 col-md-9  text-white rounded shadow p-5" style="background: #448c4ce4;" >
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <h2 class="fw-light fst-italic mb-4" style="font-size: 2rem;">“I Have a New Hope…”</h2>
                <p>Thousands of children are being forced to grow up in dangerous environments — without safety, support, or a chance at a future..</p>
                <p>Many are denied access to school, pushed into unsafe work, or trapped in cycles of exploitation. But it doesn’t have to stay this way.</p>
                <p class="fst-italic">
                  You can help send <strong>Umbrella Organization Nepal</strong> agents to children trapped in these harsh realities and help restore their dreams.
                </p>
                <button type="button" class="btn btn-outline-light  mt-3 px-4 py-3">BECOME A OUR TEAM</button>
              </div>
              
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Style Section -->
<style>
  .btn-play {
    background: transparent;
    width: 70px;
    height: 70px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s ease;
  }

  .btn-play:hover {
    background-color: rgba(239, 107, 32, 0.8);
  }

  /* Floating Animation */
  .floating-image {
    animation: float 6s ease-in-out infinite;
  }

  @keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
  }
</style>
