<style>
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
        @if(isset($clientMessages) && $clientMessages->count() > 0)
        @foreach($clientMessages->take(4) as $clientMessage)
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

      <p class="sm-text test-mess col-md-10 ">{{ \Str::limit(strip_tags($clientMessage->message), 500) }}</p>

      <div class="d-flex pt-2">
      </div>
      <h3 class="mb-0 md-text">
          {{ $clientMessage->name }}
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
