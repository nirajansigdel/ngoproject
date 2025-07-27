<style>
    .footer-section {
        color: black;
        padding: 40px 0 10px;
        font-family: 'Segoe UI', sans-serif;
    }

    .footer-logo img {
        max-height: 50px;
        border-radius: 6px;
    }

    .footer-logo h5 {
        margin-top: 10px;
        font-weight: bold;
        color: #d10000;
    }

    .footer-social a {
        display: inline-block;
        margin: 0 10px;
        font-size: 20px;
        color: black;
        transition: color 0.3s ease;
    }

    .footer-social a:hover {
        color: #f00;
    }

    .footer-menu a {
        color: black;
        margin: 8px 12px;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-menu a:hover {
        color: #f00;
    }

    .footer-bottom {
        text-align: center;
        padding: 10px 0;
        font-size: 14px;
        color: black;
    }

    .footer-bottom a {
        color: black;
        margin: 0 10px;
    }

    .footer-bottom a:hover {
        color: #f00;
    }

    .forlogoandcontact {
        background: var(--black-off);
        border-radius: 80px 80px 0 0;
        padding: 30px 15px;
    }

    @media (max-width: 768px) {
        .footer-menu {
            flex-direction: column !important;
            align-items: center;
        }

        .footer-social {
            text-align: center;
            margin-bottom: 20px;
        }

        .forlogoandcontact {
            flex-direction: column;
            text-align: center;
        }

        .footer-logo, .footer-cta {
            margin-bottom: 20px;
        }
    }
</style>

<footer class="footer-section bg-light conatiner-fluid">

    <div class="container">
        <div class="row mb-4">
            <!-- Social Icons -->
            <div class="footer-social col-12 col-md-2 text-center text-md-start mb-3 mb-md-0">
                @if($sitesetting->facebook_link)
                    <a href="{{ $sitesetting->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if($sitesetting->instagram_link)
                    <a href="{{ $sitesetting->instagram_link }}"><i class="fab fa-instagram"></i></a>
                @endif
                @if($sitesetting->linkedin_link)
                    <a href="{{ $sitesetting->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if($sitesetting->snapchat_link)
                    <a href="{{ $sitesetting->snapchat_link }}"><i class="fab fa-snapchat-ghost"></i></a>
                @endif
                @if($sitesetting->x_link)
                    <a href="{{ $sitesetting->x_link }}"><i class="fab fa-x-twitter"></i></a>
                @endif
            </div>

            <!-- Menu Links -->
            <div class="footer-menu col-12 col-md-10 d-flex flex-wrap justify-content-center gap-md-5">
                <a href="{{ route('Service') }}">Service</a>
                <a href="{{ route('Demand') }}">Project</a>
                <a href="{{ route('Blogpostcategory') }}">Blog</a>
                <a href="{{ route('events') }}">News & Events</a>
                <a href="{{ route('Gallery') }}">Gallery</a>
                <a href="{{ route('About') }}">About</a>
                <a href="{{ route('whyus') }}">Why Us</a>
                <a href="{{ route('Blogpostcategory') }}">Procurements</a>
            </div>
        </div>

        <!-- Logo and CTA -->
        <div class="row forlogoandcontact d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <div class="footer-logo col-12 col-md-4 text-center text-md-start">
                <img src="{{ asset('image/OIP.jpeg') }}" alt="Logo">
            </div>

            <!-- CTA Button -->
            <div class="footer-cta col-12 col-md-4 text-center text-md-end">
                <a href="{{ route('Contact') }}" class="btn btn-danger px-4 py-2 rounded-pill shadow">Appointment</a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-4">
            <div class="footer-bottom col-12">
                © Umbrella Organization Nepal {{ now()->year }}. All Rights Reserved
            </div>
        </div>
    </div>
</footer>
