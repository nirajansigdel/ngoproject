@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Project</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <a href="{{ route('admin.demands.create') }}" class="btn btn-primary mb-3">Create New project</a>

                    @if ($demands && $demands->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Heading</th>
                                    <th>Subtitle</th>
                                    <th>Categories</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demands as $demand)
                                    <tr>
                                        <td>{{ $demand->heading }}</td>
                                        <td>{{ $demand->subtitle }}</td>
                                        <td>
                                            @if (!empty($demand->demand_types) && is_array($demand->demand_types))
                                                @foreach ($demand->demand_types as $type)
                                                    <span class="badge bg-info text-dark">{{ ucfirst($type) }}</span>
                                                @endforeach
                                            @else
                                                <span class="badge bg-secondary">No Categories</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($demand->image && file_exists(public_path('uploads/demands/' . $demand->image)))
                                                <a href="{{ asset('uploads/demands/' . $demand->image) }}" target="_blank">
                                                    <img src="{{ asset('uploads/demands/' . $demand->image) }}" alt="Demand Image" width="80">
                                                </a>
                                            @else
                                                <span class="text-muted">No image</span>
                                            @endif
                                        </td>
                                        <td>{{ $demand->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.demands.edit', $demand->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.demands.destroy', $demand->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No demands found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
