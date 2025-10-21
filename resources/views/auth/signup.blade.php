<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | AI Investment Platform</title>
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

        /* Phone input styling */
        .phone-input-group {
            display: flex;
        }

        .country-select {
            flex: 0 0 130px;
            margin-right: 12px;
            border-radius: 10px;
            background-color: var(--input-bg);
            border: 2px solid var(--light-bg);
            color: var(--text-color);
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
            font-size: 0.9rem;
        }

        .form-text {
            color: var(--medium-text);
            font-size: 0.9rem;
            margin-top: 5px;
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

            .phone-input-group {
                flex-direction: column;
            }

            .country-select {
                flex: 1;
                margin-right: 0;
                margin-bottom: 10px;
                width: 100%;
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
            <h2 class="mb-4">Join the AI Investment Revolution</h2>
            <p class="mb-5">Access cutting-edge AI technology to transform your investment strategy and maximize your
                returns.</p>

            <div class="auth-features">
                <div class="auth-feature">
                    <div class="auth-feature-icon">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="auth-feature-text">
                        <h4>AI-Powered Insights</h4>
                        <p>Leverage advanced machine learning algorithms for accurate market predictions and investment
                            opportunities.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <div class="auth-feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="auth-feature-text">
                        <h4>Portfolio Optimization</h4>
                        <p>Automatically optimize your investments based on real-time data and predictive analytics.</p>
                    </div>
                </div>

                <div class="auth-feature">
                    <div class="auth-feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="auth-feature-text">
                        <h4>Secure & Private</h4>
                        <p>Bank-level security with end-to-end encryption to protect your financial data and
                            investments.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Forms -->
        <div class="auth-right">
            <!-- Sign Up Form -->
            <div class="auth-form" id="signup-form">
                <h2 class="auth-title">Create Account</h2>
                <p class="auth-subtitle">Join thousands of investors using AI to grow their wealth</p>

                <form method="POST" action="{{ route('register') }}" id="signupForm" class="needs-validation"
                    novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="signup-firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="signup-firstname" name="first_name"
                                    placeholder="Enter your first name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid first name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="signup-lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="signup-lastname" name="last_name"
                                    placeholder="Enter your last name" required>
                                <div class="invalid-feedback">
                                    Please provide a valid last name.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="signup-email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="signup-email" name="email"
                            placeholder="Enter your email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                    </div>

                    <!-- Phone Number with Country Code -->
                    <div class="mb-3">
                        <label for="signup-phone" class="form-label">Phone Number</label>
                        <div class="phone-input-group">
                            <select class="form-control country-select" id="country-code" name="country_code" required>
                                <option value="" disabled selected>Code</option>
                                <option value="+1">+1 (USA)</option>
                                <option value="+44">+44 (UK)</option>
                                <option value="+61">+61 (AUS)</option>
                                <option value="+49">+49 (GER)</option>
                                <option value="+33">+33 (FRA)</option>
                                <option value="+81">+81 (JPN)</option>
                                <option value="+86">+86 (CHN)</option>
                                <option value="+91">+91 (IND)</option>
                            </select>
                            <input type="tel" class="form-control phone-input" id="signup-phone" name="phone"
                                placeholder="Enter your phone number" required>
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid phone number.
                        </div>
                    </div>

                    <div class="mb-3 password-container">
                        <label for="signup-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signup-password" name="password"
                            placeholder="Create a password" required minlength="8">
                        <button type="button" class="password-toggle" id="toggleSignupPassword">
                            <br><br>
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="invalid-feedback">
                            Password must be at least 8 characters long.
                        </div>
                    </div>

                    <div class="mb-3 password-container">
                        <label for="signup-confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signup-confirm-password"
                            name="password_confirmation" placeholder="Confirm your password" required>
                        <button type="button" class="password-toggle" id="toggleConfirmPassword">
                            <br><br>
                            <i class="fas fa-eye"></i>
                        </button>
                        <div class="invalid-feedback">
                            Passwords do not match.
                        </div>
                    </div>

                    <!-- Referral Code (Optional) -->
                    <div class="mb-4">
                        <label for="referral-code" class="form-label optional-label">Referral Code</label>
                        <input type="text" class="form-control" id="referral-code" name="referral_code"
                            placeholder="Enter referral code (if any)">
                        <div class="form-text">If you were referred by someone, enter their code here</div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="agreeTerms" name="agree_terms" required>
                            <label class="form-check-label" for="agreeTerms">
                                I agree to the <a href="#" class="auth-link">Terms of Service</a> and <a href="#"
                                    class="auth-link">Privacy Policy</a>
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-auth">Create Account</button>



                    <div class="auth-switch">
                        Already have an account? <a href="{{ route('login') }}" class="auth-link">Sign in</a>
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
            
            // Password confirmation validation
            const password = document.getElementById('signup-password');
            const confirmPassword = document.getElementById('signup-confirm-password');
            
            function validatePassword() {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords do not match");
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }
            
            password.addEventListener('change', validatePassword);
            confirmPassword.addEventListener('keyup', validatePassword);
            
            // Form submission
            const form = document.getElementById('signupForm');
            
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
        });
    </script>
</body>

</html>