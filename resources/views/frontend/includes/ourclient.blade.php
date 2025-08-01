<style>
  #clientScrollContainer {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  #clientScrollContainer::-webkit-scrollbar {
    display: none;
  }

  .client-card {
    position: relative;
    width: 260px;
    height: 260px;
    cursor: pointer;
    /* border-left: 4px solid #0d6efd; */
    overflow: hidden;
    transition: border-color 0.3s ease;
   
  }

  .card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: filter 0.3s ease;
    
  }

  .client-card:hover .card-image {
    filter: brightness(85%);
  }

  /* Slide-in overlay from left to right
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(13, 110, 253, 0.3);
    transform: translateX(-100%);
    transition: transform 0.9s ease;
    z-index: 1;
    pointer-events: none;
    border-radius:200px;
  }

  .client-card:hover .overlay {
    transform: translateX(0);
    pointer-events: auto;
    border-radius:200px;
  }

  .client-name {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    opacity: 0;
    transition: opacity 0.3s ease 0.1s;
    z-index: 2;
    pointer-events: none;
    user-select: none;
    width: 100%;
    text-align: center;
  }

  .client-card:hover .client-name {
    opacity: 1;
  }
     */
</style>

<section class="container-fluid bg-light client-section py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title fw-bold p-0">🌟 Our Partners</h2>
      <p class="xs-text">Explore the path to inner and self-discovery. Learn Yoga Meditation with us.</p>
    </div>

    <div id="clientScrollContainer" class="d-flex gap-4 overflow-auto px-3 pb-3" style="scroll-behavior: smooth;">
      @foreach ($clients as $client)
        <!-- Client Card -->
        <div class="client-card rounded flex-shrink-0">
          <img src="{{ asset('uploads/client/' . $client->image) }}" alt="{{ $client->name ?? 'Client' }}" class="card-image" />
          <div class="overlay"></div>
          <h5 class="client-name">{{ $client->name ?? 'Client' }}</h5>
        </div>
      @endforeach
    </div>
  </div>
</section>


<script>
  const container = document.getElementById('clientScrollContainer');
  let scrollStep = 1;
  let scrollInterval = 20;

  function autoScroll() {
    if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
      container.scrollLeft = 0;
    } else {
      container.scrollLeft += scrollStep;
    }
  }

  let autoScrollId = setInterval(autoScroll, scrollInterval);

  container.addEventListener('mouseenter', () => clearInterval(autoScrollId));
  container.addEventListener('mouseleave', () => {
    autoScrollId = setInterval(autoScroll, scrollInterval);
  });
</script>
