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

                <!-- Login Form -->
                <form  action="{{ route('login') }}" method="POST">
                    @csrf
                    <h2>LOGIN</h2>
                    <div class="input-group">
                        <input type="email" id="login-email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="input-group">
                        <input type="password" id="login-password" name="password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword('login-password')">👁</span>
                    </div>
                    <button type="submit" class="btn" id="submit-btnx">Login Now</button>
                    <p class="toggle-text">Don't have an account? <a href="{{route('register')}}" id="toggle-form">Sign Up</a></p>
                    <p class="forgot-password"><a href="{{ route('password.request') }}" id="forgot-password">Forgot Password?</a></p>
                </form>

                <!-- Sign-Up Form
                <form id="signup-form" action="{{ route('login') }}" method="POST" style="display: none;">
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
                        <span class="toggle-password" onclick="togglePassword('signup-password')">👁</span>
                    </div>
                    <button type="submit" class="btn" id="register-btn">Sign Up</button>
                    <p class="toggle-text">Already have an account? <a href="#" id="toggle-login">Login</a></p>
                </form> -->
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