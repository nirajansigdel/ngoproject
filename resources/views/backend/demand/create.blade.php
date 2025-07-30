@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Demand</div>

                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('admin.demands.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" id="heading" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control">
                        </div>

                       

                        <div class="form-group pt-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(event)">
                            <div id="imagePreview"></div>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" class="form-control summernote" rows="5"></textarea>
                        </div>

                        {{-- Demand Type Selection --}}
                        <div class="form-group">
                            <label>Demand Categories</label>
                            <ul style="list-style-type: none; padding-left: 0;">
                                <li>
                                    <label><input type="checkbox" class="demand-type" value="cyc" name="demand_types[]"> Chautari Youth Club (CYC)</label>
                                </li>
                                <li>
                                    <label><input type="checkbox" class="demand-type" value="nsep" name="demand_types[]"> Next Steps Education Program (NSEP)</label>
                                </li>
                                <li>
                                    <label><input type="checkbox" class="demand-type" value="frp" name="demand_types[]"> Family Reintegration Program (FRP)</label>
                                </li>
                                <li>
                                    <label><input type="checkbox" class="demand-type" value="community_empowerment" name="demand_types[]"> Community Empowerment</label>
                                </li>
                                <li>
                                    <label><input type="checkbox" class="demand-type" value="bamboo_project" name="demand_types[]"> Bamboo Project</label>
                                </li>
                                <li>
                                    <label><input type="checkbox" class="demand-type" value="child_care_home" name="demand_types[]"> Child Care Home</label>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

                    {{-- Related Demands Display --}}
                    <hr>
                    <div id="related-demands-container">
                        @if ($relatedDemands->count())
                            <h5>Related Demands</h5>
                            <ul class="list-group mt-3">
                                @foreach ($relatedDemands as $demand)
                                    <li class="list-group-item">
                                        <strong>{{ ucfirst($demand->type) }}</strong> — {{ $demand->vacancy }}<br>
                                        <small>{{ $demand->from_date }} to {{ $demand->to_date }}</small>
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
                $('#related-demands-container').empty();
            }
        });
    });
</script>
@endsection