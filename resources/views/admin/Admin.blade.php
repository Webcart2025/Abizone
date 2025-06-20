// File moved to: Abizone/resources/views/admin/Admin.blade.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/Login.css')}}">
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
    <div class="login-container">
        
        <div class="login-form-container">
            <form action="{{ route('admin.post') }}" method="POST">
                @csrf
            
                <div class="form-header">
                <div class="logo">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h1>ADMIN LOGIN</h1>
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
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
            <button type="submit" class="signup-btn">
                <span>LOGIN</span>
                <i class="fas fa-arrow-right"></i>
            </button>
            </form>

        </div>
    </div>
     
</body>
</html>