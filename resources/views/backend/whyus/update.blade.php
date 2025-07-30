@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Edit Why Us</h2>
    <form action="{{ route('admin.whyus.update', $whyus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Heading</label>
            <input type="text" name="heading" value="{{ $whyus->heading }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Subtitle</label>
            <input type="text" name="subtitle" value="{{ $whyus->subtitle }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $whyus->content }}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            @if($whyus->image)
                <img src="{{ asset('storage/'.$whyus->image) }}" width="100" class="mt-2">
            @endif
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
