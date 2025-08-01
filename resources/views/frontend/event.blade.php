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
    <div class="directors-header mb-5 text-center">
            <h1 class="extralarger blackhighlight mb-1">🌟 Collection of Events</h1>
            <p class="section-subtitle text-secondary text-center">
                Our board brings expertise and heart to every decision, shaping a better Nepal for future generations.
            </p>
        </div>
    <div class="row">
        @foreach ($events->take(3) as $event)
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('uploads/events/' . $event->image) }}" >

                    <div class="blog-info">
                        <span class="badge">Event</span>
                        <h5>{{ $event->heading }}</h5>
                         <p>{{Str::limit(strip_tags($event->content), 150) }}</p>
                       <a href="{{ route('singleevents', $event->slug) }}" class="btn btn-sm btn-outline-light mt-2 read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>
@endsection


