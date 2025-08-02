@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <h1 class="text-center mt-5">Career Opportunities</h1>
    <p class="text-center mb-5">Join us in making a difference in the community. Your time and skills can help us achieve our mission.</p>

    @if($careers && $careers->count() > 0)
        @php
            $career = $careers->first();
        @endphp

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="card-title text-primary mb-3">{{ $career->title }}</h3>

                                <ul class="list-unstyled mb-3">
                                    <li><strong>Location:</strong> {{ $career->location }}</li>
                                    <li><strong>Date:</strong> {{ $career->formatted_date }}</li>
                                    <li><strong>Time:</strong> {{ $career->time }}</li>
                                    <li><strong>Spots Available:</strong> {{ $career->spots_available }}</li>
                                    @if($career->salary)
                                        <li><strong>Salary:</strong> {{ $career->salary }}</li>
                                    @endif
                                </ul>

                                <p class="card-text">{{ $career->description }}</p>

                                <p><strong>Requirements:</strong> {{ $career->requirements }}</p>

                                <div class="mt-4 text-end">
                                    <a href="{{ route('applycareer') }}" class="btn btn-success px-4">Apply Now</a>
                                    <a href="/" class="btn btn-outline-secondary ms-2 my-2">Back to home</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if($career->image)
                                    <div class="text-center">
                                        <img src="{{ asset('uploads/careers/' . $career->image) }}" 
                                             alt="{{ $career->title }}" 
                                             class="img-fluid rounded shadow-sm"
                                             style="max-width: 100%; height: auto;">
                                    </div>
                                @else
                                    <div class="text-center text-muted">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>No image available</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-briefcase fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">No Career Opportunities Available</h5>
                        <p class="text-muted">Please check back later for new opportunities.</p>
                        <a href="/" class="btn btn-outline-secondary">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
