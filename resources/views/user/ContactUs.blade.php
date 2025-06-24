<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('asset/css/contactus.css') }}" />
  <title>Contact Us</title>
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
    @include('user.Navbar2')

  <section class="contact-container">
    <div class="contact-header">
      <h2>We are here for <span class="highlight">you!</span></h2>
      <select>
        <option>Select Option</option>
      </select>
    </div>

    @if(session('success'))
      <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1rem; text-align: center;">
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

    <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
      @csrf
      <h3>Contact Form</h3>
      <div class="form-grid">
        <div class="form-group">
          <label for="first_name">First Name*</label>
          <input type="text" id="first_name" name="first_name" placeholder="Enter Your First Name" required value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
          <label for="last_name">Last Name*</label>
          <input type="text" id="last_name" name="last_name" placeholder="Enter Your Last Name" required value="{{ old('last_name') }}">
        </div>
        <div class="form-group mobile-group">
          <label for="mobile_number">Mobile Number*</label>
          <div class="mobile-wrapper">
            <select name="country_code"><option>+91</option></select>
            <input type="text" id="mobile_number" name="mobile_number" placeholder="Enter Number" required value="{{ old('mobile_number') }}">
          </div>
        </div>
        <div class="form-group full-width radio-group">
          <label>Are you an existing OneVasco customer*</label>
          <label><input type="radio" name="is_existing_customer" value="1" {{ old('is_existing_customer') == '1' ? 'checked' : '' }}> Yes</label>
          <label><input type="radio" name="is_existing_customer" value="0" {{ old('is_existing_customer', '0') == '0' ? 'checked' : '' }}> No</label>
        </div>
        <div class="form-group">
          <label for="email">Email ID*</label>
          <input type="email" id="email" name="email" placeholder="Enter Email ID" required value="{{ old('email') }}">
        </div>
        <div class="form-group">
          <label for="resident_country">Your resident country*</label>
          <select id="resident_country" name="resident_country" required>
            <option value="">Select Country</option>
            <option value="India" {{ old('resident_country') == 'India' ? 'selected' : '' }}>India</option>
            <option value="USA" {{ old('resident_country') == 'USA' ? 'selected' : '' }}>USA</option>
            <option value="UK" {{ old('resident_country') == 'UK' ? 'selected' : '' }}>UK</option>
          </select>
        </div>
        <div class="form-group">
          <label for="enquiry_type">Enquiry Type*</label>
          <select id="enquiry_type" name="enquiry_type" required>
            <option value="">Select Enquiry Type</option>
            <option value="Visa" {{ old('enquiry_type') == 'Visa' ? 'selected' : '' }}>Visa</option>
            <option value="General" {{ old('enquiry_type') == 'General' ? 'selected' : '' }}>General</option>
          </select>
        </div>
        <div class="form-group full-width">
          <label for="message">How can we assist you?*</label>
          <textarea id="message" name="message" placeholder="Enter Your Description" required>{{ old('message') }}</textarea>
        </div>
      </div>

      <div class="captcha-box">
        <div class="captcha-left">
          <input type="checkbox" id="robot-check">
          <label for="robot-check">I'm not a robot</label>
        </div>
        <div class="captcha-right">
          <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="captcha">
          <div class="captcha-info">
            <div>reCAPTCHA</div>
            <small>Privacy - Terms</small>
          </div>
        </div>
      </div>

      <div class="submit-container">
        <button class="submit-btn">Submit</button>
      </div>
    </form>
  </section>

  <section class="feedback-section">
    <div class="opinion-box">
      <h2>We Value your Opinion</h2>
      <p>
        Do share your feedback with us by clicking here and filling up the feedback form. 
        <a href="#" class="feedback-link">Share Feedback</a>
      </p>
    </div>
  </section>

  @include('user.Footer')
</body>
</html>
