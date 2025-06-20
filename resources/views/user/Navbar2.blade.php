<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Slim Navbar</title>
  <link rel="stylesheet" href="{{ asset('asset/css/Navbar2.css') }}" />
  
</head>
<body>
  <nav>
    <div class="logo">
      <img src="{{ asset('asset/css/images/NavLogo.png') }}" alt="logo" />
    </div>

    <ul class="desktop-nav">
      <li><a href="{{ route('logins') }}">Visa</a></li>
      <li><a href="ContactUs">Contact Us</a></li>
      <li><a href="AboutUs">About Us</a></li>
      <li class="dropdown-container">
                <dropdown class="profile-btn" id="profile-btn">
                    <img src="asset/css/Images/MaleUser.png" alt="Profile" class="icon2">
                </dropdown>
                <!-- User Profile Dropdown -->
                <div class="dropdown-menu" id="profile-dropdown">
                    @if(Auth::check())  <!-- Check if the user is logged in -->
                    <p class="email">
                            <span class="icon">📧</span> {{ Auth::user()->email }}
                    </p>
                    @else
                        <p class="email">Guest</p>  <!-- Default message for guest users -->
                    @endif
                    <a href="{{ route('profile') }}">👤 My Profile</a>
                    <a href="">🎫 Applied Visas</a>


                    <!-- Logout Button -->
                    @if(Auth::check()) 
                        <a href="javascript:void(0);" id="logout-button">↩ Logout</a>
                    @else
                        <a href="#">↩ Logout</a>
                    @endif

                    <!-- Delete Account Form -->
                    @if(Auth::check()) 
                        <form id="delete-account-form" action="{{ route('account.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="delete-account">Delete my account</button>
                        </form>
                    @endif
                </div>
            </li>
            <li class="dropdown-container">
                <dropdown class="translate-btn" id="translate-btn">
                    <img src="asset/css/Images/GoogleTranslate.png" alt="Translate" class="icon1">
                </dropdown>
                <!-- Language Dropdown -->
                <div class="dropdown-menu" id="language-dropdown">
                    <a href="#">🇬🇧 English</a>
                    <a href="#">🇦🇪 Arabic</a>
                </div>
            </li>
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
      <li><a href="{{ route('logins') }}">Visa</a></li>
      <li><a href="ContactUs">Contact Us</a></li>
      <li><a href="AboutUs">About Us</a></li>
          <li><a href="Logins">Profile</a></li>
      <li><a href="SignUp">Language</a></li>
      <li><a href="Logins">Logout</a></li>
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


     // This script will handle the logout via AJAX (POST request)
     document.addEventListener("DOMContentLoaded", function () {
            const profileBtn = document.getElementById("profile-btn");
            const profileDropdown = document.getElementById("profile-dropdown");
            const languageBtn = document.getElementById("translate-btn");
            const languageDropdown = document.getElementById("language-dropdown");

            // Handle logout via AJAX
            const logoutButton = document.getElementById('logout-button');
            if (logoutButton) {
                logoutButton.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent default behavior

                    // Send AJAX POST request to the logout route
                    fetch('{{ route('logout') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Redirect to home page after successful logout
                        window.location.href = data.redirectUrl;
                    })
                    .catch(error => {
                        console.error('Error logging out:', error);
                    });
                });
            }

            // Function to toggle dropdown visibility
            function toggleDropdown(dropdown) {
                closeAllDropdowns();
                dropdown.classList.toggle("active");
            }

            // Function to close all dropdowns
            function closeAllDropdowns() {
                document.querySelectorAll(".dropdown-menu").forEach(dropdown => {
                    dropdown.classList.remove("active");
                });
            }

            // Show/Hide Profile Dropdown on Click
            profileBtn.addEventListener("click", function (event) {
                event.stopPropagation();
                toggleDropdown(profileDropdown);
            });

            // Show/Hide Language Dropdown on Click
            languageBtn.addEventListener("click", function (event) {
                event.stopPropagation();
                toggleDropdown(languageDropdown);
            });

            // Close dropdowns when clicking outside
            document.addEventListener("click", function () {
                closeAllDropdowns();
            });

            // Close dropdowns on Escape key press
            document.addEventListener("keydown", function (event) {
                if (event.key === "Escape") {
                    closeAllDropdowns();
                }
            });
        });
  </script>
</body>
</html>
