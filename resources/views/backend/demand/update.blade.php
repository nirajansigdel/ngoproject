@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Demand</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('admin.demands.update', $demand->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" id="heading" class="form-control" value="{{ old('heading', $demand->heading) }}">
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $demand->subtitle) }}">
                        </div>

                        <div class="form-group pt-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(event)">
                            @if ($demand->image)
                                <div id="imagePreview">
                                    <img src="{{ asset('uploads/demands/' . $demand->image) }}" style="max-width: 200px; max-height: 200px;">
                                </div>
                            @else
                                <div id="imagePreview"></div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control summernote" rows="5">{{ old('content', $demand->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Demand Categories</label>
                            <ul style="list-style-type: none; padding-left: 0;">
                                @php
                                    $types = old('demand_types', $demand->demand_types ?? []);
                                @endphp
                                @foreach(['cyc' => 'Chautari Youth Club (CYC)', 'nsep' => 'Next Steps Education Program (NSEP)', 'frp' => 'Family Reintegration Program (FRP)', 'community_empowerment' => 'Community Empowerment', 'bamboo_project' => 'Bamboo Project', 'child_care_home' => 'Child Care Home'] as $key => $label)
                                    <li>
                                        <label>
                                            <input type="checkbox" class="demand-type" name="demand_types[]" value="{{ $key }}" {{ in_array($key, $types) ? 'checked' : '' }}>
                                            {{ $label }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    {{-- Related Demands --}}
                    <hr>
                    <div id="related-demands-container">
                        @if (isset($relatedDemands) && $relatedDemands->count())
                            <h5>Related Demands</h5>
                            <ul class="list-group mt-3">
                                @foreach ($relatedDemands as $rel)
                                    <li class="list-group-item">
                                        <strong>{{ ucfirst($rel->type) }}</strong> — {{ $rel->vacancy }}<br>
                                        <small>{{ $rel->from_date }} to {{ $rel->to_date }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No related demands found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('imagePreview');
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                preview.appendChild(img);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200,
            focus: true
        });

        $('.demand-type').on('change', function () {
            let selectedTypes = [];
            $('.demand-type:checked').each(function () {
                selectedTypes.push($(this).val());
            });

            if (selectedTypes.length > 0) {
                $.ajax({
                    url: "{{ route('admin.demands.fetchRelated') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        types: selectedTypes
                    },
                    success: function (response) {
                        $('#related-demands-container').html(response.html);
                    },
                    error: function () {
                        $('#related-demands-container').html('<p class="text-danger">Failed to load related demands.</p>');
                    }
                });
            } else {
                $('#related-demands-container').html('<p class="text-muted">No related demands found.</p>');
            }
        });
    });
</script>
@endsection
