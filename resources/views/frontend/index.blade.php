
@section('content')
@extends('frontend.layouts.master')
@include("frontend.includes.herosection")
@include("frontend.includes.indexservice")
@include("frontend.includes.donate")
@include("frontend.includes.testimonials")
@include("frontend.includes.indexgallary")
@include("frontend.includes.contact")
@include("frontend.includes.ourclient")
@include("frontend.includes.rescue")
{{--  
 WhatsApp Modal
<div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="whatsappModalLabel">Connect with us on WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-4">Stay updated with our latest opportunities! Connect with us on WhatsApp.</p>
                <div class="whatsapp-icon mb-3">
                    <i class="fab fa-whatsapp" style="font-size: 48px; color: #25D366;"></i>
                </div>
                @if(!empty($sitesetting->office_contact))
                    @php
                        $officeContacts = json_decode($sitesetting->office_contact, true);
                        $firstContact = is_array($officeContacts) ? $officeContacts[0] : $sitesetting->office_contact;
                        $whatsappNumber = preg_replace('/[^0-9]/', '', $firstContact);
                    @endphp
                    <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp me-2"></i>Chat with us
                    </a>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 

--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var whatsappModal = new bootstrap.Modal(document.getElementById('whatsappModal'), {
            keyboard: false
        });
    
        @if($latestVacancies->count())
        var vacancyModal = new bootstrap.Modal(document.getElementById('vacancyModal'), {
            keyboard: false
        });

        vacancyModal.show();

        document.getElementById('vacancyModal').addEventListener('hidden.bs.modal', function () {
            setTimeout(function() {
                whatsappModal.show();
            }, 500);
        });
        @else
        whatsappModal.show();
        @endif

        if (!localStorage.getItem('modalsShown')) {
            localStorage.setItem('modalsShown', 'true');
        }
    });
    </script>


<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(event) {
            event.preventDefault(); 
            var form = $(this);
            var formData = new FormData(this);
            var recaptchaResponse = grecaptcha.getResponse();


            if (recaptchaResponse.length === 0) {
                alert("Please tick the reCAPTCHA box before submitting.");
                return;
            }
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        alert("Message sent successfully!");
                    } else {
                        alert("Error in sending message. Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("An unexpected error occurred. Please try again.");
                }
            });
        });
    });
</script>

@endsection