<style>
  .whyus {
    background: var(--white-off);
  }

  .item .col-md-10 {
    position: relative;
    overflow: hidden; /* To keep everything inside the card */
    background: linear-gradient(to top, #F2F2FF 0%, #E6E6FF 40%, #FAFAFA 100%);
    border-radius: 10px;
    transition: all 0.3s ease-in-out; /* Smooth transition */
    padding:24px 2px;
    min-height: 40vh;
  }

  


</style>


<section class="container-fluid cardslider1 whyus gapbetweensection py-5">
  <div class="container">
    <div class="row col-12">
      <div class="text-center py-2">
        <h1 class="extralarger blackhighlight">service</h1>
        <p class="xs-text">"Explore the path to inner and self-discovery. Learn Yoga Meditation with us."</p>
      </div>
    </div>
    <div class="row mt-3">
      @foreach ($services as $service)
        <div class="item col-md-4">
          <div class="col-md-10 fcc flex-column">
            <a href="{{ route('SingleService', ['slug' => $service->slug]) }}" class="text-decoration-none text-dark">
              <div class="d-flex gap-2 justify-content-center">
                @if ($service->image)
                  <img src="{{ asset('uploads/service/' . $service->image) }}" class="smimage mb-2" alt="Service Image">
                @else
                  <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8" class="smimage mb-2" alt="Default Image">
                @endif
              </div>
              <div class="col-12 flex-column ">
              <h3 class="md-text mb-2 text-center">{{ Str::limit(strip_tags($service->title), 20) }}</h3>
              <p class="extra-small-text1  mx-2">
                  {!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($service->description)), 150) !!}
              </p>
              </div>
            
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center my-3">
      <a href="{{ route('Service') }}">
        <button class="btn btn-primary px-4 py-2 mt-3">View More</button>
      </a>
    </div>
  </div>
</section>




