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
<div class="container py-5 ">
    <div class="row">
        @foreach ($events->take(3) as $event)
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('uploads/events/' . $event->image) }}" class="blog-img" alt="{{ $event->heading }}">

                    <div class="blog-info">
                        <span class="badge">BLOG</span>
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



