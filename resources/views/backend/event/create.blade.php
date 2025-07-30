@extends('backend.layouts.master')

@section('content')
<style>
    .container {
        margin-top: 20px;
    }
    h2, h3 {
        margin-bottom: 20px;
    }
    .mb-3, .form-group {
        margin-bottom: 15px;
    }
    .form-control, .form-control-file {
        border-radius: 5px;
        padding: 8px;
    }
    .btn-success {
        background-color: #198754;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-success:hover {
        background-color: #157347;
    }
    .alert-success {
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .card-header {
        background: #198754;
        color: white;
    }
    #imagePreview img {
        max-width: 200px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
</style>

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Add Event</h1>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{ route('backend.whyus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <!-- Left Side: Form Fields -->
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Event Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="heading">Heading <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ old('heading') }}" required>
                        @error('heading') 
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                        @error('subtitle') 
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="content">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control summernote @error('content') is-invalid @enderror" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
                        @error('content') 
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> 
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Image Upload -->
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Upload Image</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage(event)">
                        @error('image') 
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span> 
                        @enderror
                        <div id="imagePreview" class="mt-2"></div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-3">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa fa-save"></i> Save Event
                </button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });
    });

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('imagePreview');
            output.innerHTML = `<img src="${reader.result}" class="img-thumbnail" />`;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endpush
