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
            --input-bg: #0f223a;
            --accent-color: #3a7bd5;
            --accent-hover: #2e6bb5;
            --text-color: #e8f5e9;
            --medium-text: #b0bec5;
            --success-color: #28a745;
            --error-color: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            background: var(--medium-bg);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 1100px;
            min-height: 700px;
            display: flex;
            position: relative;
        }

        .auth-left {
            flex: 1;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: var(--text-color);
            position: relative;
            overflow: hidden;
        }

        .auth-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(58, 123, 213, 0.1) 0%, transparent 70%);
        }

        .auth-right {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--medium-bg);
        }

        .auth-logo {
            font-size: 2.2rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 40px;
            display: flex;
            align-items: center;
        }

        .auth-logo i {
            margin-right: 12px;
            font-size: 2.4rem;
        }

        .auth-title {
            font-size: 2.4rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: var(--text-color);
            background: linear-gradient(90deg, var(--accent-color), var(--accent-hover));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .auth-subtitle {
            font-size: 1.1rem;
            color: var(--medium-text);
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 2px solid var(--light-bg);
            color: var(--text-color);
            padding: 14px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .form-control:focus {
            background-color: var(--input-bg);
            border-color: var(--accent-color);
            color: var(--text-color);
            box-shadow: 0 0 0 0.25rem rgba(58, 123, 213, 0.15);
        }

        .form-control::placeholder {
            color: var(--medium-text);
        }

        .form-label {
            color: var(--text-color);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .btn-auth {
            background: linear-gradient(90deg, var(--accent-color), var(--accent-hover));
            border: none;
            color: var(--text-color);
            font-weight: bold;
            padding: 16px 30px;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 10px;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(58, 123, 213, 0.3);
        }

        .btn-auth:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(58, 123, 213, 0.4);
            color: var(--text-color);
        }

        .auth-divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--light-bg);
        }

        .auth-divider-text {
            padding: 0 15px;
            color: var(--medium-text);
            font-size: 0.95rem;
        }

        .btn-social {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--input-bg);
            border: 2px solid var(--light-bg);
            color: var(--text-color);
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.3s;
            width: 100%;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .btn-social:hover {
            background: var(--light-bg);
            border-color: var(--accent-color);
            transform: translateY(-2px);
            color: var(--text-color);
        }

        .btn-social i {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .auth-switch {
            text-align: center;
            margin-top: 30px;
            color: var(--medium-text);
            font-size: 1rem;
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
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .auth-feature-icon {
            background: rgba(58, 123, 213, 0.15);
            color: var(--accent-color);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
            font-size: 1.4rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .auth-feature-text h4 {
            color: var(--text-color);
            margin-bottom: 8px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .auth-feature-text p {
            color: rgba(232, 245, 233, 0.85);
            font-size: 1rem;
            margin: 0;
            line-height: 1.6;
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .form-check-label {
            color: var(--text-color);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--medium-text);
            cursor: pointer;
            z-index: 10;
        }

        .password-container {
            position: relative;
        }

        /* Testimonial styling */
        .testimonial {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-top: 40px;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            font-size: 1.05rem;
            line-height: 1.6;
            color: var(--text-color);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent-color), var(--accent-hover));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .author-info strong {
            display: block;
            margin-bottom: 5px;
            color: var(--text-color);
        }

        .author-info p {
            margin: 0;
            font-size: 0.9rem;
            color: var(--medium-text);
        }

        /* Form validation styling */
        .is-valid {
            border-color: var(--success-color) !important;
        }

        .is-invalid {
            border-color: var(--error-color) !important;
        }

        .invalid-feedback {
            display: none;
            color: var(--error-color);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .was-validated .form-control:invalid~.invalid-feedback {
            display: block;
        }

        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        /* Alert styling */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--text-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--text-color);
            border-left: 4px solid var(--error-color);
        }

        /* Mobile-first responsive design */
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
                min-height: auto;
                margin: 10px;
                border-radius: 15px;
            }

            .auth-left,
            .auth-right {
                padding: 30px 25px;
            }

            .auth-left {
                order: 2;
            }

            .auth-right {
                order: 1;
            }

            .auth-logo {
                font-size: 1.8rem;
                margin-bottom: 25px;
            }

            .auth-title {
                font-size: 2rem;
            }

            .auth-feature {
                flex-direction: column;
                text-align: center;
                margin-bottom: 25px;
            }

            .auth-feature-icon {
                margin-right: 0;
                margin-bottom: 15px;
                align-self: center;
            }

            .testimonial {
                margin-top: 25px;
                padding: 20px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .auth-container {
                max-width: 95%;
                margin: 20px auto;
            }

            .auth-left,
            .auth-right {
                padding: 40px 35px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .auth-container {
                margin: 5px;
                border-radius: 12px;
            }

            .auth-left,
            .auth-right {
                padding: 25px 20px;
            }

            .auth-title {
                font-size: 1.8rem;
            }

            .auth-logo {
                font-size: 1.6rem;
            }

            .btn-auth,
            .btn-social {
                padding: 14px 20px;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Left Side - Branding & Features -->
        <div class="auth-left">
            <div class="auth-logo">
                <i class="fas fa-brain"></i>THE-SPACE
            </div>
            <h2 class="mb-4">Welcome Back to AI Investment</h2>
            <p class="mb-5">Continue your journey with cutting-edge AI technology to maximize your investment returns.
            </p>

            <div class="auth-features">
                <div class="auth-feature">
                    <div class="auth-feature-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="auth-feature-text">
                        <h4>Real-time Insights</h4>
                        <p>Access the latest AI-driven market analysis and investment opportunities.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <div class="auth-feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="auth-feature-text">
                        <h4>Portfolio Growth</h4>
                        <p>Track your investment performance with advanced analytics and reporting.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <div class="auth-feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="auth-feature-text">
                        <h4>Secure Access</h4>
                        <p>Your data and investments are protected with bank-level security.</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial -->
            <div class="testimonial">
                <p class="testimonial-text">"Since joining this platform, my portfolio has grown by 35%. The AI insights
                    are incredibly accurate and valuable."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">SM</div>
                    <div class="author-info">
                        <strong>Sarah Miller</strong>
                        <p>Investor since 2023</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Forms -->
        <div class="auth-right">
            <!-- Sign In Form -->
            <div class="auth-form" id="signin-form">
                <h2 class="auth-title">Welcome Back</h2>
                <p class="auth-subtitle">Sign in to access your AI-powered investment dashboard</p>

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
            
            setupPasswordToggle('toggleLoginPassword', 'login-password');
            
            // Form submission
            const form = document.getElementById('signinForm');
            
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                    form.classList.add('was-validated');
                }
            });
            
            // Real-time validation
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (input.checkValidity()) {
                        input.classList.add('is-valid');
                        input.classList.remove('is-invalid');
                    } else {
                        input.classList.add('is-invalid');
                        input.classList.remove('is-valid');
                    }
                });
            });

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>
</body>

</html>