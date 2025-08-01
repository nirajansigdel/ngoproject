
    @include('frontend.includes.navbar')

@yield('content')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $projectName }}</h4>
                </div>

                <div class="card-body">
                    @if($demands->count() > 0)
                        <div class="row">
                            @foreach($demands as $demand)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        @if($demand->image)
                                             <a href="{{ asset('uploads/demands/' . $demand->image) }}" target="_blank">
                                                    <img src="{{ asset('uploads/demands/' . $demand->image) }}" alt="Demand Image" width="80">
                                                </a>
                                        @endif
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $demand->heading }}</h5>
                                            
                                            @if($demand->subtitle)
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $demand->subtitle }}</h6>
                                            @endif
                                            
                                            <div class="card-text">
                                                {!! Str::limit(strip_tags($demand->content), 150) !!}
                                            </div>
                                            
                                            <div class="mt-3">
                                                <small class="text-muted">
                                                    Created: {{ $demand->created_at->format('M d, Y') }}
                                 a               </small>
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer">
                                            <a href="{{ route('demands.detail', $demand->id) }}" 
                                               class="btn btn-primary btn-sm">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        {{-- Pagination if needed --}}
                        @if(method_exists($demands, 'links'))
                            <div class="d-flex justify-content-center">
                                {{ $demands->links() }}
                            </div>
                        @endif
                        
                    @else
                        <div class="text-center py-5">
                            <h5 class="text-muted">No demands found for {{ $projectName }}</h5>
                            <p class="text-muted">Check back later for updates on this project.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  
</div>

