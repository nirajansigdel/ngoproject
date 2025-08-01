@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>All Projects</span>
                        <a href="{{ route('admin.demands.create') }}" class="btn btn-primary">Create New Project</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($demands && $demands->count())
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="20%">Heading</th>
                                        <th width="20%">Subtitle</th>
                                        <!-- <th width="25%">Project Categories</th> -->
                                        <th width="10%">Image</th>
                                        <th width="10%">Created At</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($demands as $index => $demand)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <strong>{{ $demand->heading ?: 'N/A' }}</strong>
                                            </td>
                                            <td>{{ $demand->subtitle ?: 'N/A' }}</td>
                                        
                                            <td>
                                                @if ($demand->image && file_exists(public_path('uploads/demands/' . $demand->image)))
                                                    <a href="{{ asset('uploads/demands/' . $demand->image) }}" target="_blank" title="View Full Image">
                                                        <img src="{{ asset('uploads/demands/' . $demand->image) }}" 
                                                             alt="Project Image" 
                                                             class="img-thumbnail" 
                                                             style="width: 60px; height: 60px; object-fit: cover;">
                                                    </a>
                                                @else
                                                    <span class="text-muted">
                                                        <i class="fas fa-image"></i> No image
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $demand->created_at->format('M d, Y') }}
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.demands.edit', $demand->id) }}" 
                                                       class="btn btn-sm btn-warning" 
                                                       title="Edit Project">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.demands.destroy', $demand->id) }}" 
                                                          method="POST" 
                                                          class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this project?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-danger" 
                                                                title="Delete Project">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($demands->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $demands->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-folder-open fa-3x text-muted"></i>
                            </div>
                            <h5 class="text-muted">No Projects Found</h5>
                            <p class="text-muted">Start by creating your first project.</p>
                            <a href="{{ route('admin.demands.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Create First Project
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.table-responsive {
    border-radius: 8px;
    overflow: hidden;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.badge {
    font-size: 0.75rem;
    padding: 0.35em 0.65em;
}

.btn-group .btn {
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

.img-thumbnail {
    border: 2px solid #dee2e6;
    transition: transform 0.2s;
}

.img-thumbnail:hover {
    transform: scale(1.1);
    border-color: #007bff;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
}
</style>
@endsection
