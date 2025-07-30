@extends('frontend.layouts.master')
@section('content')


<section class="position-relative bg-dark text-white d-flex align-items-center justify-content-center" style="height: 50vh;">
  <!-- Background Image & Overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-image" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1400&q=80'); background-size: cover; background-position: center;">
    <div class="w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>
  </div>

  <!-- Content -->
  <div class="container text-center position-relative z-1 ">
    <h1 class="fw-bold display-5">Child Care Home</h1>
    <p class="text-white-50 text-uppercase small mt-2">Home / Child Care Home</p>
  </div>
</section>


<section class="text-center mt-4">
    foreach
  <img src="{{ asset('images/projects/cyc.jpg') }}" alt="CYC Project" class="img-fluid rounded mb-4" />
  <h2 class="fw-bold">title</h2>
  <p class="text-muted">
   content
  </p>
</section>



@endsection