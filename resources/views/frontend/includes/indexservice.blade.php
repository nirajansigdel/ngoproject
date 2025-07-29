
<style>


 Update styles for the service cards */
.whyus {
  background-color: #f5f5f5; /* similar to donation section background */
  padding: 60px 0;
}

.service-card {
  background: white;
  border-radius: 8px;
  padding: 24px 16px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  transition: 0.3s ease-in-out;
  min-height:280px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.service-card:hover {
  transform: translateY(-4px);
}

.service-card img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
  margin-bottom: 16px;
}

.service-card h3 {
  font-size: 20px;
  font-weight: 600;
  text-align: center;
  color: #333;
  margin-bottom: 12px;
}

.service-card p {
  font-size: 14px;
  color: #666;
  text-align: center;
}

.btn-primary {
  background-color: #f26522;
  border-color: #f26522;
  font-weight: 600;
}

.btn-primary:hover {
  background-color: #d4571e;
  border-color: #d4571e;
}

</style>
<section class="container-fluid whyus py-5">
  <div class="container">
    <div class="row">
      <div class="text-center mb-4">
        <h1 class="extralarger">Our Services</h1>
        <p class="xs-text">Explore the path to inner and self-discovery. Learn Yoga Meditation with us.</p>
      </div>
    </div>
    <div class="row">
      @foreach ($services as $service)
        <div class="col-md-4 mb-4">
          <div class="service-card text-center">
            <a href="{{ route('SingleService', ['slug' => $service->slug]) }}" class="text-decoration-none text-dark">
              @if ($service->image)
                <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Service Image">
              @else
                <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" alt="Default Image">
              @endif
              <h3>{{ Str::limit(strip_tags($service->title), 30) }}</h3>
              <p>{!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($service->description)), 150) !!}</p>
            </a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center mt-4">
      <a href="{{ route('Service') }}">
        <button class="btn btn-primary px-4 py-2">View More</button>
      </a>
    </div>
  </div>
</section>

