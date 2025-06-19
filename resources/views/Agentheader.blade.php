<!-- resources/views/includes/header.blade.php -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abizon Agent Side</title>
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/AgentSide/Dashboard.css') }}">
    <link rel="shortcut icon" href="" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        
      </div>

      <!-- Top Navbar -->
       <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
           
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="AgentDashboard"><img src="{{ asset('asset/css/Images/NavLogo.svg') }}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="AgentDashboard"><img src="{{ asset('asset/css/Images/NavLogo.svg') }}" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name">Johnson</span>
                    <span class="online-status"></span>
                    <img src="{{ asset('/asset/css/Images/MaleUser.png') }}" alt="profile"/>
                  </a>
                  <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div> -->
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="AgentDashboard">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
                           <!-- Dropdown Menu Item -->
<li class="nav-item">
  <a href="#" class="nav-link" onclick="toggleDropdown(event)">
    <i class="mdi mdi-cube-outline menu-icon"></i>
    <span class="menu-title">Users</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="submenu" style="display: none;">
    <ul>
      <li class="nav-item"><a class="nav-link" href="AgentUser">New User</a></li>
      <li class="nav-item"><a class="nav-link" href="a_reg">View User</a></li>
    </ul>
  </div>
</li>
              <li class="nav-item">
                  <a href="VisaApplicationDetails" class="nav-link">
                    <i class="mdi mdi-chart-areaspline menu-icon"></i>
                    <span class="menu-title">Application</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="wallet" class="nav-link">
                    <i class="mdi mdi-finance menu-icon"></i>
                    <span class="menu-title">Wallet</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="applicant" class="nav-link">
                    <i class="mdi mdi-grid menu-icon"></i>
                    <span class="menu-title">Applicant</span>
                    <i class="menu-arrow"></i>
</a>
            </ul>
        </div>
      </nav>
    </div>

    <script>
  function toggleDropdown(event) {
    event.preventDefault();
    const submenu = event.currentTarget.nextElementSibling;
    submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
  }
</script>
</body>
</html>