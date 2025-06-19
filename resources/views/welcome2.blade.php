<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OneVasco Visa Service</title>
  <link rel="stylesheet" href="{{ asset('asset/css/homepage.css') }}" />
  
  

</head>
<body>
  <header>
    <div class="navbar">
      <div class="logo">
        <img src="{{ asset('asset/css/Images/NavLogo.png') }}" alt="NavLogo" />
        <!-- <span>Visa Concierge Services since 2012</span> -->
      </div>
      <!-- <nav>
        <a href="#">Visa</a>
        <a href="#">Travel Insurance</a>
        <a href="#">Contact</a>
      </nav> -->
      <div class="actions">
        <div class="nav-links"> 
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
          
                <!-- <div class="user-dropdown">
                    <button class="user-dropdown-btn">
                       
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <div class="user-info">
                            
                        </div>
                        <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item-form">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                        <form method="POST" action="{{ route('delete.account') }}" class="dropdown-item-form" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-trash"></i> Delete Account
                            </button>
                        </form>
                    </div>
                </div> -->
          
                <a href="{{ route('login') }}" class="login-btn">Sign In</a>
                <a href="{{ route('register') }}" class="signup-btn">Sign Up</a>
          
        </div>
        <select class="lang">
          <option>English</option>
          <!-- Add more languages as needed -->
        </select>
      </div>
    </div>
  </header>

  <section class="hero" style="background: url('{{ asset('asset/css/Images/landingimg.jpg') }}') center center/cover no-repeat;">
    <div class="overlay"></div>
    <div class="hero-content">
      <h1>QUICKER, EASIER, SMARTER VISAS</h1>
      <p>
        OneVasco simplifies your visa application with personalized assistance from start to finish.
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
    <button class="explore-btn" onclick="goToCalender('UAE 58 Days Single Entry EVisa', 7250)">Explore Now</button>
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
    <button class="explore-btn" onclick="goToCalender('UAE 58 Days Tourist Single Entry EVisa', 9560)">Explore Now</button>
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

      <div class="testimonials">
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
      </div>
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


  <footer class="footer">
    <div class="top-shape"></div>
    <div class="footer-content">
      <div class="footer-logo">
        <img src="{{ asset('asset/css/Images/NavLogo.png') }}" alt="NavLogo">
        <p>Visa Concierge Services since 2012</p>
      </div>
      <hr>
      <div class="footer-links">
        <div class="footer-column">
          <h4>Company</h4>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Partners</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Cookie Policy</a></li>
            <li><a href="#">Refund Policy</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        © 2025 Abizone. All Rights Reserved.
      </div>
    </div>
  </footer>

</body>
</html>