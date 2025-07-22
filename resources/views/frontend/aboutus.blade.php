@extends('frontend.layouts.master')

@section('content')

    <!-- herosection -->
    <section class="container-fluid gapbetweensection indexaboutsection bg-light py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left Section: Text Content -->
                <div class="col-md-6 mx-md-4">
                    <div class="py-2">
                        <p class="companytheme">-Trusted Real estate Care</p>
                        <h1 class="extralarger blackhighlight">Dream living Spaces Setting New Build.</h1>
                    </div>
                    <p class="sm-text">
                        We are a team of dedicated professionals working to deliver the best solutions. Our goal is to
                        empower businesses with state-of-the-art technology. We are passionate about creating positive
                        impacts in the industries we serve.
                    </p>

                    <!-- Mission Statements -->
                    <div class="row mt-4">
                        <div class="col-12 col-md-6 mb-4">
                            <h3 class="h5 font-weight-bold text-dark">Our Mission</h3>
                            <p class="sm-text">Our dedication to client satisfaction converges to create an unparalleled
                                home-buying experience.</p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <h3 class="h5 font-weight-bold text-dark">Our Mission</h3>
                            <p class="sm-text">Our dedication to client satisfaction converges to create an unparalleled
                                home-buying experience.</p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <h3 class="h5 font-weight-bold text-dark">Our Mission</h3>
                            <p class="sm-text">Our dedication to client satisfaction converges to create an unparalleled
                                home-buying experience.</p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <h3 class="h5 font-weight-bold text-dark">Our Mission</h3>
                            <p class="sm-text">Our dedication to client satisfaction converges to create an unparalleled
                                home-buying experience.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section: Image -->
                <div class="col-md-5">
                    <img src="{{ asset('uploads/about/' . $about->image) }}" alt="About Image"
                        class="img-fluid rounded shadow-lg">
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
                    <p class="lead">
                        {!! app()->getLocale() === 'ne' ? $about->content_ne : $about->content !!}
                    </p>
                </div>
                <div class="col-md-6 order-md-1 order-2">
                    <img src="{{ asset('uploads/about/' . $about->image) }}" alt="" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </section>






<style>    .teammember {
    background: var(--white-off);
    margin-bottom: 50px !important; /* Use important to ensure this is applied */
}

.meetteam {
        background:var(--primary);
        color: var(--white); 
       
        font-size: 14px;
        padding: 4px 10px;
        border-radius: 4px;
        width:10%;
        font-family: var(--font-family);
    
    }
    .meetcontent{
        width:50%;

    }

</style>





    <!-- Our Team Member -->

    <section class="container-fluid  teammember mb-4 py-4 ">
        <div class="container">
            <div class="row mt-3 fcc ">
                <div class="fcc flex-column">
                <h2 class="meetteam text-center"> Meet Our Team</h2>
                <p class="text-center meetcontent sm-text">Utilizing her exceptional experience and knowledge of the luxury waterfront markets,
                    Simone serves an
                    extensive and elite worldwide client base. </p>
                </div>
                
                @if ($teams->isNotEmpty())
                    @foreach ($teams as $team)
                        <div class="col-md-3">
                            <div class=" team_card mt-2  py-2">
                                @if ($team->image)
                                    <img src="{{ asset('uploads/team/' . $team->image) }}" class="card-img-top image rounded" alt="">
                                @else
                                    <img src="{{ asset('images/girl.jpg') }}" class="card-img-top image rounded" alt="Default Image">
                                @endif
                                <div class="card-body">
                                    <span class="team_name md-text-bd">
                                        {{ $team->name }}
                                    </span><br>
                                    <span class="team_position sm-text">
                                        {{ $team->position }}

                                    </span><br>
                                    <span class="flex">
                                        <a href="https://www.facebook.com/login" target="_blank">
                                            <i class="fa-brands fa-facebook"></i>
                                        </a>
                                        <a href="https://www.instagram.com/accounts/login/" target="_blank">
                                            <i class="fa-brands fa-square-instagram"></i>
                                        </a>
                                        <a href="https://accounts.google.com/ServiceLogin?service=youtube" target="_blank">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <p class="sm-text-bd">No team members available.</p>
                @endif
            </div>
        </div>
    </section>

    <section class="container-fluid mt-5">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="col-lg-6 text-center">
                <h1 class="md-text-bd">Frequently Asked Questions</h1>
                <p class="extra-small-text">
                    Utilizing her exceptional experience and knowledge of the luxury waterfront markets, Simone serves an
                    extensive and elite worldwide client base.
                </p>
            </div>

            <!-- FAQ Accordion Section -->
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">

                    <!-- Accordion Item 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <p class="sm-text">What is your service all about?</p>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our service provides luxury waterfront properties with exceptional market expertise and
                                client service. We aim to create unique living experiences for our clients.
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <p class="sm-text">How do I get started?</p>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Getting started is easy! Simply reach out to our team, and we will guide you through the
                                process of choosing the perfect property for you.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






@endsection