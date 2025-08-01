
 <style>
    .rescue-section::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: url('{{ asset('image/rescue.avif') }}') no-repeat center center / cover;
      opacity: 0.5;
      z-index: 0;
      pointer-events: none;
    }

    .rescue-section .content-wrapper {
      position: relative;
      z-index: 1;
    }
    .orange-outline-btn {
  color: #ef6b20;
  border: 2px solid #ef6b20;
  background-color: transparent;
  transition: all 0.3s ease;
}

.orange-outline-btn:hover {
  background-color: #ef6b20;
  color: white;
}

  
  </style>
<section class="rescue-section position-relative text-black py-5 overflow-hidden">
  <div class="container content-wrapper">
    <div class="row justify-content-center g-5 gap-4">
      <!-- Rescue -->
     <div class="col-12 col-md-5 text-center border border-success p-4 rounded-3 shadow-sm" style="background: #f0F0F0;opacity: 0.8;text-align:left" >
  <h2 class="fw-bold fs-3 mb-3">Rescue</h2>

  <p class="fs-6 mb-4 lh-lg mx-auto" style="max-width: 80%;text-align:left">
    Night after night, our agents enter some of the darkest places on the planet to find and rescue children trapped in sexual exploitation or trafficking.
  </p>


  <a href="{{ route('Blogpostcategory') }}" class="btn fw-bold px-4 py-3 orange-outline-btn">
  LEARN MORE
</a>

</div>

      <!-- Reintegration -->
      <div class="col-12 col-md-5 text-center border border-success p-4 rounded-3 shadow-sm" style="background: #f0F0F0;opacity: 0.8;text-align:left" >
        <h2 class="fw-bold fs-3 mb-3">Reintegration</h2>
        <p class="fs-6 mb-4 lh-lg mx-auto" style="max-width: 80%;text-align:left">
          When we’re able, we identify what made a child vulnerable to exploitation, and then equip them and their family overcome it – and thrive.
        </p>
        <a href="{{ route('events') }}" class="btn fw-bold px-4 py-3 orange-outline-btn">
          LEARN MORE
        </a>
      </div>
    </div>
  </div>
</section>






