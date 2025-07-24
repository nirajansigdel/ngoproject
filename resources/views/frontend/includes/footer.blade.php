<style>
    .footer-section {;
        color:black;
        padding: 40px 0 10px;
        font-family: 'Segoe UI', sans-serif;
    }

    .footer-logo {
        text-align: center;
        margin-bottom: 20px;
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

    .footer-social {
        text-align: center;
        margin-bottom: 20px;
    }

    .footer-social a {
        display: inline-block;
        margin: 0 10px;
        font-size: 20px;
        color:black;
        transition: color 0.3s ease;
    }

    .footer-social a:hover {
        color: #f00;
    }

    .footer-menu {
        text-align: center;
        margin-bottom: 20px;
    }

    .footer-menu a {
        color: black;
        margin: 0 12px;
        font-weight: 500;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-menu a:hover {
        color: #f00;
    }

    .footer-cta {
        text-align: center;
        margin-bottom: 30px;
    }


    .footer-bottom {
        text-align: center;
        padding: 10px 0;
        font-size: 14px;
        color: black;
    }

    .footer-bottom a {
        color:black;
        margin: 0 10px;
    }

    .footer-bottom a:hover {
        color: #fff;
    }
</style>

<footer class="footer-section container-fluid bg-light">

    <div class=" container">
        <div class="row">

    <!-- Social Icons -->
    <div class="footer-social col-md-2">
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
    <div class="footer-menu col-md-10 d-flex gap-5">
        <a href="{{ route('Service') }}">Service</a>
        <a href="{{ route('Demand') }}">Project</a>
        <a href="{{ route('Blogpostcategory') }}">Blog</a>
         <a href="{{ route('events') }}">News & Events</a>
        <a href="{{ route('Gallery') }}">Gallery</a>
        <a href="{{ route('About') }}">About</a>
         <a href="{{ route('whyus') }}">why us</a>
           <a href="{{ route('Blogpostcategory') }}">procuments</a>

    
    </div>

    </div>


    <style>
   .forlogoandcontact {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    background:var(--black-off); /* <- fixed: added missing semicolon */
    border-radius: 80px 80px 0 0;
    min-height: 28vh;
}

    </style>
    <!-- Logo -->
     <div class="forlogoandcontact row justify-space-between">
        <div class="footer-logo col-md-3">
        <img src="{{ asset('image/OIP.jpeg') }}" alt="Logo">
    </div>

    <!-- CTA -->
    <div class="footer-cta  col-md-3">
        <a href="{{ route('Contact') }}" class="btn btn-danger px-4 py-2 rounded-pill shadow">Appointment</a>
    </div>

     </div>
    
<div class="row col-md-12">
    <!-- Copyright -->
    <div class="footer-bottom">
        © Umbrella Organization Nepal {{ now()->year }}. All Rights Reserved
    </div>
    </div>
    </div>
</footer>
