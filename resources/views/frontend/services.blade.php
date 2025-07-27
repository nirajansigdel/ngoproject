@extends('frontend.layouts.master')
@section('content')



  <style>
    .welcome {
    background: var(--white);
    color: var(--primary);
    font-family: var(--font-family);
    font-size: 14px;
    padding: 4px 10px;
    border-radius: 4px;
    width: 46%;
    }

    .carousel-image-container {
    position: relative;
    width: 100%;
    height: 550px;
    }

    .carousel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1;
    pointer-events: none;
    }

    .carousel-caption {
    position: absolute;
    z-index: 2;
    top: 50%;
    left: 32%;
    transform: translate(-50%, -50%);
    color: white;
    max-width: 70%;
    padding: 15px;
    }

    .herosectiontitle {
    width: 76%;
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 15px;
    text-transform: capitalize;
    }

    .heroslogan {
    font-family: var(--font-family);
    font-size: 18px;
    padding: 4px 10px;
    width: 76%;
    }

    .welcome {
    font-size: 1.1rem;
    margin-bottom: 10px;
    }

    .banners-imgs {
    object-fit: cover;
    width: 100%;
    height: 550px;
    }

    .hero-text {
    font-size: 46px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 24px;
    letter-spacing: -0.5px;
    color: #1a1a1a;
    /* Darker gray for elegance */
    font-family: 'Poppins', sans-serif;
    /* Clean, modern font */

    }

    .text-gray {
    color: #333;
    display: block;
    }

    .text-green {
    color: #28a745;
    display: block;
    }

    .xs-text {
    font-size: 18px;
    line-height: 1.6;
    color: #666;
    max-width: 90%;
    }

    .indeximage {
    width: 100%;
    height: 50vh
    }

    /* Media Query for Tablets (between 768px and 1024px) */
    @media (max-width: 1024px) {
    .welcome {
      width: 60%;
      /* Slightly larger width for tablets */
      font-size: 1rem;
      /* Slightly smaller font size */
    }

    .carousel-image-container {
      height: 450px;
      /* Adjust carousel height for smaller screens */
    }

    .carousel-caption {
      left: 50%;
      /* Center the caption for better alignment */
      transform: translate(-50%, -50%);
      /* Center caption */
      max-width: 80%;
      /* Increase max-width for readability */
      font-size: 16px;
      /* Adjust font size */
    }

    .herosectiontitle {
      font-size: 40px;
      /* Adjust title font size for smaller screens */
      width: 80%;
      /* Make the title width slightly larger */
    }

    .heroslogan {
      font-size: 16px;
      /* Slightly smaller font size */
      width: 80%;
      /* Adjust width */
    }

    .banners-imgs {
      height: 450px;
      /* Adjust height of the banner for smaller screens */
    }

    .hero-text {
      font-size: 40px;
    }
    }

    /* Media Query for Mobile Devices (up to 768px) */
    @media (max-width: 768px) {
    .welcome {
      left: 0;
      width: 80%;
      /* Larger width on mobile */
      font-size: 0.95rem;
      /* Slightly smaller font size */
      margin-bottom: 8px;
      /* Adjust margin for mobile */
    }

    .carousel-image-container {
      height: 350px;
      /* Reduce height on mobile */
    }

    .carousel-caption {
      font-size: 14px;
      /* Adjust font size */
      max-width: 100%;
      /* Increase width for readability */
    }

    .herosectiontitle {
      font-size: 32px;
      /* Smaller font size */
      width: 90%;
      /* Increase width for better readability */
    }

    .heroslogan {
      font-size: 14px;
      /* Smaller font size */
      width: 90%;
      /* Adjust width */
    }

    .banners-imgs {
      height: 350px;
      /* Adjust height for smaller screens */
    }

    .hero-text {
      font-size: 36px;
    }

    .xs-text {
      font-size: 16px;
    }
    }

    /* Media Query for Extra Small Devices (up to 480px) */
    @media (max-width: 480px) {
    .welcome {
      width: 240px !important;
      /* Full width on very small screens */
      font-size: 0.85rem;
      /* Further reduce font size */
      padding: 6px 12px;
      /* Increase padding for better touch targets */
    }

    .carousel-image-container {
      left: 0 !important;
      height: 300px;
      /* Reduce height for very small screens */
    }

    .carousel-caption {
      top: 45%;
      left: 24% !important;
      font-size: 12px;
      /* Further reduce caption font size */
      max-width: 95% !important;
      /* Use almost the full width for the caption */
    }

    .herosectiontitle {
      font-size: 24px;
      /* Adjust title for very small screens */
      width: 250px !important;
      /* Full width */
    }

    .heroslogan {
      font-size: 16px;
      /* Smaller font size */
      width: 400px;
      /* Full width */
    }

    .banners-imgs {
      height: 300px;
      /* Reduce banner height */
    }

    .hero-text {
      font-size: 32px;
    }

    .xs-text {
      font-size: 14px;
    }
    }
  </style>


  <!-- herosection -->
  <div class="container-fluid container">
    <div class="row gap-5 my-5 ml-5">
    <div class="col-md-6 d-flex flex-column gap-2">
      <div class="hero-text">
      <span class="text-gray">Explore the Work of</span>
      <span class="text-green">Umbrella Organization</span>
      <span class="text-gray">Transforming Lives in Nepal</span>


      </div>
      <p class="xs-text">
      Every action you take supports the rescue, care, and reintegration of vulnerable children in Nepal. Through
      education, safe homes, and strong community programs, we empower children to reclaim their futures with dignity,
      hope, and opportunity.
      </p>
    </div>

    <div class="col-lg-5 text-center">
      <div class="image-frame p-2 shadow-lg rounded bg-white d-inline-block">
      <img src="{{ asset('image/um.jpg') }}" class="img-fluid rounded" style="max-height:400px;">
      </div>
    </div>



    </div>
  </div>


  <!-- multiple post of service -->
  <style>
    .item .col-md-10 {
    position: relative;
    overflow: hidden;
    /* To keep everything inside the card */
    background: linear-gradient(to top, #F2F2FF 0%, #E6E6FF 40%, #FAFAFA 100%);
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
    /* Smooth transition */
    padding: 24px 2px;
    min-height: 40vh;
    }
  </style>


<section class="container-fluid py-5" style="background: #f8fafc;">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="fw-bold" style="color: #222;">List of Our Services</h1>
      <p class="fs-5 text-muted fst-italic">"Empowering communities through dedicated service and care."</p>
    </div>

    @foreach ($services as $index => $service)
      <div class="row align-items-center mb-5">
        <!-- Image column -->
        <div class="col-md-6 d-flex justify-content-center 
          {{ $index % 2 == 0 ? 'order-1 order-md-2' : 'order-1 order-md-1' }}">
          <div class="overflow-hidden rounded" style="max-width: 400px; max-height: 250px;">
            @if ($service->image)
              <img src="{{ asset('uploads/service/' . $service->image) }}" 
                   alt="Service Image" 
                   class="img-fluid" 
                   style="object-fit: cover; width: 100%; height: 100%;">
            @else
              <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=800&auto=format&fit=crop&q=60" 
                   alt="Default Image" 
                   class="img-fluid" 
                   style="object-fit: cover; width: 100%; height: 100%;">
            @endif
          </div>
        </div>

        <!-- Text column -->
        <div class="col-md-6 d-flex flex-column 
          {{ $index % 2 == 0 ? 'order-2 order-md-1' : 'order-2 order-md-2' }}">
          <h3 class="fw-bold text-dark">{{ Str::limit(strip_tags($service->title), 40) }}</h3>
          <p class="text-secondary mb-4 " style="line-height: 1.5;">
           {!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($service->description)), 350) !!}

          </p>
          <a href="{{ route('SingleService', ['slug' => $service->slug]) }}" 
             class="btn btn-primary px-4 py-2 rounded-pill text-white" style="width: fit-content;">
            Learn More
          </a>
        </div>
      </div>
    @endforeach
  </div>
</section>




@endsection