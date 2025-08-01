@extends('frontend.layouts.master')

@section('content')

<!-- ======= Blog Hero Section ======= -->

<div class="hero">
    <img src="{{ asset('image/um.jpg') }}" alt="Blog Banner">
    <div class="hero-title">News & Events</div>
</div>

<!-- ======= Blog Grid Section ======= -->
<style>
 

</style>



<section class="container-fluid bg-light">
   <h1 style="text-align:center; font-family:Arial, sans-serif; font-size:3rem; color:#2f8b45; margin:40px 0; letter-spacing:2px; text-transform:uppercase; text-shadow:1px 1px 3px rgba(0,0,0,0.2);">
  Our Events
</h1>

<div class="container py-5 ">
    <div class="row">
        @foreach ($events->take(3) as $event)
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('uploads/events/' . $event->image) }}" >

                    <div class="blog-info">
                        <span class="badge">Event</span>
                        <h5>{{ $event->heading }}</h5>
                         <p>{{Str::limit(strip_tags($event->content), 150) }}</p>
                       <a href="{{ route('SingleBlogCategory', $event->slug) }}" class="btn btn-sm btn-outline-light mt-2 read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection


