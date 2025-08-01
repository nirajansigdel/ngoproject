
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

{{-- Vacancy Modal --}}

   


{{-- Dynamic Notification Modal --}}
@if($notifications->count() > 0)
    @foreach($notifications as $notification)
        <div class="modal fade" id="notificationModal{{ $notification->id }}" tabindex="-1" aria-labelledby="notificationModalLabel{{ $notification->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-bell me-2"></i>
                            <h5 class="modal-title mb-0" id="notificationModalLabel{{ $notification->id }}">{{ $notification->title }}</h5>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-4">
                        @if($notification->image)
                            <div class="notification-image mb-3">
                                <img src="{{ asset('uploads/notifications/' . $notification->image) }}" 
                                     alt="{{ $notification->title }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 300px; width: 100%; object-fit: cover;">
                            </div>
                        @endif
                        <div class="notification-content">
                            <h6 class="text-muted mb-2">Published: {{ $notification->created_at->format('F d, Y') }}</h6>
                            <p class="mb-3">{{ $notification->title }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif


<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if($notifications->count() > 0)
            // Show the first notification modal
            var firstNotificationModal = new bootstrap.Modal(document.getElementById('notificationModal{{ $notifications->first()->id }}'), {
                keyboard: false
            });
            
            @if($latestVacancies->count())
                var vacancyModal = new bootstrap.Modal(document.getElementById('vacancyModal'), {
                    keyboard: false
                });

                vacancyModal.show();

                document.getElementById('vacancyModal').addEventListener('hidden.bs.modal', function () {
                    setTimeout(function() {
                        firstNotificationModal.show();
                    }, 500);
                });
            @else
                firstNotificationModal.show();
            @endif
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

<style>
.notification-image img {
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.notification-image img:hover {
    transform: scale(1.02);
}

.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.modal-header {
    border-radius: 15px 15px 0 0;
    border-bottom: none;
}

.modal-footer {
    border-top: none;
    border-radius: 0 0 15px 15px;
}

.btn-close-white {
    filter: brightness(0) invert(1);
}
</style>

@endsection