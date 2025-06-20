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
      <li><a href="AgentDashboard">Dashboard</a></li>
      <li><a href="AgentUser">New Users</a></li>
      <li><a href="a_reg">View Users</a></li>
      <li><a href="VisaApplicationDetails">Application</a></li>
      <li><a href="wallet">Wallet</a></li>
      <li><a href="applicant">Applicant </a></li>
      
              
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
    <li><a href="AgentDashboard">Dashboard</a></li>
      <li><a href="AgentUser">New Users</a></li>
      <li><a href="a_reg">View Users</a></li>
      <li><a href="VisaApplicationDetails">Application</a></li>
      <li><a href="wallet">Wallet</a></li>
      <li><a href="applicant">Applicant </a></li>
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
