<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Abizone Visa Service</title>
  <link rel="stylesheet" href="{{ asset('asset/css/homepage.css') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/user.welcome.css') }}" />
  
  

</head>
<body>
  @include('user.Navbar2')

  <section class="hero" style="background: url('{{ asset('asset/css/Images/landingimg.jpg') }}') center center/cover no-repeat;">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1>QUICKER, EASIER, SMARTER VISAS</h1>
      <p>
        Abizone simplifies your visa application with personalized assistance from start to finish.
        We help you fill and submit visa forms, and even pre-fill forms for future applications.
      </p>

      <div class="form">
        <!-- <div class="resident">
          <label>Resident of</label>
          <select>
            <option>India</option>
             Add more options -->
          </select> 
        </div>
        <select class="input select-icon select-flag" style="background: url('{{ asset('asset/css/Images/Alpha_Flag.png') }}') no-repeat 10px center; background-size: 20px 20px; padding-left: 40px; background-color: white; color: black; margin-top: 80px; width:300px;">
          <option>India</option>
        </select>
        <select class="input select-icon select-plane" style="background: url('{{ asset('asset/css/Images/AirplaneTakeOff.png') }}') no-repeat 10px center; background-size: 20px 20px; padding-left: 40px; background-color: white; color: black; margin-top: 80px; width: 300px;">
          <option>Destination</option>
          <option value="visa-container">Dubai-UAE</option>
        </select>
      </div>
    </div>
  </section>




<div class="visa-container" id="visa-container">
  <div class="visa-card active" onclick="selectCard(this)">
    <div class="corner-label">evisa</div>
    <h2>UAE 30 Days Single<br>Entry EVisa</h2>
    <hr />
    <div class="visa-icons">
      <span>🌐 Tourist, Business</span>
      <span>🛫 Single</span>
    </div>
    <hr />
    <div class="visa-footer">
      <span>30 Days</span>
      <span class="price">INR 7,250.00</span>
    </div>
    <div class="arrow-down"></div>
    <button class="explore-btn" onclick="goToCalender('UAE 30 Days Single Entry EVisa', 7250)">Explore Now</button>
  </div>

  <div class="visa-card" onclick="selectCard(this)">
    <div class="corner-label">evisa</div>
    <h2>UAE 30 Days Single<br>Entry Express eVisa</h2>
    <hr />
    <div class="visa-icons">
      <span>🌐 Tourist, Business</span>
      <span>🛫 Single</span>
    </div>
    <hr />
    <div class="visa-footer">
      <span>30 Days</span>
      <span class="price">INR 9,560.00</span>
    </div>
    <button class="explore-btn" onclick="goToCalender('UAE 30 Days Single Entry Express EVisa', 9560)">Explore Now</button>
  </div>

  <div class="visa-card" onclick="selectCard(this)">
    <div class="corner-label">evisa</div>
    <h2>UAE 30 Days Single Entry Evisa (Special Child Fare Traveling with Parent)<br></h2>
    <hr />
    <div class="visa-icons">
      <span>🌐 Tourist</span>
      <span>🛬 Single</span>
    </div>
    <hr />
    <div class="visa-footer">
      <span>30 Days</span>
      <span class="price">INR 7,250.00</span>
    </div>
    <button class="explore-btn" onclick="goToCalender('UAE 30 Days Single Entry EVisa', 7250)">Explore Now</button>
  </div>

  <div class="visa-card" onclick="selectCard(this)">
    <div class="corner-label">evisa</div>
    <h2>UAE 30 Days Single Entry Express Evisa (Special Child Fare Traveling with Parent)<br></h2>
    <hr />
    <div class="visa-icons">
      <span>🌐 Tourist</span>
      <span>🛫 Single</span>
    </div>
    <hr />
    <div class="visa-footer">
      <span>30 Days</span>
      <span class="price">INR 9,560.00</span>
    </div>
    <button class="explore-btn" onclick="goToCalender('UAE 30 Days Tourist Single Entry EVisa', 9560)">Explore Now</button>
  </div>
</div>

<script>
  function selectCard(card) {
    const allCards = document.querySelectorAll('.visa-card');
    allCards.forEach(c => c.classList.remove('active'));
    card.classList.add('active');
  }

  // Add event listener for destination select
  document.querySelector('.select-plane').addEventListener('change', function() {
    const selectedValue = this.value;
    if (selectedValue) {
      const targetElement = document.getElementById(selectedValue);
      if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
</script>
<script>
  function goToCalender(visaType, price) {
    const query = new URLSearchParams({
      type: visaType,
      price: price
    }).toString();
    window.location.href = `/calender?${query}`;
  }
</script>


  <section class="concierge-section">
    <div class="concierge-container">
      <div class="concierge-left">
        <h4>Premium Visa Conceirge</h4>
        <h1>Elite services, now at your doorstep.</h1>
        <button class="learn-more-btn">Learn More</button>
      </div>

      <div class="concierge-features">
        <div class="feature-box">
          <!-- <img src="icon-chat-star.png" alt="Chat Icon" /> -->
          <h3>Seamless & Convenient</h3>
          <p>Access expert visa assistance in comfort of home.</p>
        </div>
        <div class="feature-box">
          <!-- <img src="icon-hand-check.png" alt="Guidance Icon" /> -->
          <h3>Experienced Guidance</h3>
          <p>Visa experts ensure accurate and reliable support</p>
        </div>
        <div class="feature-box">
          <!-- <img src="icon-user-gear.png" alt="Support Icon" /> -->
          <h3>Personalized Support</h3>
          <p>Tailored assistance to meet individual application needs</p>
        </div>
      </div>
<!-- 
      <div class="concierge-image">
        <img src="man-thumbs-up.png" alt="Visa Concierge">
      </div>
    </div> -->
  </section>

  <section class="how-works">
    <h2>How does <span>Abizone</span> work</h2>
  </section>


  <section class="steps-section">
    <div class="steps-container">
      <div class="image-side">
        <img src="{{ asset('asset/css/Images/vasco-works.webp') }}" alt="Girl sitting with laptop" />
      </div>
      <div class="steps-content">
        <!-- Step 1 -->
        <div class="step-box">
          <div class="number-icon">
            <span class="step-number">1</span>
            <!-- <img src="1.jpeg" alt="icon" class="step-icon" /> -->
          </div>
          <div class="step-text">
            <h3>Register & Apply Online</h3>
            <p>Secure online application saves time and checks for errors</p>
          </div>
        </div>
        <!-- Separator Circle -->
        <div class="circle-separator"></div>
        <!-- Step 2 -->
        <div class="step-box">
          <div class="number-icon">
            <span class="step-number">2</span>
            <!-- <img src="2.jpeg" alt="icon" class="step-icon" /> -->
          </div>
          <div class="step-text">
            <h3>We do all The Work</h3>
            <p>While you enjoy and relax, our expert team ensures that the forms are correctly filled and submitted.</p>
          </div>          
        </div>
        <!-- Separator Circle -->
        <div class="circle-separator"></div>
        <!-- Step 3 -->
        <div class="step-box">
          <div class="number-icon">
            <span class="step-number">3</span>
            <!-- <img src="3.jpeg" alt="icon" class="step-icon" /> -->
          </div>
          <div class="step-text">
            <h3>Receive Visa</h3>
            <!-- <p>While you enjoy and relax, our expert team ensures that the forms are correctly filled and submitted.</p> -->
              <p>Realtime status updated to keep you informed.</p>
                    

          </div>
      </div>
    </div>
  </section>



  <section class="why-choose">
    <div class="container">
      <h2>Why <span>Choose</span> us</h2>
      <div class="choose-grid">
        <div class="choose-card">
          <div class="choose-icon">
            <img src="https://img.icons8.com/ios/100/000000/rocket--v1.png" alt="Speed and Simplicity">
          </div>
          <h3>SPEED AND SIMPLICITY</h3>
          <p>Easy, traveler-friendly application process. Simple and much less complicated than dealing with foreign governments.</p>
        </div>
        <div class="choose-card">
          <div class="choose-icon">
            <img src="https://img.icons8.com/ios/100/000000/approval--v1.png" alt="Expert Quality Check">
          </div>
          <h3>EXPERT QUALITY CHECK</h3>
          <p>All documents are reviewed by a team of immigration experts. Our staff is well-trained and offers years of experience.</p>
        </div>
        <div class="choose-card">
          <div class="choose-icon">
            <img src="https://img.icons8.com/ios/100/000000/shield--v1.png" alt="Secure and Safe">
          </div>
          <h3>SECURE AND SAFE</h3>
          <p>World-class data centers and state-of-the-art security. Your credit card information will never be exposed to any government websites!</p>
        </div>
        <div class="choose-card">
          <div class="choose-icon">
            <img src="https://img.icons8.com/ios/100/000000/online-support.png" alt="Awesome Support">
          </div>
          <h3>AWESOME SUPPORT</h3>
          <p>Our best in class customer service team is here to help you. We want you to enjoy your travels and avoid the stress of getting a visa!</p>
        </div>
      </div>
    </div>
  </section>


  <section class="popular-section">
    <div class="container">
      <h2>Most <span>popular</span> destinations</h2>
      <div class="destination-grid">
        <div class="destination-card">
          <img src="{{ asset('asset/css/Images/Singapore.jpeg') }}" alt="Singapore" />
          <h3>Singapore Visa</h3>
          
          <a href="#" class="btn">Explore More ↗</a>
        </div>
       
        <div class="destination-card">
          <img src="{{ asset('asset/css/Images/japanimage.jpeg') }}" alt="Germany" />
          <h3>Japan Visa</h3>
          
          <a href="#" class="btn">Explore More ↗</a>
        </div>
        <div class="destination-card">
            <a href="#destination-cards" class="destination-link">
                <img src="{{ asset('asset/css/Images/dubai.jpeg') }}" alt="Dubai-UAE">
                <div class="destination-info">
                    <h3>Dubai-UAE</h3>
                      <a href="#" class="btn">Explore More ↗</a>
                </div>
            </a>
        </div>
      </div>
    </div>
  </section>

  <div class="destination-cards" id="destination-cards">
    <div class="card">
      <!-- Destination card content -->
    </div>
  </div>

  <section class="testimonial-section">
    <div class="container">
      <h2>
        Trusted by <span class="highlight">4 Million</span> customers worldwide
      </h2>

      <div class="rating-box">
        <div class="rating-content">
          <span class="label">EXCELLENT</span>
          <span class="stars">★ ★ ★ ★ ★</span>
          <span class="rating-text">4.8 Average &nbsp; 158 Reviews</span>
        </div>
        <div class="rating-pointer"></div>
      </div>

      <div class="powered-by">Power by <span class="trustpilot">Trustpilot</span></div>

      {{-- <div class="testimonials">
        <div class="testimonial-card">
          <div class="user-icon">
            <img src="{{ asset('asset/css/Images/Women2.png') }}" alt="User Icon" />
          </div>
          <div class="testimonial-text">
            <p>
              I have received the visa, thank you for the efforts in order to send the visa to us on time. Great service from Onevasco. Will surely suggest others to use your service as well
            </p>
            <div class="user-info">
              <strong>Ankita Agarwal</strong>
              <span>Bengaluru</span>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="user-icon">
            <img src="{{ asset('asset/css/Images/Women2.png') }}" alt="User Icon" />
          </div>
          <div class="testimonial-text">
            <p>
              I want to thank the OneVasco team for their quick and efficient service in getting my Dubai visa. The entire process was so simple — I was able to upload my documents easily online, which made it super convenient. The fast turnaround time made my travel plans much easier. Will definitely recommend it to others looking for a hassle-free and reliable service. Thanks again for your great support!
            </p>
            <div class="user-info">
              <strong>Vainika Mulki</strong>
              <span>Mumbai</span>
            </div>
          </div>
        </div>
      </div> --}}


{{-- <div class="review-container">
  <h2>Review Form</h2>

  @if(session('success'))
    <div class="success-msg">{{ session('success') }}</div>
  @endif

  <form method="POST" action="">
    @csrf

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="rating">Rating</label>
      <div class="stars" id="star-container">
        @for ($i = 1; $i <= 5; $i++)
          <span class="star" data-value="{{ $i }}">★</span>
        @endfor
      </div>
      
      <input type="hidden" name="rating" id="rating" required>
    </div>

    <div class="form-group">
      <label for="message">Message</label>
      <textarea name="message" id="message" required></textarea>
    </div>

    <button type="submit" class="submit-btn">Submit</button>
  </form>
</div>

<script>
  const stars = document.querySelectorAll('.star');
  const ratingInput = document.getElementById('rating');

  stars.forEach(star => {
    star.addEventListener('click', function () {
      const rating = this.getAttribute('data-value');
      ratingInput.value = rating;

      stars.forEach(s => {
        s.style.color = (s.getAttribute('data-value') <= rating) ? '#ffc107' : '#ddd';
      });
    });
  });
</script> --}}




<div class="review-main-container" id="review-form">

  <!-- Left: Review Form -->
  <div class="review-container">
    <h2>Submit Your Review</h2>

    @if(session('success'))
        <div class="success-msg" style="display: block; background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1rem; text-align: center;">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required value="{{ old('name') }}" />
      </div>

      <div class="form-group">
        <label for="rating">Rating</label>
        <div class="stars" id="star-container">
          <span class="star" data-value="1">★</span>
          <span class="star" data-value="2">★</span>
          <span class="star" data-value="3">★</span>
          <span class="star" data-value="4">★</span>
          <span class="star" data-value="5">★</span>
        </div>
        <input type="hidden" name="rating" id="rating" required value="{{ old('rating') }}" />
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" required>{{ old('message') }}</textarea>
      </div>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>

  <!-- Right: Nearby Reviews -->
  <div class="nearby-reviews-container">
    <h2> Reviews</h2>

    @forelse($reviews as $review)
    <div class="review-card">
      <div class="review-header">
        <h4>{{ $review->name }}</h4>
        <div class="stars">
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $review->rating)
                    ★
                @else
                    ☆
                @endif
            @endfor
        </div>
      </div>
      <p class="review-msg">{{ $review->message }}</p>
    </div>
    @empty
    <div class="review-card">
      <p class="review-msg">No reviews yet. Be the first to leave a review!</p>
    </div>
    @endforelse

  </div>

</div>

<script>
  const stars = document.querySelectorAll('.star');
  const ratingInput = document.getElementById('rating');

  stars.forEach(star => {
    star.addEventListener('click', function () {
      const rating = this.getAttribute('data-value');
      ratingInput.value = rating;

      stars.forEach((s, index) => {
        s.style.color = (s.getAttribute('data-value') <= rating) ? '#ffc107' : '#ddd';
      });
    });
  });

  // Pre-select stars if there's an old rating value
  if (ratingInput.value) {
      stars.forEach(s => {
          if (s.getAttribute('data-value') <= ratingInput.value) {
              s.style.color = '#ffc107';
          }
      });
  }
</script>


    </div>
  </section>


  <section class="travel-section">
    <div class="container">
      <div class="content">
        <div class="left">
          <h2>
            Upgrade your <span class="highlight">Travel Experience</span> with our Travel Must Haves
          </h2>
          <div class="card">
            <div class="icon">
              <img src="{{ asset('asset/css/Images/Travel_Insurance.svg') }}" alt="SIM Card Icon">
            </div>
            <div class="text">
              <h3>SIM Cards</h3>
              <p>Stay connected when you travel with a range of Sim cards offered by our partners.</p>
            </div>
          </div>
          <div class="card">
            <div class="icon">
              <img src="{{ asset('asset/css/Images/Forex_Icon.svg') }}" alt="Forex Icon">
            </div>
            <div class="text">
              <h3>Forex</h3>
              <p>Travel across the globe hassle free with our Forex Services</p>
            </div>
          </div>
        </div>
        <div class="right">
          <img src="{{ asset('asset/css/Images/TravelExpGirl.webp') }}" alt="Girl with Laptop">
        </div>
      </div>
    </div>
  </section>


  @include('user.Footer')

</body>
</html>