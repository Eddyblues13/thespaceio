<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | AI Investment Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --dark-bg: #0a1929;
            --medium-bg: #1a2f4d;
            --light-bg: #2e4b6b;
            --accent-color: #3a7bd5;
            --accent-hover: #2e6bb5;
            --text-color: #e8f5e9;
            --white-bg: #ffffff;
            --light-gray: #f8f9fa;
            --dark-text: #333333;
            --medium-text: #6c757d;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-container {
            background: var(--white-bg);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            display: flex;
        }

        .auth-left {
            flex: 1;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: var(--text-color);
        }

        .auth-right {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white-bg);
        }

        .auth-logo {
            font-size: 2rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 30px;
        }

        .auth-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
        }

        .auth-subtitle {
            font-size: 1rem;
            color: var(--medium-text);
            margin-bottom: 30px;
        }

        .form-control {
            background-color: var(--light-gray);
            border: 1px solid #e1e5eb;
            color: var(--dark-text);
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background-color: var(--white-bg);
            border-color: var(--accent-color);
            color: var(--dark-text);
            box-shadow: 0 0 0 0.25rem rgba(58, 123, 213, 0.25);
        }

        .form-label {
            color: var(--dark-text);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .btn-auth {
            background: var(--accent-color);
            border: none;
            color: var(--white-bg);
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-auth:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .auth-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e1e5eb;
        }

        .auth-divider-text {
            padding: 0 15px;
            color: var(--medium-text);
            font-size: 0.9rem;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white-bg);
            border: 1px solid #e1e5eb;
            color: var(--dark-text);
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-social:hover {
            background: var(--light-gray);
            border-color: var(--accent-color);
        }

        .btn-social i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .auth-switch {
            text-align: center;
            margin-top: 30px;
            color: var(--medium-text);
        }

        .auth-link {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .auth-link:hover {
            color: var(--accent-hover);
            text-decoration: underline;
        }

        .auth-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .auth-feature-icon {
            background: rgba(58, 123, 213, 0.1);
            color: var(--accent-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .auth-feature-text h4 {
            color: var(--text-color);
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .auth-feature-text p {
            color: rgba(232, 245, 233, 0.8);
            font-size: 0.9rem;
            margin: 0;
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .form-check-label {
            color: var(--dark-text);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--medium-text);
            cursor: pointer;
        }

        .password-container {
            position: relative;
        }

        /* Form States */
        .auth-form {
            display: block;
        }

        #signup-form {
            display: none;
        }

        /* Phone input styling */
        .phone-input-group {
            display: flex;
        }

        .country-select {
            flex: 0 0 120px;
            margin-right: 10px;
        }

        .phone-input {
            flex: 1;
        }

        /* Optional field styling */
        .optional-label {
            color: var(--medium-text);
            font-weight: normal;
        }

        .optional-label::after {
            content: " (Optional)";
            font-weight: normal;
            color: var(--medium-text);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                max-width: 90%;
                margin: 20px;
            }

            .auth-left {
                padding: 30px;
            }

            .auth-right {
                padding: 30px;
            }

            .phone-input-group {
                flex-direction: column;
            }

            .country-select {
                flex: 1;
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Left Side - Branding & Features -->
        <div class="auth-left">
            <div class="auth-logo">
                <i class="fas fa-brain me-2"></i>THE-SPACE
            </div>
            <h2 class="mb-4">Join the AI Investment Revolution</h2>


            <!-- Right Side - Forms -->
            <div class="auth-right">
                <!-- Sign In Form -->
                <div class="auth-form" id="signin-form">
                    <h2 class="auth-title">Welcome Back</h2>
                    <p class="auth-subtitle">Sign in to your account to continue your investment journey</p>

                    <form id="signinForm">
                        <div class="mb-3">
                            <label for="signin-email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="signin-email" placeholder="Enter your email"
                                required>
                        </div>

                        <div class="mb-3 password-container">
                            <label for="signin-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signin-password"
                                placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" id="toggleSigninPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="auth-link">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-auth">Sign In</button>

                        <div class="auth-divider">
                            <span class="auth-divider-text">Or continue with</span>
                        </div>

                        <button type="button" class="btn btn-social">
                            <i class="fab fa-google"></i> Google
                        </button>

                        <button type="button" class="btn btn-social">
                            <i class="fab fa-apple"></i> Apple
                        </button>

                        <div class="auth-switch">
                            Don't have an account? <button type="submit" class="btn btn-auth"><a
                                    href="{{route('register')}}">Sign up</a></button>
                        </div>
                    </form>
                </div>


                <!-- Bootstrap JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
            // Form switching functionality
            const signinForm = document.getElementById('signin-form');
            const signupForm = document.getElementById('signup-form');
            const switchToSignup = document.getElementById('switch-to-signup');
            const switchToSignin = document.getElementById('switch-to-signin');
            
            switchToSignup.addEventListener('click', function(e) {
                e.preventDefault();
                signinForm.style.display = 'none';
                signupForm.style.display = 'block';
            });
            
            switchToSignin.addEventListener('click', function(e) {
                e.preventDefault();
                signupForm.style.display = 'none';
                signinForm.style.display = 'block';
            });
            
            // Password toggle functionality
            function setupPasswordToggle(toggleId, passwordId) {
                const toggle = document.getElementById(toggleId);
                const password = document.getElementById(passwordId);
                
                toggle.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    toggle.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
                });
            }
            
            setupPasswordToggle('toggleSigninPassword', 'signin-password');
            setupPasswordToggle('toggleSignupPassword', 'signup-password');
            setupPasswordToggle('toggleConfirmPassword', 'signup-confirm-password');
            
            // Phone number formatting
            const phoneInput = document.getElementById('signup-phone');
            phoneInput.addEventListener('input', function(e) {
                // Remove any non-digit characters
                let value = e.target.value.replace(/\D/g, '');
                
                // Format based on length
                if (value.length > 0) {
                    if (value.length <= 3) {
                        value = value;
                    } else if (value.length <= 6) {
                        value = value.replace(/(\d{3})(\d{0,3})/, '$1-$2');
                    } else {
                        value = value.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1-$2-$3');
                    }
                }
                
                e.target.value = value;
            });
            
            // Form submission
            document.getElementById('signinForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real application, you would handle authentication here
                alert('Sign in functionality would be implemented here!');
            });
            
            document.getElementById('signupForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const password = document.getElementById('signup-password').value;
                const confirmPassword = document.getElementById('signup-confirm-password').value;
                const countryCode = document.getElementById('country-code').value;
                const phoneNumber = document.getElementById('signup-phone').value;
                
                if (password !== confirmPassword) {
                    alert('Passwords do not match!');
                    return;
                }
                
                if (!countryCode) {
                    alert('Please select a country code!');
                    return;
                }
                
                if (!phoneNumber) {
                    alert('Please enter your phone number!');
                    return;
                }
                
                // In a real application, you would handle registration here
                const referralCode = document.getElementById('referral-code').value;
                const fullPhoneNumber = countryCode + ' ' + phoneNumber;
                
                alert(`Account creation would be implemented here!\n\nPhone: ${fullPhoneNumber}\nReferral Code: ${referralCode || 'None provided'}`);
            });
        });
                </script>
</body>

</html>