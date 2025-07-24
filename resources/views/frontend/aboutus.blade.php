@extends('frontend.layouts.master')

@section('content')

<!-- ========================== -->
<!-- Inline Styles for this Page -->
<!-- ========================== -->
<style>
    /* ========== Global ========== */
    .highlighted {
        color: #007bff;
        position: relative;
    }

    .highlighted::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 4px;
        background: #cfe5ff;
        left: 0;
        bottom: -6px;
        border-radius: 2px;
    }

    .tname {
        font-size: 1.2rem;
        color: #222;
        text-transform: capitalize;
    }

    /* ========== About Section ========== */
    .about-section {
        background-color: #f9f9f9;
    }

    .about-heading {
        font-size: 2.2rem;
        font-weight: 700;
        line-height: 1.4;
        color: #222;
    }

    .image-frame {
        border: 2px solid #007bff1f;
        border-radius: 12px;
    }

    /* ========== Mission Section ========== */
    .mission-card {
        background-color: #fff;
        border-left: 4px solid #007bff;
        border-radius: 8px;
        transition: all 0.3s ease;
        min-height: 30vh;
    }

    .mission-card:hover {
        background-color: #f0f8ff;
        box-shadow: 0 8px 16px rgba(0, 123, 255, 0.1);
    }

    /* ========== CEO Typing ========== */
    #typing-text {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #555;
    }

    /* ========== Directors Section ========== */
    .directors-section {
        background-color: #f7f9fc;
    }

    .directors-title {
        font-size: 2.5rem;
        color: #b71c1c;
    }

    .directors-description {
        font-size: 1rem;
        line-height: 1.7;
        color: #666;
    }

    .director-card {
        transition: transform 0.1s ease;
    }

    .director-card:hover {
        transform: translateY(0px);
    }

    .director-image-wrapper {
        position: relative;
    }

    .badge-custom {
        position: absolute;
        padding: 12px;
        font-size: 0.75rem;
        border-radius: 20px;
        animation: popUp 0.6s ease-in-out;
        width: 150px;
        height: 5vh;
    }

    .badge-role {
        bottom: -10px;
        left: -10px;
        background-color: #ffc107;
        color: #212529;
        transform: rotate(-5deg);
    }

    .badge-position {
        bottom: -10px;
        right: -10px;
        background-color: #dc3545;
        color: white;
        transform: rotate(5deg);
    }

    @keyframes popUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.9);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* ========== Team Section ========== */
    .teammember-section {
        background-color: #f9f9f9;
        transform: translateY(200px);
        transition: opacity 1.6s ease-out, transform 1.6s ease-out;
    }

    .teammember-section.visible {
        opacity: 1;
        transform: translateY(0);
    }

  




    .team-card {
        border: 1px solid #eee;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .team-details {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .team-details .badge {
        padding: 6px 12px;
        font-size: 0.85rem;
        font-weight: 500;
        border-radius: 20px;
    }
</style>

<!-- ========== Hero Section ========== -->
<section class="container-fluid indexaboutsection bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text -->
            <div class="col-lg-6 mb-4" data-aos="fade-up">
                <h1 class="about-heading mb-4">
                    Empowering Communities,<br>
                    <span class="highlighted">Changing Lives Together</span>.
                </h1>
                <p class="xs-text-des">
                    We are a dedicated team combining innovation with empathy — leveraging technology to uplift lives,
                    strengthen communities, and drive meaningful, sustainable progress...
                </p>
            </div>

            <!-- Image -->
            <div class="col-lg-6 text-center" data-aos="zoom-in">
                <div class="image-frame p-2 shadow-lg rounded bg-white d-inline-block">
                    <img src="{{ asset('image/um.jpg') }}" class="img-fluid rounded" style="max-height:400px;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== Mission Section ========== -->
<section class="container-fluid py-5 bg-soft-blue">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="mission-card p-4">
                    <h3 class="mb-3">Our Mission</h3>
                    <p class="xs-text-des">Empower communities through innovative and sustainable practices.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="mission-card p-4">
                    <h3 class="mb-3">Our Vision</h3>
                    <p class="xs-text-des">To be a leading organization in community empowerment.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="mission-card p-4">
                    <h3 class="mb-3">Our Values</h3>
                    <p class="xs-text-des">Integrity, Innovation, Collaboration, Excellence.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== CEO Section with Typing Animation ========== -->
<section class="aboutherosection py-5 directors-section">
    <div class="container">
        <div class="row align-items-center mx-md-5">
            <div class="col-md-6 order-md-2" data-aos="fade-left" data-aos-delay="100">
                <h3 class="pt-4 mb-4 fw-bold">CEO Message</h3>
                <p id="typing-text"></p>
                <div id="full-content" style="display:none;" class="xs-text-des">
                    {{ app()->getLocale() === 'ne' ? $about->ceo_message_ne : $about->ceo_message }}
                    {!! app()->getLocale() === 'ne' ? $about->content_ne : $about->content !!}
                </div>
            </div>
            <div class="col-md-6 order-md-1 text-center" data-aos="fade-right" data-aos-delay="400">
                <img src="{{ asset('uploads/about/' . $about->image) }}" alt="CEO Image"
                    style="max-width: 100%; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1);">
            </div>
        </div>
    </div>
</section>

<!-- ========== Directors Section ========== -->
<section class="container-fluid py-5 bg-soft-blue ">
    <div class="container text-center">
        <div class="directors-header mb-5">
            <h2 class="section-title directors-title fw-bold text-danger mb-3">🌟 Board of Directors</h2>
            <p class="section-subtitle">
                Our board brings expertise and heart to every decision, shaping a better Nepal for future generations.
            </p>
        </div>
        <div class="row justify-content-center">
            @foreach ($teams->take(8) as $team)
                <div class="col-md-4 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="{{ $loop->index *50 }}">
                    <div class="director-card bg-white rounded shadow text-center px-4 py-5 h-100">
                        <div class="director-image-wrapper">
                            <img src="{{ $team->image ? asset('uploads/team/' . $team->image) : asset('images/girl.jpg') }}"
                                alt="{{ $team->name }}"
                                class="director-image rounded-circle img-fluid shadow"
                                style="width:240px; height:240px; object-fit: cover; border: 4px solid #dc3545;">
                            <span class="badge badge-custom badge-role">{{ $team->role }}</span>
                            <span class="badge badge-custom badge-position">{{ $team->position }}</span>
                        </div>
                        <h5 class="tname fw-bold mb-1">{{ $team->name }}</h5>
                        <p class="text-muted small mb-0">Board Member</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== Team Members Section ========== -->
<section class="container-fluid bg-light teammember-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fw-bold">🌟 Meet Our Team</h2>
            <p class="section-subtitle">Our team brings passion, professionalism, and purpose to every project.</p>
        </div>
        <div class="row justify-content-center">
       @foreach ($teams->skip(8) as $team)
        <div class="col-md-4 col-lg-3 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="team-card bg-white shadow p-4 text-center h-100">
                <div class="team-image mb-3">
                    <img src="{{ $team->image ? asset('uploads/team/' . $team->image) : asset('images/girl.jpg') }}"
                        alt="{{ $team->name }}" class="img-fluid rounded-circle"
                        style="width: 120px; height: 120px; object-fit: cover;">
                </div>
                <h5 class="tname">{{ $team->name }}</h5>
                <div class="team-details">
                    <span class="badge bg-primary">{{ $team->position }}</span>
                    <span class="badge bg-secondary">{{ $team->role }}</span>
                </div>
            </div>
        </div>
           @endforeach
</div>

        </div>
    </div>
</section>

<!-- ========== External Scripts ========== -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration:1500,
        easing: 'ease-in-out-cubic',
        once: true,
        mirror: false,
        offset: 150
    });

    document.addEventListener('DOMContentLoaded', () => {
        const fullContent = document.getElementById('full-content').innerText.trim();
        const typingText = document.getElementById('typing-text');
        let index = 0;

        function type() {
            if (index < fullContent.length) {
                typingText.innerHTML += fullContent.charAt(index);
                index++;
                setTimeout(type, 50);
            }
        }

        type();

        // Reveal team section
        const teamSection = document.querySelector('.teammember-section');
        function revealSection() {
            const rect = teamSection.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;

            if (rect.top <= windowHeight * 0.9) {
                teamSection.classList.add('visible');
                window.removeEventListener('scroll', revealSection);
            }
        }
        window.addEventListener('scroll', revealSection);
        revealSection();
    });
</script>
@endsection
