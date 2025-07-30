@extends('backend.layouts.master')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.events.index') }}">Events</a></li>
                <li class="breadcrumb-item active">Edit Event</li>
            </ol>
        </div>
    </div>

    <a href="{{ route('admin.events.index') }}" class="btn btn-primary btn-sm mb-3">
        <i class="fa fa-arrow-left"></i> Back
    </a>

    <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header"><h3 class="card-title">Event Details</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $event->title) }}" required>
                            @error('title') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $event->subtitle) }}">
                            @error('subtitle') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control summernote @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $event->content) }}</textarea>
                            @error('content') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header"><h3 class="card-title">Publish Settings</h3></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" {{ old('status', $event->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $event->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Featured Image</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage(event)">
                            @error('image') <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            <div id="imagePreview" class="mt-2">
                                @if ($event->image)
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" class="img-thumbnail" style="max-width: 200px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-save"></i> Update Event
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.summernote').summernote({ height: 300 });
    });

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            // Clear previous preview
            while (output.firstChild) {
                output.removeChild(output.firstChild);
            }
            const img = document.createElement('img');
            img.src = reader.result;
            img.className = 'img-thumbnail';
            img.style.maxWidth = '200px';
            output.appendChild(img);
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush