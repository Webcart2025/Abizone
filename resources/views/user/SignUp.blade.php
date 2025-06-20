<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="{{ asset('asset/css/SignUp.css') }}" />
</head>
<body>
    <div class="background-overlay"></div>
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
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

        <form class="registration-form" method="POST" action="{{ route('registerPost') }}">
            @csrf
            <div class="form-header">
                <div class="logo">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h1>USER REGISTRATION</h1>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Full Name" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="mobilenumber" id="mobile" placeholder="Mobile Number" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Create Password" required>
                </div>
            </div>

            <div class="terms-container">
                <label class="terms-checkbox">
                    <input type="checkbox" id="terms" required>
                    <span>I agree to the <a href="#" class="terms-link">Terms & Conditions</a> and <a href="#" class="terms-link">Privacy Policy</a></span>
                </label>
            </div>

            <button type="submit" class="signup-btn">
                <span>SIGN UP</span>
                <i class="fas fa-arrow-right"></i>
            </button>

            <div class="links">
                <p>Already have an account? <a href="{{ route('logins') }}" class="login-link">Login here</a></p>
                <!-- <p>Are you an agent? <a href="#" class="agent-link">Agent login</a></p> -->
            </div>
        </form>
    </div>
</body>
</html> 