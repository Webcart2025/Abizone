<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}" />
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .role-selector {
            margin: 15px 0;
            text-align: center;
        }
        .role-selector label {
            margin: 0 10px;
            cursor: pointer;
        }
        .role-selector input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="registration-form" method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-header">
                <div class="logo">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h1>LOGIN</h1>
            </div>

            <!-- Hidden role field that can be set by JS if needed -->
            <input type="hidden" name="role" id="roleInput" value="user">

            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" style="cursor: pointer;"></i>
                </div>
            </div>

            <!-- <div class="form-group">
                <label class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Remember me</span>
                </label>
            </div> -->

            <button type="submit" class="signup-btn">
                <span>LOGIN</span>
                <i class="fas fa-arrow-right"></i>
            </button>

            <div class="links">
                <p>Don't have an account? <a href="{{ route('register') }}" class="login-link">Register here</a></p>
               
                
                <!-- Social login options -->
                <!-- <div class="social-login">
                    <p>Or login with:</p>
                    <a href="{{ route('google-auth') }}" class="social-btn google">
                        <i class="fab fa-google"></i> Google
                    </a>
                </div> -->
            </div>
        </form>
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // Set role if admin link was clicked
        // if(window.location.href.includes('admin/login')) {
        //     document.getElementById('roleInput').value = 'admin';
        // }
    </script>
</body>
</html>