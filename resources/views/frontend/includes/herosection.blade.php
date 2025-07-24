
@section('content')


<style>
    .min-vh-84 {
    min-height: 84vh;
}


.btn-outline-light:hover {
    background-color: #ffffff;
    color: #000 !important;
    border-color: #ffffff;
    transition: all 0.3s ease-in-out;
}
</style>

<section class="container-fluid  ">
    <div class="container bg-dark text-white py-5 min-vh-84 d-flex align-items-center rounded">
        <div class="row align-items-center mx-5 g-5 ">
            <!-- Left Content -->
            <div class="col-md-7">
                <h1 class="display-4 fw-bold mb-4">Welcome To The <br>Umbrella Organization</h1>
                <p class="text-secondary mb-4">
                    We rescue vulnerable children, reintegrate them into safe family environments, and provide vital support through education, childcare homes, and community outreach. Explore how each of our services helps rebuild lives and restore futures across Nepal.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('Contact') }}" class="btn btn-danger px-4 py-2">Book an Appointment</a>
                    <a href="{{ route('Service') }}" class="btn btn-outline-light px-4 py-2">Explore Services</a>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-md-5">
                <div class="d-flex gap-4 mb-4">
                    <div class="bg-danger text-white p-4 rounded-3 flex-fill">
                        <h2 class="mb-1">4.9 <span class="text-warning">★</span></h2>
                        <p class="mb-0">100% Client Satisfaction</p>
                    </div>
                    <div class="bg-white text-dark p-4 rounded-3 flex-fill d-flex align-items-center">
                        <div class="me-3" style="width: 50px; height: 50px; border: 10px solid #c8102e; border-radius: 50%;"></div>
                        <div>
                            <p class="mb-0 fw-semibold">Google Reviews</p>
                            <strong class="fs-5">100+</strong>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-3 p-4 text-center">
                    <img src="{{ asset('image/gif.jpg') }}" alt="Developer Illustration" class="img-fluid" style="max-width: 280px;">
                </div>
            </div>
        </div>
    </div>
</section>


















