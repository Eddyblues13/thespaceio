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
            --error-color: #dc3545;
            --success-color: #28a745;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
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

        /* Form validation styles */
        .is-invalid {
            border-color: var(--error-color) !important;
        }

        .is-valid {
            border-color: var(--success-color) !important;
        }

        .invalid-feedback {
            display: none;
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: -15px;
            margin-bottom: 15px;
        }

        .was-validated .form-control:invalid~.invalid-feedback {
            display: block;
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
        }

        /* Demo credentials box */
        .demo-credentials {
            background-color: rgba(58, 123, 213, 0.1);
            border-left: 4px solid var(--accent-color);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .demo-credentials h6 {
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        .demo-credentials p {
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: var(--dark-text);
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Left Side - Branding & Features -->
        <div class="auth-left">
            <div class="auth-logo">
                <i class="fas fa-brain me-2"></i>TheSpace
            </div>
            <h2 class="mb-4">Welcome Back to the AI Investment Revolution</h2>

            <div class="auth-feature">
                <div class="auth-feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="auth-feature-text">
                    <h4>Track Your Portfolio</h4>
                    <p>Monitor your investments with real-time AI-powered analytics.</p>
                </div>
            </div>

            <div class="auth-feature">
                <div class="auth-feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="auth-feature-text">
                    <h4>Smart Insights</h4>
                    <p>Get personalized investment recommendations based on market trends.</p>
                </div>
            </div>

            <div class="auth-feature">
                <div class="auth-feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="auth-feature-text">
                    <h4>Secure & Protected</h4>
                    <p>Your financial data is encrypted and protected with bank-level security.</p>
                </div>
            </div>
        </div>

        <!-- Right Side - Forms -->
        <div class="auth-right">
            <!-- Sign In Form -->
            <div class="auth-form" id="signin-form">
                <h2 class="auth-title">Sign In</h2>
                <p class="auth-subtitle">Welcome back! Please enter your details</p>

                <!-- Demo credentials for testing -->
                <div class="demo-credentials">
                    <h6><i class="fas fa-info-circle me-2"></i>Demo Credentials</h6>
                    <p><strong>Email:</strong> demo@thspace.io</p>
                    <p><strong>Password:</strong> demo1234</p>
                </div>

                <!-- Success/Error Messages -->
                @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i>{{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="signinForm" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="login-email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="login-email"
                            name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                        @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 password-container">
                        <label for="login-password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="login-password" name="password" placeholder="Enter your password" required>
                        <button type="button" class="password-toggle" id="toggleLoginPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="invalid-feedback">
                            Please provide your password.
                        </div>
                        @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-auth">Sign In</button>

                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}" class="auth-link">Forgot your password?</a>
                    </div>

                    <div class="auth-divider">
                        <span class="auth-divider-text">Or continue with</span>
                    </div>

                    <button type="button" class="btn btn-social">
                        <i class="fab fa-google"></i> Continue with Google
                    </button>

                    <button type="button" class="btn btn-social">
                        <i class="fab fa-apple"></i> Continue with Apple
                    </button>

                    <div class="auth-switch">
                        Don't have an account? <a href="{{ route('register') }}" class="auth-link">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
            
            // Form validation
            const form = document.getElementById('signinForm');
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Check form validity
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }
                
                // Get form values
                const email = document.getElementById('signin-email').value;
                const password = document.getElementById('signin-password').value;
                const rememberMe = document.getElementById('rememberMe').checked;
                
                // Demo authentication logic
                if (email === 'demo@thspace.io' && password === 'demo1234') {
                    // Successful login
                    alert('Login successful! Welcome back to TheSpace.');
                    
                    // In a real application, you would redirect to dashboard
                    // window.location.href = 'dashboard.html';
                } else {
                    // Failed login
                    alert('Invalid email or password. Please try again.\n\nHint: Use the demo credentials provided.');
                    
                    // Add error styling to inputs
                    document.getElementById('signin-email').classList.add('is-invalid');
                    document.getElementById('signin-password').classList.add('is-invalid');
                }
            });
            
            // Real-time validation for fields
            const inputs = form.querySelectorAll('input[required]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (input.checkValidity()) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                });
            });
            
            // Auto-fill demo credentials for testing
            document.getElementById('signin-email').addEventListener('focus', function() {
                if (this.value === '') {
                    this.value = 'demo@thspace.io';
                    this.classList.add('is-valid');
                }
            });
            
            document.getElementById('signin-password').addEventListener('focus', function() {
                if (this.value === '') {
                    this.value = 'demo1234';
                    this.classList.add('is-valid');
                }
            });
        });
    </script>
</body>

</html>