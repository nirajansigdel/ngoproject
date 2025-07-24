@extends('frontend.layouts.master')

@section('content')


<div class="hero">
    <img src="{{ asset('image/um.jpg') }}" alt="Blog Banner">
    <div class="hero-title">Events & news </div>
</div>


<section class="container-fluid bg-light">
<div class="container py-5 ">
    <div class="row">
  
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('image/um.jpg') }}" class="blog-img" alt="">
                    <div class="blog-info">
                        <span class="badge">Event & News</span>
                        <h5>this is the title</h5>
                        <p>Whatever you’re publishing. Whoever your audience is. WordPress.com makes it simple to get started. And easy to expand your site as your audience grows.</p>
                        <a href="#" class="btn btn-sm btn-outline-light mt-2 read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
    </div>
</div>
</section>



@endsection 