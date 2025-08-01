@include('frontend.includes.navbar')

@yield('content')
@section('content')

<section class="position-relative bg-dark text-white d-flex align-items-center justify-content-center mb-5"
    style="height: 50vh;">
    <!-- Background Image & Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-image"
        style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1400&q=80'); background-size: cover; background-position: center;">
        <div class="w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>
    </div>

    <!-- Content -->
    <div class="container text-center position-relative z-1 ">
        <h1 class="fw-bold display-5">{{ $projectName }}</h1>
        <p class="text-white-50 text-uppercase small mt-2">Home / {{ $projectName }}</p>
    </div>
</section>
<div class="py-3"></div>

<section class="text-center">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: #222;">List of work</h1>
            <p class="fs-5 text-muted fst-italic">"list of the work done on {{ $projectName }}"</p>
        </div>
        @if($demands->count() > 0)
            <div class="row">
                @foreach($demands as $demand)
                    <div class="col-12 mb-4 gap-3">
                        <div class="bg-white row g-4 text-left">

                            <!-- Text Column -->
                            <div class="col-md-6 {{ $loop->iteration % 2 == 0 ? 'order-md-2 text-md-end' : 'text-md-start' }} ">
                                <h2 class="fw-bold ">{{ $demand->heading }}</h2>

                                @if($demand->subtitle)
                                    <h6 class="text-muted my-3">{{ $demand->subtitle }}</h6>
                                @endif

                                <p class="mt-2">
                                    {!! nl2br(e(strip_tags($demand->content))) !!}
                                </p>

                            </div>

                            <!-- Image Column -->
                            <div class="col-md-6 {{ $loop->iteration % 2 == 0 ? 'order-md-1' : '' }}">
                                @if($demand->image)
                                    <div class="text-center">
                                        <img src="{{ asset('uploads/demands/' . $demand->image) }}" alt="Demand Image"
                                            class="img-fluid rounded shadow w-100" style="object-fit: cover; max-height: 300px;">
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>


            @if(method_exists($demands, 'links'))
                <div class="d-flex justify-content-center mt-4">
                    {{ $demands->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <h5 class="text-muted">No demands found for {{ $projectName }}</h5>
                <p class="text-muted">Check back later for updates on this project.</p>
            </div>
        @endif
    </div>
</section>