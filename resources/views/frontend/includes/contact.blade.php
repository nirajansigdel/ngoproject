<style>
  .contactsection {
    background: var(--primary);
    /* Assuming --primary is your brand's primary color */
    padding: 60px 0;
    /* Increased padding for more space */
    color: #fff;
  }




  .content-right img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 15px;
  }
</style>












<section class="container-fluid contactsection py-4">
  <div class="container">
    <div class="row align-items-center gap-5 fcc">

      <!-- Left Section (col-md-6) -->
      <div class="col-md-6">
        <div class="content-left">
          <h1 class="md-text-bd whitehighlight">Let’s Connect with Us</h1>
          <p class="sm-text py-2 whitehighlight">Pará is a state in northern Brazil, traversed by the lower Amazon
            River, filled with stunning nature and culture.</p>
          <a class="btn btn-primary mt-2" href="{{ route('Contact') }}">Contact Us</a>

        </div>
      </div>

      <!-- Right Section (col-md-5) -->
      <div class="mx-3 col-md-5 d-flex align-items-center">
        <div class="content-right">
          <img src="{{asset('image/contactindex.png')}}" alt="Happy Client">
        </div>
      </div>

    </div>
  </div>
</section>



{{--

<section>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    .registration-container {
      max-width: 600px;
      margin: 0 auto;
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
    }

    .header h1 {
      color: #2a7f62;
      font-size: 24px;
      margin-bottom: 10px;
    }

    .header p {
      color: #666;
      font-size: 16px;
      line-height: 1.5;
    }

    .form-group {
      margin-bottom: 8px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #2a7f62;
    }

    input,
    select {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    select {
      appearance: none;
      background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 20px;
    }

    .time-options {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 10px;
    }

    .time-option {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s;
    }

    .time-option:hover {
      background-color: #f0f7f4;
      border-color: #2a7f62;
    }

    .time-option.selected {
      background-color: #2a7f62;
      color: white;
      border-color: #2a7f62;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .btn {
      padding: 12px 25px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-continue {
      background-color: #2a7f62;
      color: white;
      border: none;
    }

    .btn-continue:hover {
      background-color: #1e6b50;
    }

    .btn-back {
      background-color: white;
      color: #2a7f62;
      border: 1px solid #2a7f62;
    }

    .btn-back:hover {
      background-color: #f0f7f4;
    }
  </style>
  </head>

  <body>

    this is first form while click on continue only move to second form
    <div class="registration-container">
      <div class="header p-2 rounded-bl-full">
        <h1 class="mt-2">Class Registration 🧘‍♂️</h1>
        <p>Embrace Tranquility, Nurture Your Soul, and Begin Your Yoga Journey with Us. Unleash Inner Harmony and
          Radiate Well-being.</p>
      </div>

      <form>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="Enter your email address" required>
        </div>

        <!-- Category Dropdown -->
        <div class="form-group">
          <label for="main-category">Select Category</label>
          <select id="main-category" required>
            <option value="" disabled selected>Select Category</option>
            <option value="yoga">Yoga</option>
            <option value="meditation">Meditation</option>
            <option value="wellness">Wellness</option>
            <option value="learning">Learning</option>
            <option value="events">Events</option>
          </select>
        </div>

        <!-- Subcategory Dropdown -->
        <div class="form-group">
          <label for="sub-category">Select Subcategory</label>
          <select id="sub-category" required disabled>
            <option value="" disabled selected>First select a category</option>
          </select>
        </div>

        <div class="form-group">
          <label for="session-date">Session Date</label>
          <input type="date" id="session-date" value="2025-04-18" required>
        </div>

        <div class="form-group">
          <label>Session Time</label>
          <div class="time-options">
            <div class="time-option">5 - 6 AM</div>
            <div class="time-option">6 - 7 AM</div>
            <div class="time-option">7 - 8 AM</div>
            <div class="time-option">5 - 6 PM</div>
            <div class="time-option">6 - 7 PM</div>
            <div class="time-option">7 - 8 PM</div>
          </div>
        </div>

        <div class="button-group">
          <button type="button" class="btn btn-back">Go Back</button>
          <button type="submit" class="btn btn-continue">Continue</button>
        </div>
      </form>
    </div>



    <script>
      // Category-Subcategory data
      const categoryData = {
        yoga: [
          "Basic Yoga",
          "Intermediate Yoga",
          "Advanced Yoga",
          "Pregnancy Yoga",
          "Back Pain Yoga",
          "Joint Pain Yoga",
          "Detox Yoga",
          "Chair Yoga"
        ],
        meditation: [
          "Depression Relief",
          "Anxiety Management",
          "Mental Wellness",
          "Breathing Techniques",
          "Mudras",
          "Concentration"
        ],
        wellness: [
          "Nutrition Guidance",
          "Weight Management",
          "Diabetes Care",
          "Thyroid Management",
          "Blood Pressure",
          "Cholesterol",
          "Arthritis Care",
          "Fatty Liver"
        ],
        learning: [
          "Bhagvat Gita (Kids)",
          "Public Speaking",
          "Slokas Recitation",
          "Srimat Bhagavat",
          "Book Club",
          "Nepali Language",
          "Sanskrit Language"
        ],
        events: [
          "Kids Book Club",
          "Adult Book Club",
          "Elderly Book Club",
          "Kids Slokas",
          "Kids Gita Reading"
        ]
      };

      // Category selection handler
      const mainCategory = document.getElementById('main-category');
      const subCategory = document.getElementById('sub-category');

      mainCategory.addEventListener('change', function () {
        // Enable subcategory dropdown
        subCategory.disabled = false;

        // Clear existing options
        subCategory.innerHTML = '<option value="" disabled selected>Select Subcategory</option>';

        // Add new options
        categoryData[this.value].forEach(item => {
          const option = document.createElement('option');
          option.value = item.toLowerCase().replace(/ /g, '-');
          option.textContent = item;
          subCategory.appendChild(option);
        });
      });

      // Time selection functionality
      const timeOptions = document.querySelectorAll('.time-option');
      timeOptions.forEach(option => {
        option.addEventListener('click', function () {
          timeOptions.forEach(opt => opt.classList.remove('selected'));
          this.classList.add('selected');
        });
      });

      // Set minimum date to today
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('session-date').min = today;

      // Form submission
      document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();

        // Validate selections
        if (!mainCategory.value || !subCategory.value) {
          alert('Please select both category and subcategory');
          return;
        }

        // Collect form data
        const formData = {
          email: document.getElementById('email').value,
          category: mainCategory.value,
          subcategory: subCategory.value,
          date: document.getElementById('session-date').value,
          time: document.querySelector('.time-option.selected')?.textContent
        };

        console.log('Form Data:', formData);
        alert('Registration Successful!\nWe will contact you soon.');
        this.reset();
        // Reset subcategory dropdown
        subCategory.disabled = true;
        subCategory.innerHTML = '<option value="" disabled selected>First select a category</option>';
      });
    </script>
  </body>

  </html>
</section>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yoga Class Registration</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    .registration-container {
      max-width: 800px;
      margin: 0 auto;
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .form-section {
      margin-bottom: 30px;
      padding: 20px;
      border-radius: 10px;
      background-color: #f9f9f9;
    }

    .section-title {
      color: #2a7f62;
      font-size: 20px;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #2a7f62;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #2a7f62;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      box-sizing: border-box;
    }

    .time-options,
    .fee-options {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 10px;
    }

    .time-option,
    .fee-option {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s;
    }

    .selected {
      background-color: #2a7f62;
      color: white;
      border-color: #2a7f62;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }

    .btn {
      padding: 12px 25px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-continue {
      background-color: #2a7f62;
      color: white;
      border: none;
    }

    .btn-continue:hover {
      background-color: #1e6b50;
    }

    .btn-back {
      background-color: white;
      color: #2a7f62;
      border: 1px solid #2a7f62;
    }

    .btn-back:hover {
      background-color: #f0f7f4;
    }

    .hidden {
      display: none;
    }
  </style>
</head>
<style>
  /* Include all previous styles here */
  .step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
  }

  .step {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
    font-weight: bold;
  }

  .step.active {
    background: #2a7f62;
    color: white;
  }

  .success-message {
    text-align: center;
    padding: 40px;
    display: none;
  }

  .success-message h2 {
    color: #2a7f62;
    margin-bottom: 20px;
  }
</style>
</head>

<body>
  <div class="registration-container">
    <div class="step-indicator">
      <div class="step active">1</div>
      <div class="step">2</div>
      <div class="step">3</div>
    </div>

    <!-- Step 1: Class Registration -->
    <form id="multiStepForm">
      <div class="form-step active" data-step="1">
        <div class="section-title">
          <h2>Class Registration 🧘‍♂️</h2>
          <p>Embrace Tranquility and Begin Your Yoga Journey with Us</p>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" required>
        </div>

        <div class="form-group">
          <label for="main-category">Select Category</label>
          <select id="main-category" required>
            <option value="" disabled selected>Select Category</option>
            <option value="yoga">Yoga</option>
            <option value="meditation">Meditation</option>
            <option value="wellness">Wellness</option>
            <option value="learning">Learning</option>
            <option value="events">Events</option>
          </select>
        </div>

        <div class="form-group">
          <label for="sub-category">Select Subcategory</label>
          <select id="sub-category" required disabled>
            <option value="" disabled selected>First select a category</option>
          </select>
        </div>

        <div class="form-group">
          <label for="session-date">Session Date</label>
          <input type="date" id="session-date" required>
        </div>

        <div class="button-group">
          <button type="button" class="btn btn-continue" onclick="nextStep(2)">Continue</button>
        </div>
      </div>

      <!-- Step 2: Personal Information -->
      <div class="form-step hidden" data-step="2">
        <div class="section-title">
          <h2>Your Information 📃</h2>
          <p>Please provide your personal details</p>
        </div>

        <div class="form-group">
          <label>Full Name</label>
          <input type="text" id="full-name" required>
        </div>

        <div class="form-group">
          <label>Country</label>
          <input type="text" id="country" required>
        </div>

        <div class="form-group">
          <label>Session Time</label>
          <div class="time-options">
            <div class="time-option">5 - 6 AM</div>
            <div class="time-option">6 - 7 AM</div>
            <div class="time-option">7 - 8 AM</div>
            <div class="time-option">5 - 6 PM</div>
            <div class="time-option">6 - 7 PM</div>
            <div class="time-option">7 - 8 PM</div>
          </div>
        </div>

        <div class="button-group">
          <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
          <button type="button" class="btn btn-continue" onclick="nextStep(3)">Continue</button>
        </div>
      </div>

      <!-- Step 3: Payment -->
      <div class="form-step hidden" data-step="3">
        <div class="section-title">
          <h2>Payment Information 💳</h2>
          <p>Complete your payment to reserve your class</p>
        </div>

        <div class="form-group">
          <label>Card Number</label>
          <input type="text" id="card-number" required>
        </div>

        <div class="form-group">
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
              <label>Expiration Date</label>
              <input type="text" id="exp-date" required>
            </div>
            <div>
              <label>CVV</label>
              <input type="text" id="cvv" required>
            </div>
          </div>
        </div>

        <div class="button-group">
          <button type="button" class="btn btn-back" onclick="prevStep()">Back</button>
          <button type="submit" class="btn btn-continue">Submit Payment</button>
        </div>
      </div>
    </form>

    <!-- Success Message -->
    <div class="success-message">
      <h2>🎉 Registration Successful!</h2>
      <p>Your class has been booked. We've sent a confirmation email to your address.</p>
    </div>
  </div>

  <script>
    // Category-Subcategory data
    const categoryData = { /* Same as previous implementation */ };

    let currentStep = 1;
    const formSteps = document.querySelectorAll('.form-step');
    const steps = document.querySelectorAll('.step');

    function updateStepIndicator() {
      steps.forEach((step, index) => {
        step.classList.toggle('active', index < currentStep);
      });
    }

    function nextStep(step) {
      if (!validateStep(currentStep)) return;

      document.querySelector(`[data-step="${currentStep}"]`).classList.add('hidden');
      currentStep = step;
      document.querySelector(`[data-step="${currentStep}"]`).classList.remove('hidden');
      updateStepIndicator();
    }

    function prevStep() {
      document.querySelector(`[data-step="${currentStep}"]`).classList.add('hidden');
      currentStep--;
      document.querySelector(`[data-step="${currentStep}"]`).classList.remove('hidden');
      updateStepIndicator();
    }

    function validateStep(step) {
      // Validation logic for each step
      return true;
    }

    document.getElementById('multiStepForm').addEventListener('submit', function (e) {
      e.preventDefault();

      // Handle form submission
      document.querySelectorAll('.form-step').forEach(step => step.classList.add('hidden'));
      document.querySelector('.success-message').style.display = 'block';
      steps.forEach(step => step.classList.remove('active'));
    });

    // Include category/subcategory and time selection logic from previous implementation
  </script>
</body>

</html>





--}}
