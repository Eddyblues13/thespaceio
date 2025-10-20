<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | AI Investment Platform</title>
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
            max-width: 500px;
            min-height: 600px;
        }

        .auth-header {
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            padding: 40px;
            text-align: center;
        }

        .auth-body {
            padding: 40px;
            background: var(--white-bg);
        }

        .auth-logo {
            font-size: 2rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .auth-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-text);
            text-align: center;
        }

        .auth-subtitle {
            font-size: 1rem;
            color: var(--medium-text);
            margin-bottom: 30px;
            text-align: center;
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

        .alert {
            border-radius: 8px;
            border: none;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--error-color);
            border-left: 4px solid var(--error-color);
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

        .password-strength {
            height: 5px;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 15px;
            background-color: #e9ecef;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }

        .strength-weak {
            background-color: #dc3545;
        }

        .strength-fair {
            background-color: #fd7e14;
        }

        .strength-good {
            background-color: #ffc107;
        }

        .strength-strong {
            background-color: #28a745;
        }

        @media (max-width: 576px) {
            .auth-container {
                max-width: 90%;
                margin: 20px;
            }

            .auth-header,
            .auth-body {
                padding: 30px 25px;
            }
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <!-- Header -->
        <div class="auth-header">
            <div class="auth-logo">
                <i class="fas fa-brain me-2"></i>TheSpace
            </div>
            <h3>Create New Password</h3>
            <p class="mb-0">Enter your new password below</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <h2 class="auth-title">Reset Password</h2>
            <p class="auth-subtitle">Create a new strong password for your account</p>

            <!-- Success/Error Messages -->
            @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" id="resetPasswordForm" class="needs-validation"
                novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ $email ?? old('email') }}" required readonly>
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
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Enter new password" required minlength="8">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                    <div class="invalid-feedback">
                        Password must be at least 8 characters long.
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="password-strength-bar"></div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 password-container">
                    <label for="password-confirm" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                        placeholder="Confirm new password" required>
                    <button type="button" class="password-toggle" id="togglePasswordConfirm">
                        <i class="fas fa-eye"></i>
                    </button>
                    <div class="invalid-feedback">
                        Passwords do not match.
                    </div>
                </div>

                <button type="submit" class="btn btn-auth">
                    <i class="fas fa-lock me-2"></i>Reset Password
                </button>

                <div class="auth-switch">
                    Remember your password? <a href="{{ route('login.page') }}" class="auth-link">Sign in</a>
                </div>
            </form>
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
            
            setupPasswordToggle('togglePassword', 'password');
            setupPasswordToggle('togglePasswordConfirm', 'password-confirm');
            
            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const strengthBar = document.getElementById('password-strength-bar');
            
            passwordInput.addEventListener('input', function() {
                const password = passwordInput.value;
                let strength = 0;
                
                // Length check
                if (password.length >= 8) strength += 25;
                
                // Lowercase check
                if (/[a-z]/.test(password)) strength += 25;
                
                // Uppercase check
                if (/[A-Z]/.test(password)) strength += 25;
                
                // Number/Special character check
                if (/[0-9]/.test(password) || /[^A-Za-z0-9]/.test(password)) strength += 25;
                
                // Update strength bar
                strengthBar.style.width = strength + '%';
                
                // Update color based on strength
                strengthBar.className = 'password-strength-bar';
                if (strength <= 25) {
                    strengthBar.classList.add('strength-weak');
                } else if (strength <= 50) {
                    strengthBar.classList.add('strength-fair');
                } else if (strength <= 75) {
                    strengthBar.classList.add('strength-good');
                } else {
                    strengthBar.classList.add('strength-strong');
                }
            });
            
            // Password confirmation validation
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password-confirm');
            
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
            const form = document.getElementById('resetPasswordForm');
            
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                    form.classList.add('was-validated');
                }
            });
            
            // Real-time validation
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
        });
    </script>
</body>

</html>