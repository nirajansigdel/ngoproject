@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Why Us</h2>
        {{-- This route name matches the resource route definition --}}
        <a href="{{ route('backend.whyus.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Heading</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Use a forelse loop to handle cases where there are no items --}}
            @forelse($whyus as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->heading }}</td>
                    <td>{{ $item->subtitle }}</td>
                    <td>
                        @if($item->image)
                            {{-- This path is now correct because 'storage:link' links --}}
                            {{-- 'public/storage' to 'storage/app/public'. --}}
                            <img src="{{ asset('storage/whyus/' . $item->image) }}" width="80" alt="{{ $item->heading }}">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        {{-- Use the correct route name as defined in web.php --}}
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('item.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No items found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- This renders pagination links --}}
    <div class="d-flex justify-content-center">
        {{ $whyus->links() }}
    </div>
</div>
@endsection