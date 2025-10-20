<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AI Investment Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --dark-bg: #0a1929;
            --medium-bg: #1a2f4d;
            --accent-color: #3a7bd5;
            --accent-hover: #2e6bb5;
            --text-color: #e8f5e9;
            --white-bg: #ffffff;
            --dark-text: #333333;
            --medium-text: #6c757d;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .email-container {
            background: var(--white-bg);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
        }

        .email-header {
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            padding: 40px 30px;
            text-align: center;
        }

        .email-logo {
            font-size: 2rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        .email-body {
            padding: 40px 30px;
            background: var(--white-bg);
            text-align: center;
        }

        .email-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 15px;
        }

        .email-subtitle {
            font-size: 1rem;
            color: var(--medium-text);
            margin-bottom: 25px;
        }

        .btn-primary {
            background: var(--accent-color);
            color: var(--white-bg);
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: var(--accent-hover);
        }

        .email-footer {
            background-color: var(--light-bg);
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--medium-text);
        }

        .social-icons a {
            color: var(--accent-color);
            margin: 0 8px;
            text-decoration: none;
            font-size: 1.2rem;
        }

        @media (max-width: 576px) {
            .email-container {
                max-width: 90%;
                margin: 20px;
            }

            .email-header,
            .email-body {
                padding: 25px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="email-logo">
                <i class="fas fa-brain me-2"></i>AI Investment Platform
            </div>
            <h3>Welcome, {{ $user->first_name }}!</h3>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h2 class="email-title">Your Investment Journey Begins Now 🚀</h2>
            <p class="email-subtitle">
                Thank you for joining <strong>AI Investment Platform</strong> — a smarter way to grow your wealth using
                AI-driven investment solutions.
            </p>

            <p style="color: #555; font-size: 1rem;">
                You can now access your dashboard, explore investment plans, and monitor your portfolio in real-time.
            </p>

            <div style="margin: 30px 0;">
                <a href="{{ route('dashboard') }}" class="btn-primary">
                    Go to Your Dashboard
                </a>
            </div>

            <p style="color: #6c757d; font-size: 0.95rem;">
                If you didn’t sign up for an AI Investment Platform account, please ignore this email.
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p class="mt-2">&copy; {{ date('Y') }} AI Investment Platform. All rights reserved.</p>
        </div>
    </div>
</body>

</html>