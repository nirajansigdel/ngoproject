@extends('frontend.layouts.master')

@section('content')
<style>
    .event-card {
        background: var(--white-off, #f8f9fa);
        margin-bottom: 30px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .event-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .event-content {
        padding: 20px;
    }

    .event-title {
        color: var(--primary, #007bff);
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        font-family: var(--font-family, 'Arial, sans-serif');
    }

    .event-subtitle {
        color: #6c757d;
        font-size: 1rem;
        margin-bottom: 15px;
        font-style: italic;
    }

    .event-description {
        color: #333;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .event-meta {
        border-top: 1px solid #e9ecef;
        padding-top: 15px;
        margin-top: 15px;
    }

    .event-date {
        color: var(--primary, #007bff);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .read-more-btn {
        background: var(--primary, #007bff);
        color: var(--white, #fff);
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s ease;
        font-size: 14px;
    }

    .read-more-btn:hover {
        background: var(--primary-dark, #0056b3);
        color: var(--white, #fff);
        text-decoration: none;
    }

    .hero-section {
        background: linear-gradient(135deg, var(--primary, #007bff), var(--secondary, #6c757d));
        color: white;
        padding: 60px 0;
        text-align: center;
        margin-bottom: 50px;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
    }

    .no-events {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .no-events i {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.5;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .event-card {
            margin-bottom: 20px;
        }
        
        .event-image {
            height: 200px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1 class="hero-title">Events & News</h1>
        <p class="hero-subtitle">Stay updated with our latest events and announcements</p>
    </div>
</div>

<!-- Events Section -->
<div class="container">
    <div class="row">
        @if($events && $events->count() > 0)
            @foreach($events as $event)
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="event-card">
                    @if($event->image)
                        <img src="{{ asset('uploads/events/' . $event->image) }}" 
                             alt="{{ $event->title }}" class="event-image">
                    @else
                        <div class="event-image" style="background: linear-gradient(45deg, #f8f9fa, #e9ecef); display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-calendar-alt" style="font-size: 3rem; color: #6c757d; opacity: 0.5;"></i>
                        </div>
                    @endif
                    
                    <div class="event-content">
                        <h3 class="event-title">{{ $event->title }}</h3>
                        
                        @if($event->subtitle)
                            <p class="event-subtitle">{{ $event->subtitle }}</p>
                        @endif
                        
                        <div class="event-description">
                            {!! Str::limit(strip_tags($event->content), 150) !!}
                        </div>
                        
                        <div class="event-meta">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="event-date">
                                    <i class="fas fa-calendar"></i>
                                    {{ $event->created_at->format('M d, Y') }}
                                </span>
                                <a href="#" class="read-more-btn" data-toggle="modal" data-target="#eventModal{{ $event->id }}">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Detail Modal -->
            <div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1" role="dialog" 
                 aria-labelledby="eventModalLabel{{ $event->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel{{ $event->id }}">
                                {{ $event->title }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($event->image)
                                <img src="{{ asset('uploads/events/' . $event->image) }}" 
                                     alt="{{ $event->title }}" 
                                     class="img-fluid mb-3" 
                                     style="width: 100%; max-height: 300px; object-fit: cover; border-radius: 8px;">
                            @endif
                            
                            @if($event->subtitle)
                                <h6 class="text-muted mb-3">{{ $event->subtitle }}</h6>
                            @endif
                            
                            <div class="mb-3">
                                <small class="text-primary">
                                    <i class="fas fa-calendar"></i>
                                    Published on {{ $event->created_at->format('F d, Y') }}
                                </small>
                            </div>
                            
                            <div class="event-full-content">
                                {!! $event->content !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="no-events">
                    <i class="fas fa-calendar-times"></i>
                    <h3>No Events Available</h3>
                    <p>We don't have any events to display at the moment. Please check back later for updates.</p>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Additional JavaScript for better UX -->
<script>
    $(document).ready(function() {
        // Add smooth scrolling for read more buttons
        $('.read-more-btn').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('data-target');
            $(target).modal('show');
        });

        // Add loading animation for images
        $('.event-image').on('load', function() {
            $(this).addClass('loaded');
        });

        // Add hover effects
        $('.event-card').hover(
            function() {
                $(this).addClass('shadow-lg');
            },
            function() {
                $(this).removeClass('shadow-lg');
            }
        );
    });
</script>

@endsection