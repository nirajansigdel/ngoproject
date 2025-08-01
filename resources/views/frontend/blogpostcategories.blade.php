@extends('frontend.layouts.master')

@section('content')

<!-- ======= Blog Hero Section ======= -->

<div class="hero">
    <img src="{{ asset('image/um.jpg') }}" alt="Blog Banner">
    <div class="hero-title">BLOGS</div>
</div>

<!-- ======= Blog Grid Section ======= -->
<style>
 

</style>



<section class="container-fluid bg-light">
<div class="container py-5 ">
    <div class="directors-header mb-5 text-center">
            <h1 class="extralarger blackhighlight mb-1">🌟 Collection of Blogs</h1>
            <p class="section-subtitle text-secondary text-center">
                Our blog shares stories, insights, and updates from passionate voices working to shape a better Nepal—one idea at a time.
            </p>
        </div>
    <div class="row">
        @foreach ($blogpostcategories->take(3) as $blogs)
            <div class="col-md-4 mb-4">
                <div class="blog-card">
                    <img src="{{ asset('uploads/blogpostcategory/' . $blogs->image) }}" class="blog-img" alt="{{ $blogs->title }}">

                    <div class="blog-info">
                        <span class="badge">BLOG</span>
                        <h5 class="fw-blod">{{ $blogs->title }}</h5>
                         <p>{{Str::limit(strip_tags($blogs->content), 150) }}</p>
                       <a href="{{ route('SingleBlogpostcategory', $blogs->slug) }}" class="btn btn-sm btn-outline-light mt-2 read-more-btn">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>

<style>
    .ascent-flow .circle-img {
    position: relative;
    display: inline-block;
    background: radial-gradient(circle at center, #fff 50%, #f8dcdc 51%);
    border-radius: 50%;
    padding: 10px;
    border: 2px dashed #b40000;
    width: 220px;
    height: 220px;
    overflow: hidden;
}

.ascent-flow .circle-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.central-logo img {
    width: 200px;
    height: 200px;
    object-fit: contain;
}

.label-tag {
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%);
    background: #b40000;
    color: #fff;
    padding: 6px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.label-tag::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -12px;
    width: 6px;
    height: 6px;
    background: #b40000;
    border-radius: 50%;
    transform: translateY(-50%);
    animation: pulse 1s infinite;
}

.label-info {
    position: absolute;
    top: -10px;
    left: 0;
    background: #fff;
    padding: 3px 10px;
    font-size: 12px;
    font-weight: 500;
    color: #b40000;
    border: 1px dashed #b40000;
    border-radius: 20px;
}

.flow-caption {
    font-weight: 600;
    font-size: 18px;
}

@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.4); opacity: 0.6; }
    100% { transform: scale(1); opacity: 1; }
}

@media (max-width: 768px) {
    .central-logo img {
        width: 150px;
        height: 150px;
    }
    .ascent-flow .circle-img {
        width: 160px;
        height: 160px;
    }
    .label-tag {
        font-size: 12px;
        padding: 4px 10px;
    }
}

</style>

<section class="ascent-flow my-5">
    <div class="container text-center">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-4 position-relative mb-4">
                <div class="circle-img">
                    <img src="{{ asset('image/um.jpg') }}" class="img-fluid" alt="New Customer">
                    <div class="label-tag red">Active</div>
                
                </div>
                <p class="flow-caption mt-3">Hope for Every Child</p>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="central-logo">
                    <img src="{{ asset('image/OIP.jpeg') }}" class="img-fluid" alt="Aide Ascent">
                </div>
            </div>

            <div class="col-md-4 position-relative mb-4">
                <div class="circle-img">
                    <img src="{{ asset('image/heroimage.png') }}" class="img-fluid rounded-circle" alt="Operations">
                    <div class="label-tag red">Need</div>
                
                </div>
                <p class="flow-caption mt-3">Empower Young Lives</p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4 position-relative">
                <div class="circle-img">
                    <img src="{{ asset('image/um.jpg') }}" class="img-fluid rounded-circle" alt="Loyal Customer">
                    <div class="label-tag red">On time</div>
                    
                </div>
                <p class="flow-caption mt-3">Growing with Grace</p>
            </div>
        </div>
    </div>
</section>

@endsection


