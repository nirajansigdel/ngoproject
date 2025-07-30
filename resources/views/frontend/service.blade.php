@extends('frontend.layouts.master')

@section('content')
    <section class="sample_page py-5 bg-white">
        <div class="container">
            <div class="row gx-5 gy-1">
                {{-- Main Image --}}
                <div class="col-lg-12 col-md-12 col-sm-12 order-1 order-md-1">
                    <div class="overflow-hidden rounded shadow-lg mb-3" style="border: 1px solid #ddd;">
                        <img src="{{ asset('uploads/service/' . $service->image) }}" alt="{{ $service->title }}"
                            class="img-fluid w-100"
                            style="object-fit: cover; max-height: 420px; transition: transform 0.4s ease;">
                    </div>
                </div>
                {{-- Content --}}
                <div class="col-lg-12 col-md-12 col-sm-12 order-2 order-md-3 ">
                    <h2 class=" pb-2 m-0 fw-bold">{{ $service->title }}</h2>
                    <div class="text-secondary xs-text-des" style=" letter-spacing: 0.01em;">
                        <p class="xs-text-des mx-2" style="white-space: pre-wrap;">
                            {!! str_replace('&nbsp;', ' ', $service->description) !!}

                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Optional: subtle zoom effect on main image hover
        document.querySelectorAll('.overflow-hidden img').forEach(img => {
            img.addEventListener('mouseenter', () => img.style.transform = 'scale(1.05)');
            img.addEventListener('mouseleave', () => img.style.transform = 'scale(1)');
        });
    </script>
@endsection