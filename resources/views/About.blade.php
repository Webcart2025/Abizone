<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="{{ asset('asset/css/about.css') }}" />
  <title>About Us - Abizone</title>

   <style>


    /* Reset and base styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Navbar styles */
    .navbar {
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 15px 5%;
      position: relative;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
    }

    .navbar-logo img {
      height: 60px;
      width: auto;
      max-width: 180px;
    }

    .navbar-links {
      display: flex;
      gap: 25px;
    }

    .navbar-links a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s;
      font-size: 20px;
    }

    .navbar-links a:hover {
      color: #FDC805;
    }

    .navbar-right {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .signin-btn {
      background-color: #FDC805;
      color: white;
      padding: 8px 15px;
      border-radius: 4px;
      text-decoration: none;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 5px;
      transition: background-color 0.3s;
    }

    .signin-btn:hover {
      background-color: #e6b800;
    }

    .lang-dropdown {
      position: relative;
    }
     .lang-dropdown span{
      font-size: 20px;
     }

    .lang-btn {
      background: none;
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
      font-weight: 500;
      color: #333;
      padding: 5px 10px;
    }

    .lang-menu {
      position: absolute;
      right: 0;
      top: 100%;
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      padding: 10px 0;
      min-width: 120px;
      display: none;
      z-index: 100;
    }

    .lang-menu a {
      display: block;
      padding: 8px 15px;
      text-decoration: none;
      color: #333;
      transition: background-color 0.3s;
    }

    .lang-menu a:hover {
      background-color: #f5f5f5;
    }

    .lang-dropdown:hover .lang-menu {
      display: block;
    }

    /* Mobile menu styles */
    .hamburger {
      display: none;
      font-size: 24px;
      cursor: pointer;
      padding: 5px;
    }

    .mobile-menu {
      display: none;
      flex-direction: column;
      background-color: white;
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      padding: 20px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }

    .mobile-menu.active {
      display: flex;
    }

    .mobile-menu a {
      padding: 12px 0;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
    }

    .mobile-menu .lang-menu {
      position: static;
      box-shadow: none;
      padding: 0;
      display: flex;
      flex-direction: column;
      margin-top: 10px;
    }

    .mobile-menu .lang-menu a {
      border-bottom: none;
      padding: 8px 0;
    }

    /* Responsive styles */
    @media (max-width: 992px) {
      .navbar-links {
        display: none;
      }

      .hamburger {
        display: block;
      }
      
      .navbar-right {
        display: none;
      }
    }

    @media (max-width: 576px) {
      .navbar {
        padding: 10px 15px;
      }
      
      .navbar-logo img {
        height: 35px;
      }
    }

    /* Image fallback styling */
    img {
      max-width: 100%;
      height: auto;
    }
    
   
  </style>
</head>
<body>
 <header class="navbar">
    <div class="navbar-logo">
      <!-- Updated image path with fallback -->
      <img src="{{ asset('asset/css/Images/NavLogo.png') }}" alt="Abizone Logo" 
           onerror="this.onerror=null; this.src='https://via.placeholder.com/180x40?text=Abizone+Logo'; this.style.border='none'">
    </div>

    <nav class="navbar-links">
      <a href="#" class="active">Visa</a>
      <a href="#">About us</a>
      <a href="#">Contact</a>
    </nav>

    <div class="navbar-right">
      <a href="{{ route('login') }}" class="signin-btn">
        <i class="fas fa-user"></i>
        <span>Sign In / Sign Up</span>
      </a>

      <div class="lang-dropdown">
        <button class="lang-btn">
          <i class="fas fa-language"></i>
          <span>English</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <div class="lang-menu">
          <a href="#">English</a>
          <a href="#">Español</a>
          <a href="#">Français</a>
          <a href="#">Deutsch</a>
        </div>
      </div>
    </div>

    <div class="hamburger" id="hamburger">☰</div>
    
    <div id="mobileMenu" class="mobile-menu">
      <a href="#" class="active">Visa</a>
      <a href="#">About us</a>
      <a href="#">Contact</a>
      <a href="{{ route('login') }}">Sign In / Sign Up</a>
      <div class="lang-menu">
        <a href="#">English</a>
        <a href="#">Español</a>
        <a href="#">Français</a>
        <a href="#">Deutsch</a>
      </div>
    </div>
  </header>

  <section class="about-section">
    <div class="about-container">
      <div class="about-text">
        <h1>We are obsessed with<br>delivering exceptional<br>experiences to you.</h1>
        <p>Stay connected when you travel with us</p>
      </div>
      <div class="about-image">
        <img src="{{ asset('asset/css/Images/about-banner.webp') }}" alt="Travel Image" />
      </div>
    </div>
  </section>

  <section class="about-oneseco">
    <div class="about-title">
      <h2>About <span>Abizone</span></h2>
      <p>
        Since 2012, OneVasco has pioneered revolutionizing the visa concierge services industry.
        Our deep understanding of visa complexities enables us to provide a streamlined, hassle-free experience.
        With expertise and a trained team, we stay updated with global regulations, offering accurate information
        and tailored solutions to meet individual needs. We believe obtaining a visa shouldn't be daunting, so
        we invest in state-of-the-art technology for a simplified process and timely updates, eliminating stress
        and uncertainty. Experience OneVasco's commitment to excellence and personalized attention as we make visa
        applications a seamless and worry-free endeavor.
      </p>
    </div>

    <section class="benefits-section">
      <div class="benefits-container">
        @foreach([
          ['One-stop-icon.svg', 'One-Stop Shop', 'Simplify your visa journey with our all-in-one Visa Concierge Services.'],
          ['partnership-icon.svg', 'Partnerships', 'Strong alliances with renowned travel brands for enhanced travel experience.'],
          ['presense-icon.svg', 'Presence', 'Across key global regions of Middle East & North Africa, Europe & Asia Pacific'],
          ['smart-visa.svg', 'Smart VisaTech', 'Tailored to Your Journey, Crafted for You'],
          ['personalize-experience.svg', 'Personalised Experience', 'Tailored to Your Journey, Crafted for You'],
          ['trusted-icon.svg', 'Trusted Support', 'With offices and a strong network of partners across the globe, OneVasco extends on-site support in the destination country']
        ] as $benefit)
        <div class="benefit-item">
          <div class="icon">
            <img src="{{ asset('asset/css/Images/One-stop-icon.svg') }}" alt="{{ $benefit[1] }} Icon" onerror="this.onerror=null; this.src='https://via.placeholder.com/50?text=Icon'; this.style.border='none'">
          </div>
          <h3>{{ $benefit[1] }}</h3>
          <p>{{ $benefit[2] }}</p>
        </div>
        @endforeach
      </div>

      <div class="presence-text">
        <h2>Our <span>global</span> presence</h2>
        <p>
          Headquartered in Dubai, United Arab Emirates, our offices are present across the key regions of Europe, Asia Pacific, Middle East and North Africa (MENA)
        </p>
      </div>
    </section>
  </section>

  <section class="office-info">
    <p>Head Office</p>
    <h2>ABIZONE WORLDWIDE DMCC</h2>
    <p>
      3101-B, Jumeirah Business Center 1, Cluster G, JLT,<br>
      P.O. Box 113345, Dubai, UAE
    </p>
  </section>
</body>
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
</html>
