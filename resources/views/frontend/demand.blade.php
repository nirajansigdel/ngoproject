@extends('frontend.layouts.master')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

<style>
  .course-section {
    padding: 60px 0;
  
  }

  .course-card {
    transition: transform 0.3s ease;
    border: none;
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 30px;
    background: white;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }

  .course-card:hover {
    transform: translateY(-5px);
  }

  .course-img {
    height: 200px;
    object-fit: cover;
    width: 100%;
  }

  .card-body {
    padding: 1rem;
  }

  .course-title {
    color: #2c3e50;
    margin-bottom: 0.75rem;
    font-size: 1.1rem;
    min-height: 40px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .course-desc {
    color: #5d6d7e;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    min-height: 20px;
    line-height: 1.6;
  }

  .join-btn {
    display: inline-block;
    padding: 4px 12px;
    background: var(--primary);
    color: white;
    border-radius: 15px;
    font-size: 0.8rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid var(--primary);
  }

  .join-btn:hover {
    background: transparent;
    color: var(--primary);
  }

  .section-title {
    margin-bottom: 40px;
  }

  .section-title h1 {
    margin-bottom: 15px;
  }

  .section-title .xs-text {
    max-width: 600px;
    margin: 0 auto;
    color: #666;
  }
</style>

    <!-- herosection -->
    <section class="herosectionforallpage">
        <img src="{{ asset('image/demandbg.png') }}" alt="">
        <div class="container">
            <div class="d-flex flex-column innercontent">
                <span class="maintitle">Courses</span>
                <span class="navigatetitle py-1 mb-1">
                    <a href="" style="color: white !important; text-decoration: none;">Home</a> / <span>Course</span>
                </span>
            </div>
        </div>
    </section>

    <section class="course-section">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="extralarger blackhighlight">Most Popular Classes</h1>
                <p class="xs-text">Our Latest Project showcases innovation, impact, and a commitment to excellence.</p>
            </div>
            
            <div class="row justify-content-center">
                @forelse($demands as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="course-card">
                            @if($project->image)
                                <img src="{{ asset('uploads/demands/' . $project->image) }}" 
                                     class="course-img" 
                                     alt="Course Image">
                            @else
                                <img src="https://via.placeholder.com/400x200" 
                                     class="course-img" 
                                     alt="Default Course Image">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="course-title">{{ $project->vacancy }}</h5>
                                <p class="course-desc mb-3">
                                    {{ Str::limit(strip_tags($project->content), 150) }}
                                </p>
                                <div class="mb-2">
                                    <button class="join-btn join-now-btn">Join now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <p class="mb-0">No courses available at the moment.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection