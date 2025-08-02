@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Application Details</h3>
                    <a href="{{ route('admin.career-applications.index') }}" class="btn btn-secondary">Back to List</a>
                </div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <h5>Applicant Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>{{ $application->full_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $application->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone:</strong></td>
                                    <td>{{ $application->phone ?: 'Not provided' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Applied for:</strong></td>
                                    <td>{{ $application->career->title }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Applied Date:</strong></td>
                                    <td>{{ $application->created_at->format('M d, Y \a\t g:i A') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        <span class="badge {{ $application->status_badge }}">
                                            {{ $application->status_text }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            @if($application->availability)
                                <h5>Availability</h5>
                                <p>{{ $application->availability }}</p>
                            @endif

                            @if($application->why_volunteer)
                                <h5>Why Volunteer?</h5>
                                <p>{{ $application->why_volunteer }}</p>
                            @endif

                            @if($application->admin_notes)
                                <h5>Admin Notes</h5>
                                <p>{{ $application->admin_notes }}</p>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <h5>Documents</h5>
                            
                            @if($application->cv_resume)
                                <div class="mb-3">
                                    <strong>CV/Resume:</strong><br>
                                    <a href="{{ Storage::url($application->cv_resume) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download"></i> Download CV
                                    </a>
                                </div>
                            @endif

                            @if($application->academic_certificates)
                                <div class="mb-3">
                                    <strong>Academic Certificates:</strong><br>
                                    <a href="{{ Storage::url($application->academic_certificates) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download"></i> Download Certificates
                                    </a>
                                </div>
                            @endif

                            @if($application->additional_documents)
                                <div class="mb-3">
                                    <strong>Additional Documents:</strong><br>
                                    <a href="{{ Storage::url($application->additional_documents) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download"></i> Download Documents
                                    </a>
                                </div>
                            @endif

                            <hr>

                            <h5>Update Status</h5>
                            <form action="{{ route('admin.career-applications.update-status', $application->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="completed" selected>Completed</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="admin_notes">Admin Notes</label>
                                    <textarea name="admin_notes" id="admin_notes" class="form-control" rows="3" placeholder="Add any notes about this application">{{ $application->admin_notes }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 