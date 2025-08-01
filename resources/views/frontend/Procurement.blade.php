@extends('frontend.layouts.master')

@section('content')
<style>
  .procurement-check {
    width: 30px;
    height: 100%;
    background-color: #2f8b45;
    border-radius: 50%;
    color: white;
    font-weight: 700;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid black;
    flex-shrink: 0;
  }

  .procurement-question {
    border-left: 2px solid #2f8b45;
    padding-left: 1rem;
    color: #2f8b45;
    font-weight: 700;
    font-size: 1.1rem;
  }

  .procurement-content {
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    background-color: #f5f6f5;
    transition: max-height 0.4s ease, opacity 0.4s ease, padding 0.4s ease;
    padding: 0;
  }

  .procurement-content.active {
    max-height: 1000px;
    opacity: 1;
    padding: 2rem 0;
  }

  .procurement-header {
    background-color: white;
    padding: 1rem;
  }
</style>

<section class="container-fluid my-5">
  <h2 class="section-title">Procurement</h2>
  <div class="container">
    @forelse ($Faqs as $index => $faq)
      <div class="border rounded mb-4">
        <!-- Header -->
        <div class="d-flex align-items-center mx-4 py-4 procurement-header" style="cursor:pointer;" data-target="content-{{ $index }}">
          <div class="procurement-check">✓</div>
          <div class="procurement-question ms-3 flex-grow-1">
            {{ $faq->question }}
          </div>
        </div>

        <!-- Content -->
        <div id="content-{{ $index }}" class="procurement-content px-4">
          <div class="row align-items-center">
            <div class="col-md-7 text-success">
              <h4 class="fw-bold">Procurement of the Tractor</h4>
              <p>{!! nl2br(e($faq->answer)) !!}</p>

              <!-- SEE DETAILS button triggers bootstrap modal -->
              <button type="button" class="btn btn-success text-uppercase fw-semibold open-image-modal" 
                      data-bs-toggle="modal" 
                      data-bs-target="#imageModal"
                      data-img="{{ asset('image/um.jpg') }}">
                SEE DETAILS
              </button>
            </div>
            <div class="col-md-5 text-center">
              <img src="{{ asset('image/um.jpg') }}" alt="procurement image" class="img-fluid" style="max-width: 200px;">
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-muted text-center">No procurement data available.</p>
    @endforelse
  </div>
</section>

<!-- Bootstrap Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-dialog-centered">
    <div class="modal-content bg-dark text-white position-relative">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" alt="Preview" class="img-fluid" style="max-height: 70vh;">
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <a id="downloadImage" href="#" download class="btn btn-success">
          <i class="bi bi-download"></i> Download
        </a>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="bi bi-x-lg"></i> Cancel
        </button>
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Accordion toggle
    document.querySelectorAll('.procurement-header').forEach(header => {
      header.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target');
        const content = document.getElementById(targetId);
        const isActive = content.classList.contains('active');

        // Collapse all
        document.querySelectorAll('.procurement-content').forEach(c => c.classList.remove('active'));

        // Toggle this one
        if (!isActive) {
          content.classList.add('active');
        }
      });
    });

    // Bootstrap modal image setup
    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const downloadLink = document.getElementById('downloadImage');

    imageModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const imgUrl = button.getAttribute('data-img');
      modalImage.src = imgUrl;
      downloadLink.href = imgUrl;
    });

    imageModal.addEventListener('hidden.bs.modal', function () {
      modalImage.src = '';
      downloadLink.href = '#';
    });
  });
</script>
@endsection
