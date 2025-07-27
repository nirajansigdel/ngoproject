@extends('frontend.layouts.master')

@section('content')


<div class="hero">
    <img src="{{ asset('image/um.jpg') }}" alt="Blog Banner">
    <div class="hero-title">Events & news </div>
</div>


<section class="container-fluid bg-light">
<div class="container py-5 ">
    <div class="row">
        @foreach ($blogpostcategories->take(3) as $blogs)
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('uploads/blogpostcategory/' . $blogs->image) }}" class="blog-img" alt="{{ $blogs->title }}">

                    <div class="blog-info">
                        <span class="badge">BLOG</span>
                        <h5>{{ $blogs->title }}</h5>
                     <p>{{Str::limit(strip_tags($blogs->content), 150) }}</p>

                        <a href="{{ route('SingleBlogCategory', $blogs->slug) }}" class="btn btn-sm btn-outline-light mt-2 read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>



@endsection 