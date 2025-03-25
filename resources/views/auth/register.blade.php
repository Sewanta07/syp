<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventory Management System - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="left-section">
                <h1>Inventory Management System</h1>

                Sign-Up Form
                <form id="signup-form" action="{{ route('register') }}" method="POST" >
                @csrf
                    <h2>SIGN UP</h2>
                    <div class="input-group">
                        <input type="text" id="signup-name" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="input-group">
                        <input type="email" id="signup-email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="signup-password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn" id="register-btn">Sign Up</button>
                    <p class="toggle-text">Already have an account? <a href="{{route('login')}}" id="toggle-login">Login</a></p>
                </form>
            </div>
            <div class="right-section">
                <img src="{{ asset('logo/Logo.png') }}" alt="Company Logo">
            </div>
        </div>
    </div>
    <!-- <script src="{{ asset('js/login.js') }}"></script> -->
    <!-- <script src="{{ asset('js/signup.js') }}"></script> -->
</body>
</html>