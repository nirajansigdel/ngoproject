<style>
    .footer-section {
        background: var(--white-off);
        position: relative;
        box-shadow: rgba(33, 37, 109, 0.15);
        padding: 5px 0;
        /* Further adjusted padding to decrease footer size */
    }
</style>



<footer class="footer-section">
    <div class="container py-4">
        <div class="row">


            <div class="col-md-3 ">
                <div class="footer-widget">
                    <div class="footer-widget-heading">
                        <h3 class="mb-3">Our Demands</h3>
                        <ul class="list-unstyled">
                            @foreach ($demands->take(4) as $demand)
                                <li class="sm-text-bd greenhighlight">
                                    <a href="{{ route('SingleDemand', ['id' => $demand->id]) }}"
                                        class="text-decoration-none sm-text greenhighlight">{{ $demand->vacancy }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- About Us Section -->
            <div class="col-md-3 ">
                <div class="footer-widget">
                    <div class="footer-widget-heading">
                        <h3 class="mb-3">Quick Links</h3>
                        <ul class="list-unstyled">
                            <li class="sm-text"><a href="{{ route('About') }}"
                                    class="text-decoration-none sm-text greenhighlight">{{ trans('messages.AboutUs') }}</a>
                            </li>
                            <li class="sm-text-bd"><a href="{{ route('Service') }}"
                                    class="text-decoration-none sm-text greenhighlight">Services</a>
                            </li>
                            <li class="sm-text-bd"><a href="{{ route('Demand') }}"
                                    class="text-decoration-none sm-text greenhighlight">{{ trans('messages.Demands') }}</a>
                            </li>
                            <li class="sm-text-bd"><a href="{{ route('Blogpostcategory') }}"
                                    class="text-decoration-none sm-text greenhighlight">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Services Section -->
            <div class="col-md-3 ">
                <div class="footer-widget">
                    <div class="footer-widget-heading">
                        <h3 class="mb-3">Our Services</h3>
                        <ul class="list-unstyled">
                            @foreach ($services->take(4) as $service)
                                <li class="sm-text-bd"><a href="{{ route('SingleService', ['slug' => $service->slug]) }}"
                                        class="text-decoration-none sm-text greenhighlight">{{ $service->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Blog Section -->

            <div class="col-md-3">
                <div class="footer-widget">
                    <div class="footer-widget-heading">
                        <h3 class="mb-3  ">

                            <span class="">{{ trans('messages.FindUs') }}</span>
                        </h3>
                    </div>
                    <div class="single-cta">
                        <div class="cta-text">
                            <div class="">
                                <strong class="d-block xs-text-bd greenhighlight">Address:</strong>

                                <span>
                                    @if (!empty($sitesetting->office_address))
                                                                        @php
                                                                            $officeAddresses = json_decode($sitesetting->office_address, true);
                                                                        @endphp
                                                                        @if (is_array($officeAddresses))
                                                                            @foreach ($officeAddresses as $address)
                                                                                {{ $address }} <br>
                                                                            @endforeach
                                                                        @else
                                                                            @if (app()->getLocale() == 'ne')
                                                                                {{ $sitesetting->office_address_ne }}
                                                                            @else
                                                                                {{ $sitesetting->office_address }}
                                                                            @endif <br>
                                                                        @endif
                                    @endif
                                </span>




                            </div>
                            <div class="my-1">
                                <strong class="d-block xs-text-bd greenhighlight">Email:</strong>
                                <span>
                                    @if (!empty($sitesetting->office_email))
                                                                        @php
                                                                            $officeEmails = json_decode($sitesetting->office_email, true);
                                                                        @endphp
                                                                        @if (is_array($officeEmails))
                                                                            @foreach ($officeEmails as $email)
                                                                                <span class="sm-text"> {{ $email }}</span> <br>
                                                                            @endforeach
                                                                        @else
                                                                            <span class="sm-text">{{ $sitesetting->office_email }}</span> <br>
                                                                        @endif
                                    @endif
                                </span>
                            </div>
                            <div class="">
                                <strong class="d-block xs-text-bd greenhighlight">Contact:</strong>
                                <span>
                                    @if (!empty($sitesetting->office_contact))
                                                                        @php
                                                                            $officeContacts = json_decode($sitesetting->office_contact, true);
                                                                        @endphp
                                                                        @if (is_array($officeContacts))
                                                                            @foreach ($officeContacts as $contact)
                                                                                <span class="sm-text">{{ $contact }}</span> <br>
                                                                            @endforeach
                                                                        @else
                                                                            <span>
                                                                                @if (app()->getLocale() == 'ne')
                                                                                    {{ $sitesetting->office_contact_ne }}
                                                                                @else
                                                                                    {{ $sitesetting->office_contact }}
                                                                                @endif
                                                                            </span> <br>
                                                                        @endif
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="row mt-md-0">
            <div class="footer-social-icon ">
                <h6 class="md-text greenhighlight my-1">{{ trans('messages.FollowUs') }}</h6>
                <div class="social-buttons">
                    @if($sitesetting && $sitesetting->facebook_link)
                    <a href="{{ $sitesetting->facebook_link }}"
                        class="social-buttons__button social-button social-button--facebook" aria-label="Facebook">
                        <span class="social-button__inner">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                    </a>
                    @endif
                    @if($sitesetting && $sitesetting->linkedin_link)
                    <a href="{{ $sitesetting->linkedin_link }}"
                        class="social-buttons__button social-button social-button--linkedin" aria-label="LinkedIn">
                        <span class="social-button__inner">
                            <i class="fab fa-linkedin-in"></i>
                        </span>
                    </a>
                    @endif
                    @if($sitesetting && $sitesetting->instagram_link)
                    <a href="{{ $sitesetting->instagram_link }}" target="_blank"
                        class="social-buttons__button social-button social-button--instagram" aria-label="Instagram">
                        <span class="social-button__inner">
                            <i class="fab fa-instagram"></i>
                        </span>
                    </a>
                    @endif
                    @if($sitesetting && $sitesetting->snapchat_link)
                    <a href="{{ $sitesetting->snapchat_link }}" target="_blank"
                        class="social-buttons__button social-button social-button--snapchat" aria-label="Snapchat">
                        <span class="social-button__inner">
                            <i class="fa-brands fa-snapchat"></i>
                        </span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="copyright-area py-2">
        <div class="container">
            <div class="row text-center fcc gap-2">
                <div class="col-12 sm-text whitehighlight">
                    <ul class="fcc list-inline">
                        <li class="list-inline-item">
                            <a href="{{ url('terms-and-conditions') }}" class="text-white">Terms &
                                Conditions</a>
                        </li>
                        <li class="list-inline-item mx-2">
                            <a href="{{ url('privacy-policy') }}" class="text-white">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item yellowhighlight mx-3">
                            <!-- Copyright &copy; 2024, All Right
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<style>
    .popupfooter {
        background: white;
        position: fixed;
        bottom: -18px;
        display: none;
        padding: 16px 0;
        z-index: 20;
    }


    .footerfb {
        background: #1877f2 !important;
    }


    .footerld {
        background: #0E76A8 !important;
    }


    .footerin {
        background: #E1306C !important;
    }


    .footersn {
        background: #FFFC00 !important;
    }


    @media (max-width:600px) {
        .popupfooter {
            display: block;
        }
    }
</style>
