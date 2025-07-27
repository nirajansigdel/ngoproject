@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center mt-5">Volunteer Opportunities</h1>
    <p class="text-center mb-5">Join us in making a difference in the community. Your time and skills can help us achieve our mission.</p>

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h3 class="card-title text-primary mb-3">Community Clean-Up Volunteer</h3>

                    <ul class="list-unstyled mb-3">
                        <li><strong>Location:</strong> Downtown City Park</li>
                        <li><strong>Date:</strong> August 10, 2025</li>
                        <li><strong>Time:</strong> 9:00 AM – 1:00 PM</li>
                        <li><strong>Spots Available:</strong> 25</li>
                    </ul>

                    <p class="card-text">
                        Help us beautify our city by volunteering for our monthly community clean-up day.
                        Tasks will include picking up litter, planting flowers, and helping with recycling efforts.
                        No prior experience needed — just bring your energy and enthusiasm!
                    </p>

                    <p><strong>Requirements:</strong> Comfortable clothing, water bottle, and willingness to work outdoors.</p>

                    <div class="mt-4 text-end">
                        <a href="{{ route('applycareer') }}" class="btn btn-success px-4">Apply Now</a>
                        <a href="#" class="btn btn-outline-secondary ms-2 my-2">Back to Opportunities</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
@endsection