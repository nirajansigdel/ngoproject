@extends('frontend.layouts.master')

@section('content')
<style>
  .text-orange {
  color: #f26522 !important;
}
.bg-orange{
  background:#f26522;

}
</style>

<!-- Hero Contact Section -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-4">
      <!-- Left Text -->
      <div class="col-md-6">
        <p class="text-success fw-semibold mb-2">Contact Us</p>
        <h2 class="fw-bold">We Would <span class="text-orange">Love To Connect!</span></h2>
        <p class="text-muted">Always here to support, guide, and connect with you. Feel free to reach out.</p>
        <a href="https://wa.me/yourwhatsapplink" class="btn btn-success rounded bg-green px-4 py-3 d-inline-flex align-items-center">
          <i class="bi bi-whatsapp me-2"></i> Whatsapp
        </a>
      </div>

      <!-- Right Image -->
      <div class="col-md-6 text-center">
        <img src="{{ asset('image/um.jpg') }}" class="img-fluid rounded shadow" alt="Support" style="max-height: 400px; object-fit: cover;" />
      </div>
    </div>
  </div>
</section>

<!-- Info Cards -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4 justify-content-center gap-4">

      <!-- Address -->
      <div class="col-md-3 text-center bg-white rounded shadow-sm p-4" data-aos="zoom-in">
        <i class="fa-solid fa-location-dot classgreen fa-2x mb-2"></i>
        <h5 class="fw-semibold mb-2">Office Address</h5>
        @if (!empty($sitesetting->office_address))
          @foreach ((array)json_decode($sitesetting->office_address) as $address)
            <p class="text-muted small mb-1">{{ $address }}</p>
          @endforeach
        @endif
      </div>

      <!-- Contact -->
      <div class="col-md-3 text-center bg-white rounded shadow-sm p-4" data-aos="zoom-in" data-aos-delay="100">
        <i class="fa-solid fa-phone classgreen fa-2x mb-2"></i>
        <h5 class="fw-semibold mb-2">Office Contact</h5>
        @if (!empty($sitesetting->office_contact))
          @foreach ((array)json_decode($sitesetting->office_contact) as $contact)
            <p class="text-muted small mb-1">{{ $contact }}</p>
          @endforeach
        @endif
      </div>

      <!-- Email -->
      <div class="col-md-3 text-center bg-white rounded shadow-sm p-4" data-aos="zoom-in" data-aos-delay="200">
        <i class="fa-solid fa-envelope classgreen fa-2x mb-2"></i>
        <h5 class="fw-semibold mb-2">Office Email</h5>
        @if (!empty($sitesetting->office_email))
          @foreach ((array)json_decode($sitesetting->office_email) as $email)
            <p class="text-muted small mb-1">{{ $email }}</p>
          @endforeach
        @endif
      </div>

    </div>
  </div>
</section>

<!-- Appointment Booking -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row gx-5 align-items-stretch rounded shadow">
      
      <!-- Left Column -->
      <div class="col-md-4 bg-orange classgreen text-white p-4 rounded-start d-flex flex-column justify-content-center">
        <h4 class="fw-bold mb-4">Book Virtual Appointment</h4>
        <ul class="list-unstyled">
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Volunteer Opportunities</li>
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Join Our Mission</li>
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Community Support Services</li>
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Internship & Job Programs</li>
          <li><i class="fa-solid fa-circle-check me-2"></i> Social Impact Initiatives</li>
        </ul>
      </div>

      <!-- Right Column - Form -->
      <div class="col-md-8 bg-white p-4 rounded-end">
        <form id="contactForm" method="POST" action="{{ route('Contact.store') }}">
          @csrf

          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>

            <div class="col-md-6">
              <input type="tel" name="phone_no" class="form-control" placeholder="Phone Number" id="phoneInput" required>
            </div>
            <div class="col-md-6">
              <input type="text" name="service" class="form-control" placeholder="Interested Service" value="{{ old('service') }}">
            </div>

            <div class="col-12">
              <textarea name="message" class="form-control" rows="4" placeholder="Message" required>{{ old('message') }}</textarea>
            </div>

            <div class="col-12 form-check">
              <input class="form-check-input" type="checkbox" id="agree" required>
              <label class="form-check-label" for="agree">
                I agree with the <a href="#" class="text-primary">Privacy Policy</a>.
              </label>
            </div>

            <div class="col-12">
              <button type="submit" class="btn bg-green px-4 py-3 rounded shadow">Book Appointment</button>
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</section>

<!-- External Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Optional AJAX Form Handling -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    form?.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: formData
        });

        const data = await response.json();

        Swal.fire({
          icon: data.success ? 'success' : 'error',
          title: data.success ? 'Success' : 'Oops!',
          text: data.message || 'Your message has been sent.',
          confirmButtonColor: '#dc3545'
        });

        if (data.success) form.reset();
      } catch (err) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong. Please try again.',
          confirmButtonColor: '#dc3545'
        });
      }
    });
  });
</script>

@endsection