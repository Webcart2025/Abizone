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
          <li><a href="{{ route('AboutUs') }}">About Us</a></li>
          <li><a href="#">Our Partners</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="{{ route('Contactus') }}">Contact Us</a></li>
          <li><a href="{{ url('/FAQs') }}">FAQs</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="{{ url('/TermsandConditions') }}">Terms and Conditions</a></li>
          <li><a href="{{ url('/CookiePolicy') }}">Cookie Policy</a></li>
          <li><a href="{{ url('/RefundPolicy') }}">Refund Policy</a></li>
          <li><a href="{{ url('/PrivacyPolicy') }}">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      © 2025 Abizone. All Rights Reserved.
    </div>
  </div>
</footer>
