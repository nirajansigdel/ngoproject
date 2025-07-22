@extends('frontend.layouts.master')

@section('content')




<!-- herosection -->
<section class="herosectionforallpage">
<img src="./image/demandbg.png" alt="" >
    <div class="container">
    <div class="d-flex flex-column innercontent">
     <span class="maintitle">Contact</span>
     <span class="navigatetitle py-1 mb-1">
      <a href="" style="color: white !important; text-decoration: none;">Home</a> / <span>Contact</span>
  </span>
    </div>
  </div>
  </section>




  <style>
    /* Custom style for cardbackground */
    .cardbackground {
        background-color:var(--primary); /* Light gray background */
        border-radius: 10px; /* Rounded corners */
        padding: 20px; /* Add padding */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        transition: all 0.3s ease-in-out; /* Smooth transition for hover effect */
        color: var(--white);
        min-height:130px;
    }

    /* Hover effect to slightly lift the card */
    .cardbackground:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increased shadow on hover */
        transform: translateY(-5px); /* Lift card effect */
    }

</style>

<section class="container-fluid contact py-5">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center gap-4">

      <!-- Dynamic Content for Office Address -->
      <div class="col-md-3 cardbackground d-flex justify-content-center align-items-center p-4 shadow-sm rounded">
        <i class="fa-solid fa-location-dot customiconslarge fa-2x"></i>
        <div class="information text-center">
          <h2 class="sm-text-bd">Office Address</h2>
          <p class="xs-text">
            @if (!empty($sitesetting->office_address))
              @php
                $officeAddresses = json_decode($sitesetting->office_address, true);
              @endphp
              @if (is_array($officeAddresses))
                @foreach ($officeAddresses as $address)
                  <div class="d-flex align-items-start py-1">
                    <span class="px-2 sm-text">{{ $address }}</span>
                  </div>
                @endforeach
              @else
                <div class="d-flex align-items-start">
                  <!-- <i class="fa-solid fa-location-dot"></i> -->
                  <span class="px-2 sm-text">{{ $sitesetting->office_address }}</span>
                </div>
              @endif
            @endif
          </p>
        </div>
      </div>

      <!-- Dynamic Content for Office Contact -->
      <div class="col-md-3 cardbackground d-flex justify-content-center align-items-center p-4 shadow-sm rounded">
        <i class="fa-solid fa-phone customiconslarge fa-2x mx-2"></i>
        <div class="information text-center">
          <h2 class="sm-text-bd">Office Contact</h2>
          <p class="xs-text">
            @if (!empty($sitesetting->office_contact))
              @php
                $officeContacts = json_decode($sitesetting->office_contact, true);
              @endphp
              @if (is_array($officeContacts))
                @foreach ($officeContacts as $contact)
                  <div class="d-flex align-items-center">
                    <!-- <i class="fa-solid fa-phone"></i> -->
                    <span class="px-2 sm-text">{{ $contact }}</span>
                  </div>
                @endforeach
              @else
                <div class="d-flex align-items-center">
                  <!-- <i class="fa-solid fa-phone"></i> -->
                  <span class="px-2 sm-text">{{ $sitesetting->office_contact }}</span>
                </div>
              @endif
            @endif
          </p>
        </div>
      </div>

      <!-- Dynamic Content for Office Email -->
      <div class="col-md-3 cardbackground d-flex justify-content-center align-items-center p-4 shadow-sm rounded">
        <i class="fa-solid fa-envelope customiconslarge fa-2x"></i>
        <div class="information text-center">
          <h2 class="sm-text-bd">Office Email</h2>
          <p class="xs-text">
            @if (!empty($sitesetting->office_email))
              @php
                $officeEmails = json_decode($sitesetting->office_email, true);
              @endphp
              @if (is_array($officeEmails))
                @foreach ($officeEmails as $email)
                  <div class="d-flex align-items-center">
                    <!-- <i class="fa-solid fa-envelope"></i> -->
                    <span class="px-2 sm-text">{{ $email }}</span>
                  </div>
                @endforeach
              @else
                <div class="d-flex align-items-center">
                  <!-- <i class="fa-solid fa-envelope"></i> -->
                  <span class="px-2 sm-text">{{ $sitesetting->office_email }}</span>
                </div>
              @endif
            @endif
          </p>
        </div>
      </div>

    </div>
  </div>
</section>





 <!-- form  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section class="container-fluid contactstart">
    <div class="container my-5">
        <div class="d-flex flex-column justify-content-center row customconnectwithus rounded align-items-center ">
            <span class="d-flex flex-column justify-content-center align-items-center containertitle">
                <h2 class="d-flex justify-content-center"></h2>
                <h2 class="text-center pb-2 section_title">{{ trans('messages.inquiry') }}</h2>
            </span>
            <div class="d-flex flex-column justify-content-center align-items-center">
    
                <div class="customconnectwithus-innersection fcc gap-md-3 pb-4">
                    
                    <div class="customconnectwithus-innersection-right p-3 px-4 col-md-6">
                        <span class="customconnectwithus-innersection-right-text xs-text whitehighlight">Please don't hesitate to reach out
                            using the contact information below for any inquiries or to get in touch. We are eager to
                            assist you and provide support in a friendly and helpful way.</span>
                        <div class="customconnectwithus-innersection-right-ourdetail my-3 px-4 py-3">
                        <form id="contactForm" class="form-horizontal" method="POST"
                            action="{{ route('Contact.store') }}">
                            @csrf
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="NAME" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="phone_no">Contact Number</label>
                                <input type="tel" class="form-control @error('phone_no') is-invalid @enderror"
                                    id="phone_no" placeholder="Phone No." name="phone_no" value="{{ old('phone_no') }}"
                                    required>
                                @error('phone_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <input hidden type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column">
                                <label for="message">Message</label>
                                <textarea class="form-control message-box @error('message') is-invalid @enderror"
                                    rows="3" placeholder="MESSAGE" name="message"
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            <div class="customconnectwithus-innersection-left_inputcontainer d-flex flex-column my-1">
                                <button type="submit sm-text">Submit</button>
                            </div>
                        </form>
                    
                        </div>
                    </div>
                    <div class="customconnectwithus-innersection-left col-md-5">
                    <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8"
                    class="card-img-top w-100 rounded" alt="Service Image" style="object-fit: cover; height:612px;">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        // Override the alert function to prevent normal alert popups
        window.alert = function() {};


        $('#contactForm').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            var form = $(this);
            var formData = new FormData(this);
            var recaptchaResponse = grecaptcha.getResponse();
            if (recaptchaResponse.length === 0) {


                swal.fire({
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
                    // Assuming the server returns JSON with 'success' and 'message'
                    if (response.success) {
                        swal.fire({
                            icon: "success",
                            title: "Let happy",
                            text: "Message sent successfully!",
                            confirmButtonText: 'Got it!',
                            confirmButtonColor: '#f39c12'
                        });
                        swal.fire({
                            icon: "success",
                            title: "Let happy",
                            text: "Message sent successfully!",
                            confirmButtonText: 'Got it!',
                            confirmButtonColor: '#f39c12'
                        });
                    } else {
                        swal.fire({
                            icon: "warning",
                            title: "Hold up",
                            text: "Error in sending message. Please try again.",
                            confirmButtonText: 'Got it!',
                            confirmButtonColor: '#f39c12'
                        });
                        swal.fire({
                            icon: "warning",
                            title: "Hold up",
                            text: "Error in sending message. Please try again.",
                            confirmButtonText: 'Got it!',
                            confirmButtonColor: '#f39c12'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    swal.fire({
                        icon: "error",
                        title: "Hold up",
                        text: "An unexpected error occurred. Please try again.",
                        confirmButtonText: 'Got it!',
                        confirmButtonColor: '#f39c12'
                    });
                    swal.fire({
                        icon: "error",
                        title: "Hold up",
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
