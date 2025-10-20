<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | AI Investment Platform</title>
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
            min-height: 500px;
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

        .back-to-login {
            text-align: center;
            margin-top: 20px;
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
            <h3>Reset Your Password</h3>
            <p class="mb-0">Enter your email to receive a reset link</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <h2 class="auth-title">Forgot Password?</h2>
            <p class="auth-subtitle">No worries, we'll send you reset instructions</p>

            <!-- Success/Error Messages -->
            @if(session('status'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>{{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" id="forgotPasswordForm" class="needs-validation"
                novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
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

                <button type="submit" class="btn btn-auth">
                    <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                </button>

                <div class="back-to-login">
                    <a href="{{ route('login.page') }}" class="auth-link">
                        <i class="fas fa-arrow-left me-2"></i>Back to Login
                    </a>
                </div>

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
            const form = document.getElementById('forgotPasswordForm');
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Check form validity
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }
                
                // If form is valid, submit it
                form.submit();
            });
            
            // Real-time validation for email field
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('input', function() {
                if (emailInput.checkValidity()) {
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                } else {
                    emailInput.classList.remove('is-valid');
                    emailInput.classList.add('is-invalid');
                }
            });
        });
    </script>
</body>

</html>