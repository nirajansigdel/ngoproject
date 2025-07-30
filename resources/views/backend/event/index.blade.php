@extends('backend.layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">{{ $page_title }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('backend.event.create') }}" class="btn btn-primary mb-3">+ Create New Event</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->subtitle ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $event->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $event->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            @if($event->image)
                                <img src="{{ asset('uploads/events/' . $event->image) }}" width="100" alt="event image">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('backend.event.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('backend.event.destroy', $event->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No events found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
