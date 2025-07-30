@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New FAQ</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.faqs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="question">Question</label>
            <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="answer">Answer</label>
            <textarea class="form-control" id="answer" name="answer" rows="5" required>{{ old('answer') }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image (optional)</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
