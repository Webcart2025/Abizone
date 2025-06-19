<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Slim Navbar</title>
  <link rel="stylesheet" href="{{ asset('asset/css/Navbar.css') }}" />
  
</head>
<body>
  <nav>
    <div class="logo">
      <img src="{{ asset('asset/css/images/NavLogo.png') }}" alt="logo" />
    </div>

    <ul class="desktop-nav">
      <li><a href="Logins">Visa</a></li>
      <li><a href="ContactUs">Contact Us</a></li>
      <li><a href="AboutUs">About Us</a></li>
      <li><a href="SignUp">Login</a></li>
    </ul>

    <div class="hamburger">
      <img id="hamburgerIcon" src="{{ asset('asset/css/Images/menu_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="menu" />
    </div>
  </nav>

  <div class="menubar" id="menubar">
    <div class="close-btn">
      <img id="closeIcon" src="{{ asset('asset/css/Images/close_FILL0_wght400_GRAD0_opsz48.svg') }}" alt="close" />
    </div>
    <ul>
      <li><a href="Document">Visa</a></li>
      <li><a href="ContactUs">Contact Us</a></li>
      <li><a href="AboutUs">About Us</a></li>
      <li><a href="Logins">Login</a></li>
    </ul>
  </div>

  <script>
    const hamburger = document.querySelector('.hamburger');
    const menubar = document.getElementById('menubar');
    const closeIcon = document.getElementById('closeIcon');

    hamburger.addEventListener('click', () => {
      menubar.classList.add('active');
    });

    closeIcon.addEventListener('click', () => {
      menubar.classList.remove('active');
    });
  </script>
</body>
</html>
