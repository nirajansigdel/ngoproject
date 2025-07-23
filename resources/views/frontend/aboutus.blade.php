@extends('frontend.layouts.master')

@section('content')

    <style>
        .about-section {
            background-color: #f9f9f9;
        }

        .badge-custom {
            background-color: #e6f0ff;
            color: #007bff;
            padding: 6px 14px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 50px;
            display: inline-block;
        }

        .about-heading {
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1.4;
            color: #222;
        }

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

        .image-frame {
            border: 2px solid #007bff1f;
            border-radius: 12px;
        }
    </style>

    <!-- herosection -->
    <section class="container-fluid gapbetweensection indexaboutsection bg-light py-5">
        <div class="container">
            <section class="about-section pb-5 bg-light">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Left Content -->
                        <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
                            <h1 class="about-heading mb-4"> Empowering Communities,<br> <span class="highlighted">Changing
                                    Lives Together</span>.</h1>
                            <p class="xs-text-des">
                                We are a dedicated team combining innovation with empathy — leveraging technology to uplift
                                lives, strengthen communities, and drive meaningful, sustainable progress. At our core, we
                                believe in people-powered change, grounding every project and solution in compassion and
                                purpose. From responding to urgent needs to building long-term development programs, we work
                                closely with communities to create lasting impact. Together, we’re not just solving problems
                                — we’re building a future where everyone has the opportunity to thrive.
                            </p>
                            <!-- Mission Cards -->

                        </div>

                        <!-- Right Image -->
                        <div class="col-lg-6 text-center" data-aos="zoom-in">
                            <div class="image-frame p-2 shadow-lg rounded bg-white d-inline-block">
                                <img src="{{asset('image/um.jpg')}}" alt="About Image" class="img-fluid rounded"
                                    style="max-height:400px;">
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        </div>
    </section>


    <section class="container-fluid bg- py-5 bg-soft-blue ">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="mission-card p-4 shadow-sm rounded">
                        <h3 class="mb-3">Our Mission</h3>
                        <p class="xs-text-des">To empower communities through innovative solutions and sustainable practices.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="mission-card p-4 shadow-sm rounded">
                        <h3 class="mb-3">Our Vision</h3>
                        <p class="xs-text-des">To be a leading organization in community empowerment and sustainable development.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="mission-card p-4 shadow-sm rounded">
                        <h3 class="mb-3">Our Values</h3>
                        <p class="xs-text-des">Integrity, Innovation, Collaboration, and Excellence.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>



    <!-- second section -->
    <section class="aboutherosection">
        <div class="container py-5">
            <div class="row align-items-center mx-5">
                <div class="col-md-6 order-md-2 order-1">
                    <h3 class="pt-4">CEO MEssage</h3>
                    <p class="xs-text-des">
                        {!! app()->getLocale() === 'ne' ? $about->content_ne : $about->content !!}
                    </p>
                </div>
                <div class="col-md-6 order-md-1 order-2">
                    <img src="{{ asset('uploads/about/' . $about->image) }}" alt="" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </section>






    <style>
        .teammember {
            background: var(--white-off);
            margin-bottom: 50px !important;
            /* Use important to ensure this is applied */
        }



        .teammember-section {
            background-color: #f9f9f9;
            transform: translateY(200px);
            transition: opacity 1.6s ease-out, transform 1.6s ease-out;
        }

        .teammember-section.visible {
            opacity: 1;
            transform: translateY(-0px);
        }



        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: #007BFF;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1rem;
            color: #555;
            max-width: 600px;
            margin: 0 auto;
        }

        .team-card {
            border: 1px solid #eee;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .team-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: #222;
        }

        .team-position {
            font-size: 0.95rem;
            color: #777;
        }

        .team-social i {
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .team-social i:hover {
            color: #007BFF;
        }


        .team-info {
            text-align: center;
        }

        .team-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
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

    <!-- AOS JS (place before </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();

        document.addEventListener('DOMContentLoaded', () => {
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
            revealSection(); // check on load as well
        });


    </script>


    <!-- Our Team Member -->
    <section class="container-fluid bg-light teammember-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">🌟 Meet Our Team</h2>
                <p class="section-subtitle">
                    Our team brings passion, professionalism, and purpose to every project we touch.
                </p>
            </div>

            <div class="row justify-content-center">
                @if ($teams->isNotEmpty())
                    @foreach ($teams as $team)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="team-card p-3 shadow rounded bg-white text-center h-100">
                                <div class="team-image mb-3">
                                    <img src="{{ $team->image ? asset('uploads/team/' . $team->image) : asset('images/girl.jpg') }}"
                                        alt="{{ $team->name }}" class="img-fluid rounded-circle"
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                </div>
                                <div class="team-info mt-3">
                                    <h5 class="team-name">{{ $team->name }}</h5>
                                    <div class="team-details">
                                        <span class="badge bg-primary">{{ $team->position }}</span>
                                        <span class="badge bg-secondary">{{ $team->role }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-muted">No team members available.</p>
                @endif
            </div>
        </div>
    </section>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



@endsection