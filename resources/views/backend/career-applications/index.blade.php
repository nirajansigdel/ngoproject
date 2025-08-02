@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Career Applications Report</h3>
                </div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    @if ($applications->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Applicant Name</th>
                                        <th>Career Position</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Applied Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $index => $application)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><strong>{{ $application->full_name }}</strong></td>
                                            <td>{{ $application->career->title }}</td>
                                            <td>{{ $application->email }}</td>
                                            <td>{{ $application->phone ?: 'Not provided' }}</td>
                                            <td>
                                                <span class="badge {{ $application->status_badge }}">
                                                    {{ $application->status_text }}
                                                </span>
                                            </td>
                                            <td>{{ $application->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.career-applications.show', $application->id) }}" class="btn btn-info btn-sm">View Details</a>
                                                <form action="{{ route('admin.career-applications.destroy', $application->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this application?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($applications->hasPages())
                            <div class="d-flex justify-content-center">
                                {{ $applications->links() }}
                            </div>
                        @endif
                    @else
                        <div class="text-center">
                            <p class="text-muted">No applications found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 