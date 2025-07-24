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


  <section class="container-fluid cardslider1 whyus gapbetweensection py-5">
    <div class="container">
    <div class="row col-12">
      <div class="text-center py-2">
      <h1 class="extralarger blackhighlight"> Learn With Us</h1>
      <p class="xs-text">"Explore the path to inner and self-discovery. Learn Yoga Meditation with us."</p>
      </div>
    </div>
    <div class="row mt-3">
      @foreach ($services as $service)
      <div class="item col-md-4">
      <div class="col-md-10 fcc flex-column">
      <a href="{{ route('SingleService', ['slug' => $service->slug]) }}" class="">

      <div class="d-flex gap-2 justify-content-center">
        @if ($service->image)
      <img src="{{ asset('uploads/service/' . $service->image) }}" class="smimage mb-2" alt="Service Image">
      @else
      <img
      src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8"
      class="smimage mb-2" alt="Default Image">
      @endif
      </div>
      <div class="col-12 flex-column ">
        <h3 class="md-text mb-2 text-center">{{ Str::limit(strip_tags($service->description), 20) }}</h3>
        <p class="extra-small-text1 text-center mx-2">
        {{ Str::limit(strip_tags($service->description), 50) }}
        </p>
      </div>

      </a>
      </div>
      </div>
    @endforeach
    </div>
    </div>
  </section>
@endsection