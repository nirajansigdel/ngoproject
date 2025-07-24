@extends('frontend.layouts.master')

@section('content')

<!-- Custom Styles -->
<style>
  .contact-section {
    background-color: #fff;
  }

  .contact-section h2 {
    font-size: 2rem;
  }

  .contact-section .btn-danger {
    background-color: #b40000;
    border: none;
    transition: background-color 0.3s ease;
  }

  .contact-section .btn-danger:hover {
    background-color: #8c0000;
  }

  .contact-section img {
    border-radius: 1rem;
  }

  .cardbackground {
    background-color: #fff;
    border-radius: 12px;
    border: 1px solid #eee;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 20px;
    min-height: 130px;
  }

  .cardbackground:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
  }

  .customiconslarge {
    color: #b40000;
  }

  .sm-text-bd {
    font-size: 1.2rem;
    font-weight: 600;
    margin-top: 10px;
  }

  .xs-text,
  .sm-text {
    font-size: 0.95rem;
    color: #555;
  }
</style>

<!-- Hero Section -->
<section class="contact-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left -->
      <div class="col-md-6 mb-4 mb-md-0">
        <p class="text-danger fw-semibold mb-2">Contact Us</p>
        <h2 class="fw-bold">We Would <span class="text-danger">Love To Connect!</span></h2>
        <p class="text-muted mb-4">Always here to support, guide, and connect with you. Feel free to reach out. We're happy to assist on your journey.</p>
        <a href="https://wa.me/yourwhatsapplink" class="btn btn-danger rounded-pill d-inline-flex align-items-center px-4 py-2">
          <i class="bi bi-whatsapp me-2"></i> Whatsapp
        </a>
      </div>

      <!-- Right -->
      <div class="col-md-6 text-center">
        <img src="{{ asset('image/um.jpg') }}" alt="Support Representative" class="img-fluid rounded-4 shadow" style="max-height: 400px; object-fit: cover;" />
      </div>
    </div>
  </div>
</section>

<!-- Info Cards -->
<section class="container-fluid contact py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center align-items-center gap-4">
      
      <!-- Address -->
      <div class="col-md-3 cardbackground" data-aos="zoom-in" data-aos-delay="100">
        <i class="fa-solid fa-location-dot customiconslarge fa-2x"></i>
        <div class="information mt-2">
          <h2 class="sm-text-bd">Office Address</h2>
          <p class="xs-text">
            @if (!empty($sitesetting->office_address))
              @php $officeAddresses = json_decode($sitesetting->office_address, true); @endphp
              @foreach ((array)$officeAddresses as $address)
                <div class="py-1"><span class="sm-text">{{ $address }}</span></div>
              @endforeach
            @endif
          </p>
        </div>
      </div>

      <!-- Contact -->
      <div class="col-md-3 cardbackground" data-aos="zoom-in" data-aos-delay="200">
        <i class="fa-solid fa-phone customiconslarge fa-2x"></i>
        <div class="information mt-2">
          <h2 class="sm-text-bd">Office Contact</h2>
          <p class="xs-text">
            @if (!empty($sitesetting->office_contact))
              @php $officeContacts = json_decode($sitesetting->office_contact, true); @endphp
              @foreach ((array)$officeContacts as $contact)
                <div class="py-1"><span class="sm-text">{{ $contact }}</span></div>
              @endforeach
            @endif
          </p>
        </div>
      </div>

      <!-- Email -->
      <div class="col-md-3 cardbackground" data-aos="zoom-in" data-aos-delay="300">
        <i class="fa-solid fa-envelope customiconslarge fa-2x"></i>
        <div class="information mt-2">
          <h2 class="sm-text-bd">Office Email</h2>
          <p class="xs-text">
            @if (!empty($sitesetting->office_email))
              @php $officeEmails = json_decode($sitesetting->office_email, true); @endphp
              @foreach ((array)$officeEmails as $email)
                <div class="py-1"><span class="sm-text">{{ $email }}</span></div>
              @endforeach
            @endif
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Appointment Form -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<section class=" container-fluid container my-5 py-4 shadow bg-white rounded-4">
  <div class="row gx-5 align-items-stretch">
    <!-- Left Column -->
    <div class="col-md-4 d-flex flex-column justify-content-center bg-danger text-white p-4 rounded-4 shadow-sm">
      <h4 class="fw-bold mb-4">Book Virtual<br>Appointment</h4>
      <ul class="list-unstyled fs-6">
        <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Volunteer Opportunities</li>
        <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Join Our Mission</li>
        <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Community Support Services</li>
        <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Internship & Job Programs</li>
        <li><i class="fa-solid fa-circle-check me-2"></i> Social Impact Initiatives</li>
      </ul>
    </div>

    <!-- Right Column - Form -->
    <div class="col-md-8">
      <form id="contactForm" method="POST" action="{{ route('Contact.store') }}" class="p-4">
        @csrf

        <div class="row mb-3">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
          </div>
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <input type="tel" name="phone_no" class="form-control" id="phoneInput" placeholder="Phone Number" required>
          </div>
          <div class="col-md-6">
            <input type="text" name="service" class="form-control" placeholder="Which service are you interested in?" value="{{ old('service') }}">
          </div>
        </div>

        <div class="mb-3">
          <textarea name="message" class="form-control" rows="4" placeholder="Message" required>{{ old('message') }}</textarea>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="agree" required>
          <label class="form-check-label" for="agree">
            By submitting the form I agree with the <a href="#" class="text-primary">Privacy Policy</a> of this site.
          </label>
        </div>

        <button type="submit" class="btn btn-danger px-4 py-2 rounded-pill shadow">Book Appointment</button>
      </form>
    </div>
  </div>
</section>

<!-- Form Submission Script -->
<script>
  $(document).ready(function () {
    $('#contactForm').on('submit', function (event) {
      event.preventDefault();

      const form = $(this);
      const formData = new FormData(this);

      // If using reCAPTCHA, validate it
      const recaptchaResponse = grecaptcha.getResponse?.() || '';
      if (recaptchaResponse.length === 0) {
        Swal.fire({
          icon: "warning",
          title: "Hold up",
          text: "Please tick the RECAPTCHA box before submitting.",
          confirmButtonText: 'Got it!',
          confirmButtonColor: '#f39c12'
        });
        return;
      }

      $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            icon: response.success ? "success" : "warning",
            title: response.success ? "Success" : "Hold up",
            text: response.message || "Form submitted!",
            confirmButtonText: 'Got it!',
            confirmButtonColor: '#f39c12'
          });
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "An unexpected error occurred. Please try again.",
            confirmButtonText: 'Got it!',
            confirmButtonColor: '#f39c12'
          });
        }
      });
    });
  });
</script>

@endsection
