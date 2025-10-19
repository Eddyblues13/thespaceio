<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Investment Platform - KYC Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        :root {
            --dark-bg: #0a1929;
            --medium-bg: #1a2f4d;
            --light-bg: #2e4b6b;
            --accent-color: #3a7bd5;
            --text-color: #e8f5e9;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* KYC Modal Overlay */
        #kyc-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 25, 41, 0.95);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
            padding: 20px;
            box-sizing: border-box;
        }

        .kyc-modal {
            background: rgba(26, 47, 77, 0.95);
            border-radius: 15px;
            padding: 25px;
            max-width: 480px;
            width: 100%;
            max-height: 90vh;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
            border: 2px solid var(--accent-color);
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .kyc-header {
            margin-bottom: 20px;
            flex-shrink: 0;
        }

        .kyc-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 10px;
        }

        .kyc-title {
            font-size: 1.8rem;
            color: var(--accent-color);
            margin-bottom: 8px;
        }

        .kyc-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .kyc-content {
            flex: 1;
            overflow-y: auto;
            padding-right: 5px;
            margin-bottom: 15px;
        }

        /* Custom scrollbar */
        .kyc-content::-webkit-scrollbar {
            width: 6px;
        }

        .kyc-content::-webkit-scrollbar-track {
            background: rgba(10, 25, 41, 0.5);
            border-radius: 10px;
        }

        .kyc-content::-webkit-scrollbar-thumb {
            background: var(--accent-color);
            border-radius: 10px;
        }

        .kyc-form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.95rem;
        }

        .form-control {
            background: rgba(10, 25, 41, 0.7);
            border: 1px solid rgba(58, 123, 213, 0.3);
            color: var(--text-color);
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: rgba(10, 25, 41, 0.9);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
            color: var(--text-color);
        }

        .form-control::placeholder {
            color: rgba(232, 245, 233, 0.6);
        }

        .captcha-container {
            background: rgba(10, 25, 41, 0.7);
            border-radius: 6px;
            padding: 15px;
            margin: 15px 0;
            border: 1px solid rgba(58, 123, 213, 0.3);
        }

        .captcha-text {
            font-family: 'Courier New', monospace;
            font-size: 1.3rem;
            font-weight: bold;
            letter-spacing: 2px;
            background: linear-gradient(45deg, var(--accent-color), #5dade2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
            user-select: none;
        }

        .captcha-input {
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-kyc {
            background: var(--accent-color);
            color: var(--dark-bg);
            border: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.3s;
            width: 100%;
            margin-top: 5px;
            font-size: 0.95rem;
        }

        .btn-kyc:hover {
            background: #5dade2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-enter {
            background: linear-gradient(45deg, var(--accent-color), #5dade2);
            color: var(--dark-bg);
            border: none;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            transition: all 0.3s;
            font-size: 1.1rem;
            margin-top: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
        }

        .btn-enter:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .btn-enter:disabled {
            background: rgba(58, 123, 213, 0.5);
            transform: none;
            box-shadow: none;
            cursor: not-allowed;
        }

        .kyc-footer {
            margin-top: 15px;
            font-size: 0.85rem;
            opacity: 0.8;
            flex-shrink: 0;
        }

        .kyc-footer a {
            color: var(--accent-color);
            text-decoration: none;
        }

        .kyc-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.85rem;
            margin-top: 4px;
            display: none;
        }

        .success-message {
            color: var(--accent-color);
            font-size: 0.95rem;
            margin-top: 8px;
            display: none;
        }

        /* Homepage Content - Initially Hidden */
        #homepage-content {
            display: none;
        }

        /* Responsive adjustments for KYC modal */
        @media (max-width: 768px) {
            .kyc-modal {
                padding: 20px;
                max-height: 85vh;
                margin: 10px;
            }

            .kyc-title {
                font-size: 1.6rem;
            }

            .kyc-icon {
                font-size: 2.5rem;
            }

            .kyc-subtitle {
                font-size: 0.9rem;
            }

            .form-control {
                padding: 12px 15px;
                font-size: 16px;
                /* Prevents zoom on iOS */
            }

            .captcha-text {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 576px) {
            .kyc-modal {
                padding: 15px;
                max-height: 90vh;
            }

            .kyc-title {
                font-size: 1.4rem;
            }

            .kyc-icon {
                font-size: 2rem;
            }

            .form-group {
                margin-bottom: 12px;
            }

            .btn-kyc,
            .btn-enter {
                padding: 12px 20px;
                font-size: 1rem;
            }
        }

        @media (max-height: 700px) {
            .kyc-modal {
                max-height: 95vh;
            }

            .kyc-header {
                margin-bottom: 15px;
            }

            .form-group {
                margin-bottom: 12px;
            }
        }

        /* Floating code numbers background */
        #code-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }

        .code-number {
            position: absolute;
            color: var(--accent-color);
            font-family: monospace;
            font-size: 14px;
            opacity: 0;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.7;
            }

            90% {
                opacity: 0.7;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Navigation */
        .navbar {
            background-color: rgba(10, 25, 41, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--accent-color);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--accent-color) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
        }

        /* Dropdown Menu Fix */
        .navbar-nav .dropdown-menu {
            background: rgba(26, 47, 77, 0.95);
            border: 1px solid var(--accent-color);
            backdrop-filter: blur(10px);
        }

        .navbar-nav .dropdown-item {
            color: var(--text-color);
            transition: all 0.3s;
        }

        .navbar-nav .dropdown-item:hover {
            background: var(--accent-color);
            color: var(--dark-bg);
        }

        .dropdown-divider {
            border-color: rgba(58, 123, 213, 0.3);
        }

        /* Hero Section */
        .hero-section {
            padding: 150px 0 100px;
            background: linear-gradient(135deg, var(--dark-bg) 0%, var(--medium-bg) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, var(--accent-color), #5dade2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Investment Tiers Section */
        .investment-section {
            padding: 80px 0;
            background: rgba(26, 47, 77, 0.3);
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Investment Tier Cards */
        .tier-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .tier-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-color);
        }

        .tier-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent-color);
            color: var(--dark-bg);
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .tier-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 20px;
        }

        .tier-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--accent-color);
        }

        .tier-range {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--text-color);
        }

        .tier-features {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
        }

        .tier-features li {
            padding: 8px 0;
            border-bottom: 1px solid rgba(58, 123, 213, 0.2);
        }

        .tier-features li:last-child {
            border-bottom: none;
        }

        .tier-features li i {
            color: var(--accent-color);
            margin-right: 10px;
        }

        .btn-tier {
            background: var(--accent-color);
            color: var(--dark-bg);
            border: none;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-tier:hover {
            background: #5dade2;
            transform: translateY(-2px);
        }

        /* 3D Container */
        #ai-model-container {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .ai-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 5rem;
            font-weight: 900;
            color: rgba(58, 123, 213, 0.7);
            text-shadow: 0 0 20px rgba(93, 173, 226, 0.5);
            z-index: 10;
            pointer-events: none;
        }

        /* Company Cards */
        .company-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .company-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-color);
        }

        .company-logo {
            height: 60px;
            margin-bottom: 15px;
            object-fit: contain;
            max-width: 100%;
        }

        .stock-widget {
            background: rgba(10, 25, 41, 0.8);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-color);
        }

        .stock-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .stock-change {
            font-size: 0.9rem;
        }

        .positive {
            color: #5dade2;
        }

        .negative {
            color: #ff4d4d;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }

        .section-header::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            margin: 0 auto;
            margin-top: 15px;
        }

        /* Stock Charts Section */
        .stock-charts-section {
            padding: 80px 0;
            background: rgba(26, 47, 77, 0.3);
        }

        .chart-container {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .chart-title {
            color: var(--accent-color);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        /* Major Stocks Section */
        .major-stocks-section {
            padding: 80px 0;
        }

        .stock-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            transition: transform 0.3s;
        }

        .stock-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
        }

        .stock-symbol {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--accent-color);
        }

        .stock-name {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Footer */
        footer {
            background-color: rgba(10, 25, 41, 0.9);
            padding: 50px 0 20px;
            margin-top: 50px;
            border-top: 1px solid var(--accent-color);
        }

        .footer-heading {
            color: var(--accent-color);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Startup Cards */
        .startup-card {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(58, 123, 213, 0.3);
            height: 100%;
        }

        .startup-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            border-color: var(--accent-color);
        }

        .startup-logo {
            height: 60px;
            margin-bottom: 15px;
            object-fit: contain;
            max-width: 100%;
        }

        .valuation-widget {
            background: rgba(10, 25, 41, 0.8);
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid var(--accent-color);
        }

        .valuation-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        /* Minor Companies Widget */
        .minor-companies-widget {
            background: rgba(26, 47, 77, 0.7);
            border-radius: 10px;
            padding: 30px;
            margin-top: 30px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .minor-company-logo {
            height: 40px;
            margin: 10px;
            object-fit: contain;
            opacity: 0.8;
            transition: opacity 0.3s, transform 0.3s;
        }

        .minor-company-logo:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        /* Enhanced Companies Carousel */
        .companies-carousel-container {
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        .companies-carousel {
            display: flex;
            transition: transform 0.5s ease;
            gap: 20px;
        }

        .company-logo-item {
            flex: 0 0 auto;
            width: 120px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(10, 25, 41, 0.6);
            border-radius: 8px;
            padding: 10px;
            border: 1px solid rgba(58, 123, 213, 0.3);
            transition: all 0.3s ease;
        }

        .company-logo-item:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .company-logo-item img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(10, 25, 41, 0.8);
            border: 1px solid var(--accent-color);
            color: var(--accent-color);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .carousel-control:hover {
            background: var(--accent-color);
            color: var(--dark-bg);
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        .carousel-dots {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(58, 123, 213, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .carousel-dot.active {
            background: var(--accent-color);
            transform: scale(1.2);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
                
            }

            #ai-model-container {
                height: 300px;
            }

            .ai-text {
                font-size: 3rem;
            }

            .minor-company-logo {
                height: 30px;
                margin: 5px;
            }

            .company-logo-item {
                width: 100px;
                height: 70px;
            }

            .carousel-control {
                width: 35px;
                height: 35px;
            }
        }
    </style>
</head>

<body>
    <!-- KYC Verification Modal -->
    <div id="kyc-overlay">
        <div class="kyc-modal">
            <div class="kyc-header">
                <div class="kyc-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2 class="kyc-title">Identity Verification</h2>
                <p class="kyc-subtitle">Please complete this quick verification to access our AI Investment Platform</p>
            </div>

            <div class="kyc-content">
                <form id="kyc-form" class="kyc-form">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name"
                            required>
                        <div class="error-message" id="nameError">Please enter your full name</div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="form-label">Country of Residence</label>
                        <select class="form-control" id="country" required>
                            <option value="" disabled selected>Select your country</option>
                            <option value="US">United States</option>
                            <option value="UK">United Kingdom</option>
                            <option value="CA">Canada</option>
                            <option value="AU">Australia</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                            <option value="JP">Japan</option>
                            <option value="SG">Singapore</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="error-message" id="countryError">Please select your country</div>
                    </div>

                    <div class="captcha-container">
                        <p class="form-label">Human Verification</p>
                        <div class="captcha-text" id="captchaText">A1B2C3</div>
                        <input type="text" class="form-control captcha-input" id="captchaInput"
                            placeholder="Enter the code above" maxlength="6" required>
                        <div class="error-message" id="captchaError">Incorrect verification code</div>
                        <button type="button" class="btn btn-outline-light btn-sm mt-2" id="refreshCaptcha">
                            <i class="fas fa-redo-alt me-1"></i> Refresh Code
                        </button>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">
                            I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#"
                                target="_blank">Privacy Policy</a>
                        </label>
                        <div class="error-message" id="termsError">You must agree to the terms</div>
                    </div>

                    <button type="submit" class="btn btn-kyc" id="verifyBtn">
                        <i class="fas fa-check-circle me-2"></i> Verify Identity
                    </button>

                    <div class="success-message" id="successMessage">
                        <i class="fas fa-check-circle me-2"></i> Verification successful!
                    </div>
                </form>

                <!-- Enter Button -->
                <div id="enter-section" style="display: none;">
                    <div class="mt-3 pt-3 border-top border-secondary">
                        <p class="mb-3">You are now verified. Click the button below to enter the platform:</p>
                        <button class="btn btn-enter" id="enterBtn">
                            <i class="fas fa-arrow-right me-2"></i> Enter AI Investment Platform
                        </button>
                    </div>
                </div>
            </div>

            <div class="kyc-footer">
                <p>This verification helps us maintain a secure environment for all investors.</p>
            </div>
        </div>
    </div>

    <!-- Main Content (Initially Hidden) -->
    <div id="homepage-content">
        <!-- Floating Code Background -->
        <div id="code-background"></div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index">
                    <i class="fas fa-brain me-2"></i>TheSpace
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="companiesDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Companies
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="companiesDropdown">
                                <li><a class="dropdown-item" href="nvidia">Nvidia</a></li>
                                <li><a class="dropdown-item" href="openai">OpenAI</a></li>
                                <li><a class="dropdown-item" href="tesla">Tesla</a></li>
                                <li><a class="dropdown-item" href="oracle">Oracle</a></li>
                                <li><a class="dropdown-item" href="google">Google</a></li>
                                <li><a class="dropdown-item" href="facebook">Facebook</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="anthropic">Anthropic</a></li>
                                <li><a class="dropdown-item" href="stability">Stability AI</a></li>
                                <li><a class="dropdown-item" href="cohere">Cohere</a></li>
                                <li><a class="dropdown-item" href="huggingface">Hugging Face</a></li>
                                <li><a class="dropdown-item" href="scale">Scale AI</a></li>
                                <li><a class="dropdown-item" href="runway.html">Runway AI</a></li>
                                <li><a class="dropdown-item" href="character">Character.AI</a></li>
                                <li><a class="dropdown-item" href="inflection">Inflection AI</a></li>
                                <li><a class="dropdown-item" href="mistral">Mistral AI</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="investment">Investment Tiers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insurance">Insurance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="etf&funds">Etf&Funds</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="hero-title">THE SPACE AI REVOLUTION</h1>
                        <p class="hero-subtitle">Where all Ai assets are united, this is the future and we bring the
                            future to you</p>
                        <div class="mt-4">
                            <a href="#companies" class="btn btn-primary btn-lg me-3">Explore Companies</a>
                            <br><br>
                            <a href="{{route('login')}}" class="btn btn-outline-light btn-lg">Create Account</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="ai-model-container">
                            <div class="ai-text">AI</div>
                            <!-- 3D AI Model will be rendered here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Companies Section -->
        <section id="companies" class="py-5">
            <div class="container">
                <div class="section-header">
                    <h2>Featured Companies</h2>
                    <p>Explore our AI-driven analysis of top tech companies</p>
                </div>

                <div class="row">
                    <!-- Nvidia Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="img/nvidia.png" alt="Nvidia" class="company-logo">
                            <h4>Nvidia</h4>
                            <p>Leading semiconductor company powering the AI revolution with GPUs and AI computing
                                platforms.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$950.02</div>
                                <div class="stock-change positive">+5.12% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="nvidia" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- OpenAI Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/OpenAI_Logo.svg/1200px-OpenAI_Logo.svg.png"
                                alt="OpenAI" class="company-logo">
                            <h4>OpenAI</h4>
                            <p>Creator of ChatGPT and leading AI research company focused on developing safe artificial
                                general intelligence.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$86B</div>
                                <div class="stock-change positive">Microsoft Backed <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="openai" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Tesla Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Tesla_T_symbol.svg/1200px-Tesla_T_symbol.svg.png"
                                alt="Tesla" class="company-logo">
                            <h4>Tesla Inc.</h4>
                            <p>Revolutionizing sustainable energy and transportation with cutting-edge AI and
                                automation.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$245.78</div>
                                <div class="stock-change positive">+2.34% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="tesla" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Oracle Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://logos-world.net/wp-content/uploads/2020/09/Oracle-Logo.png" alt="Oracle"
                                class="company-logo" style="filter: brightness(0) invert(1);">
                            <h4>Oracle Corp.</h4>
                            <p>Leading provider of enterprise cloud computing and database solutions powered by AI.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$118.42</div>
                                <div class="stock-change positive">+1.27% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="oracle" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>
                </div>

                <!-- Second Row of Featured Companies -->
                <div class="row mt-4">
                    <!-- Google Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png"
                                alt="Google" class="company-logo">
                            <h4>Alphabet (Google)</h4>
                            <p>Global technology leader in search, AI research, cloud computing, and digital
                                advertising.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$142.65</div>
                                <div class="stock-change negative">-0.85% <i class="fas fa-arrow-down"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="google" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Facebook Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1200px-Facebook_f_logo_%282019%29.svg.png"
                                alt="Facebook" class="company-logo">
                            <h4>Meta (Facebook)</h4>
                            <p>Pioneering social connectivity and building the next evolution of digital interaction.
                            </p>

                            <div class="stock-widget">
                                <div class="stock-price">$318.25</div>
                                <div class="stock-change positive">+3.12% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="facebook" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Microsoft Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/1200px-Microsoft_logo.svg.png"
                                alt="Microsoft" class="company-logo">
                            <h4>Microsoft</h4>
                            <p>Leading provider of cloud services, enterprise software, and AI solutions through Azure
                                and Copilot.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$378.85</div>
                                <div class="stock-change positive">+0.89% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="microsoft" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Apple Card -->
                    <div class="col-md-6 col-lg-3">
                        <div class="company-card">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png"
                                alt="Apple" class="company-logo">
                            <h4>Apple Inc.</h4>
                            <p>Integrating AI across its ecosystem with Siri, Core ML, and on-device machine learning
                                capabilities.</p>

                            <div class="stock-widget">
                                <div class="stock-price">$189.25</div>
                                <div class="stock-change positive">+1.24% <i class="fas fa-arrow-up"></i></div>
                                <small>Last updated: 10:15 AM EST</small>
                            </div>

                            <a href="apple" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- AI Startups Section -->
        <section class="py-5" style="background: rgba(26, 47, 77, 0.3);">
            <div class="container">
                <div class="section-header">
                    <h2>AI Startups (High Growth Potential)</h2>
                    <p>Rapidly growing private companies at the forefront of AI innovation</p>
                </div>

                <div class="row">
                    <!-- Anthropic Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/anthropic.png" alt="Anthropic" class="startup-logo">
                            <h4>Anthropic</h4>
                            <p>Safety-focused AI company developing Claude chatbot and constitutional AI to ensure
                                beneficial outcomes.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$18.4B</div>
                                <div class="stock-change positive">Amazon Backed <i class="fas fa-arrow-up"></i></div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="anthropic" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Stability AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/stability.jpeg" alt="Stability AI" class="startup-logo">
                            <h4>Stability AI</h4>
                            <p>Creator of Stable Diffusion, leading open-source AI image generation and multimodal AI
                                models.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$1B</div>
                                <div class="stock-change positive">Open Source Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="stability" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Cohere Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/cohere.jpeg" alt="Cohere" class="startup-logo">
                            <h4>Cohere</h4>
                            <p>Enterprise-focused AI company providing natural language models for businesses to build
                                AI applications.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$2.2B</div>
                                <div class="stock-change positive">Enterprise Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="cohere" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Hugging Face Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="https://huggingface.co/front/assets/huggingface_logo-noborder.svg"
                                alt="Hugging Face" class="startup-logo">
                            <h4>Hugging Face</h4>
                            <p>Open-source AI community and platform hosting thousands of models, datasets, and AI
                                applications.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$4.5B</div>
                                <div class="stock-change positive">Community Driven <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="huggingface" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Scale AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/scale.jpeg" alt="Scale AI" class="startup-logo">
                            <h4>Scale AI</h4>
                            <p>Data labeling and infrastructure platform for AI training, working with companies like
                                OpenAI and Microsoft.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$7.3B</div>
                                <div class="stock-change positive">Infrastructure Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="scale" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Runway AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/runway.png" alt="Runway AI" class="startup-logo">
                            <h4>Runway AI</h4>
                            <p>AI video and image editing tools used by creative professionals and Hollywood studios for
                                content creation.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$1.5B</div>
                                <div class="stock-change positive">Creative Focus <i class="fas fa-arrow-up"></i></div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="runway.html" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Character.AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/character.jpeg" alt="Character.AI" class="startup-logo">
                            <h4>Character.AI</h4>
                            <p>Interactive chatbot platform with AI personalities for entertainment, education, and
                                social interaction.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$1B</div>
                                <div class="stock-change positive">Entertainment Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="character" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Inflection AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/inflection.jpeg" alt="Inflection AI" class="startup-logo">
                            <h4>Inflection AI</h4>
                            <p>Developing personal AI assistants to help people accomplish tasks and access information
                                more effectively.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$4B</div>
                                <div class="stock-change positive">Personal AI Focus <i class="fas fa-arrow-up"></i>
                                </div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="inflection" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>

                    <!-- Mistral AI Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="startup-card">
                            <img src="img/mistral.png" alt="Mistral AI" class="startup-logo">
                            <h4>Mistral AI</h4>
                            <p>European open-source AI company developing efficient language models with strong
                                performance.</p>

                            <div class="valuation-widget">
                                <div class="valuation-price">$2B</div>
                                <div class="stock-change positive">European Focus <i class="fas fa-arrow-up"></i></div>
                                <small>Latest Valuation</small>
                            </div>

                            <a href="mistral" class="btn btn-outline-light mt-3">View Analysis</a>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Companies Carousel -->
                <div class="minor-companies-widget">
                    <div class="section-header">
                        <h3>Other Companies Using AI</h3>
                        <p>Additional established companies integrating AI into their products and services</p>
                    </div>

                    <div class="companies-carousel-container">
                        <div class="carousel-control prev">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="companies-carousel" id="companiesCarousel">
                            <!-- Company logos will be added here by JavaScript -->
                        </div>
                        <div class="carousel-control next">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="carousel-dots" id="carouselDots">
                            <!-- Dots will be added here by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Major Stocks Widgets Section -->
        <section class="major-stocks-section">
            <div class="container">
                <div class="section-header">
                    <h2>Major Stock Markets</h2>
                    <p>Real-time performance of global markets and major companies</p>
                </div>

                <div class="row">
                    <!-- US Market Indices -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="mb-3" style="color: var(--accent-color);">US Market Indices</h4>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">S&P 500</div>
                                    <div class="stock-name">S&P 500 Index</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">4,567.25</div>
                                    <div class="stock-change positive">+0.68% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">DOW</div>
                                    <div class="stock-name">Dow Jones Industrial</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">35,654.29</div>
                                    <div class="stock-change positive">+0.42% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">NASDAQ</div>
                                    <div class="stock-name">NASDAQ Composite</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">14,316.66</div>
                                    <div class="stock-change negative">-0.12% <i class="fas fa-arrow-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stocks -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="mb-3" style="color: var(--accent-color);">Major Tech Stocks</h4>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">AAPL</div>
                                    <div class="stock-name">Apple Inc.</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">$189.25</div>
                                    <div class="stock-change positive">+1.24% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">MSFT</div>
                                    <div class="stock-name">Microsoft Corp.</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">$378.85</div>
                                    <div class="stock-change positive">+0.89% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">AMZN</div>
                                    <div class="stock-name">Amazon.com Inc.</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">$145.62</div>
                                    <div class="stock-change negative">-0.35% <i class="fas fa-arrow-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Global Markets -->
                    <div class="col-lg-4 mb-4">
                        <h4 class="mb-3" style="color: var(--accent-color);">Global Markets</h4>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">FTSE</div>
                                    <div class="stock-name">FTSE 100 (UK)</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">7,654.32</div>
                                    <div class="stock-change positive">+0.56% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">DAX</div>
                                    <div class="stock-name">DAX (Germany)</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">15,987.21</div>
                                    <div class="stock-change positive">+0.78% <i class="fas fa-arrow-up"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="stock-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="stock-symbol">NIKKEI</div>
                                    <div class="stock-name">Nikkei 225 (Japan)</div>
                                </div>
                                <div class="text-end">
                                    <div class="stock-price">33,245.67</div>
                                    <div class="stock-change negative">-0.23% <i class="fas fa-arrow-down"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stock Charts Section -->
        <section class="stock-charts-section">
            <div class="container">
                <div class="section-header">
                    <h2>Market Performance Charts</h2>
                    <p>AI-powered analysis of market trends and performance</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">S&P 500 Performance (6 Months)</h4>
                            <canvas id="sp500Chart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">NASDAQ Composite (6 Months)</h4>
                            <canvas id="nasdaqChart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">Tech Sector Performance</h4>
                            <canvas id="techSectorChart"></canvas>
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="chart-container">
                            <h4 class="chart-title">Global Markets Comparison</h4>
                            <canvas id="globalMarketsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <h4 class="footer-heading">AI Investment Platform</h4>
                        <p>Providing cutting-edge AI analysis for investment decisions in the rapidly evolving
                            technology sector.</p>
                        <div class="mt-3">
                            <a href="#" class="text-light me-3"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-light me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                            <a href="#" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <h4 class="footer-heading">Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="index" class="text-light">Home</a></li>
                            <li><a href="about" class="text-light">About Us</a></li>
                            <li><a href="contact" class="text-light">Contact</a></li>
                            <li><a href="faq" class="text-light">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <h4 class="footer-heading">Companies</h4>
                        <ul class="list-unstyled">
                            <li><a href="nvidia" class="text-light">Nvidia</a></li>
                            <li><a href="openai" class="text-light">OpenAI</a></li>
                            <li><a href="tesla" class="text-light">Tesla</a></li>
                            <li><a href="google" class="text-light">Google</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <h4 class="footer-heading">Contact Info</h4>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-map-marker-alt me-2"></i> 123 AI Street, TechCity, Qatar.</li>
                            <li><i class="fas fa-phone me-2"></i> +971-3335-5678</li>
                            <li><i class="fas fa-envelope me-2"></i> info@thespace.com</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center pt-3 border-top border-secondary">
                    <p>&copy; 1995 AI Investment Platform. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // KYC Verification Logic with First Visit Detection
        document.addEventListener('DOMContentLoaded', function() {
            // Check if this is the user's first visit to the homepage
            const isFirstHomepageVisit = !localStorage.getItem('homepageVisited');
            
            if (isFirstHomepageVisit) {
                // Show KYC overlay only on first homepage visit
                document.getElementById('kyc-overlay').style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Mark homepage as visited
                localStorage.setItem('homepageVisited', 'true');
            } else {
                // User has visited before, show homepage directly
                document.getElementById('kyc-overlay').style.display = 'none';
                document.getElementById('homepage-content').style.display = 'block';
                document.body.style.overflow = 'auto';
                
                // Initialize homepage features
                initCodeBackground();
                init3DScene();
                initCharts();
                initCompaniesCarousel();
            }
            
            // Generate initial CAPTCHA
            generateCaptcha();
            
            // Refresh CAPTCHA button
            document.getElementById('refreshCaptcha').addEventListener('click', generateCaptcha);
            
            // Form submission
            document.getElementById('kyc-form').addEventListener('submit', function(e) {
                e.preventDefault();
                if (validateForm()) {
                    // Simulate verification process
                    document.getElementById('verifyBtn').disabled = true;
                    document.getElementById('verifyBtn').innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Verifying...';
                    
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'block';
                        document.getElementById('enter-section').style.display = 'block';
                        document.getElementById('kyc-form').style.display = 'none';
                        
                        // Store verification status in localStorage
                        localStorage.setItem('kycVerified', 'true');
                    }, 2000);
                }
            });
            
            // Enter platform button
            document.getElementById('enterBtn').addEventListener('click', function() {
                document.getElementById('kyc-overlay').style.display = 'none';
                document.getElementById('homepage-content').style.display = 'block';
                document.body.style.overflow = 'auto';
                
                // Initialize homepage features
                initCodeBackground();
                init3DScene();
                initCharts();
                initCompaniesCarousel();
            });
            
            // Form validation (email removed)
            function validateForm() {
                let isValid = true;
                
                // Full Name validation
                const fullName = document.getElementById('fullName').value.trim();
                if (fullName === '') {
                    document.getElementById('nameError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('nameError').style.display = 'none';
                }
                
                // Country validation
                const country = document.getElementById('country').value;
                if (country === '' || country === null) {
                    document.getElementById('countryError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('countryError').style.display = 'none';
                }
                
                // CAPTCHA validation
                const captchaInput = document.getElementById('captchaInput').value.trim();
                const captchaText = document.getElementById('captchaText').textContent;
                if (captchaInput !== captchaText) {
                    document.getElementById('captchaError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('captchaError').style.display = 'none';
                }
                
                // Terms validation
                const termsCheck = document.getElementById('termsCheck').checked;
                if (!termsCheck) {
                    document.getElementById('termsError').style.display = 'block';
                    isValid = false;
                } else {
                    document.getElementById('termsError').style.display = 'none';
                }
                
                return isValid;
            }
            
            // CAPTCHA generation
            function generateCaptcha() {
                const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                let captcha = '';
                for (let i = 0; i < 6; i++) {
                    captcha += chars.charAt(Math.floor(Math.random() * chars.length));
                }
                document.getElementById('captchaText').textContent = captcha;
                document.getElementById('captchaInput').value = '';
            }
            
            // Initialize code background animation
            function initCodeBackground() {
                const codeBackground = document.getElementById('code-background');
                const codeNumbers = ['1010', '1100', '1001', '0110', '0101', '1110', '0011', '1011'];
                
                for (let i = 0; i < 50; i++) {
                    const codeNumber = document.createElement('div');
                    codeNumber.className = 'code-number';
                    codeNumber.textContent = codeNumbers[Math.floor(Math.random() * codeNumbers.length)];
                    codeNumber.style.left = Math.random() * 100 + 'vw';
                    codeNumber.style.animationDelay = Math.random() * 15 + 's';
                    codeNumber.style.fontSize = (Math.random() * 10 + 10) + 'px';
                    codeBackground.appendChild(codeNumber);
                }
            }
            
            // Enhanced 3D scene with Saturn-like rings
            function init3DScene() {
                const container = document.getElementById('ai-model-container');
                if (!container) return;
                
                const width = container.clientWidth;
                const height = container.clientHeight;
                
                // Create scene
                const scene = new THREE.Scene();
                
                // Create camera
                const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
                camera.position.z = 5;
                
                // Create renderer
                const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
                renderer.setSize(width, height);
                container.appendChild(renderer.domElement);
                
                // Create geometry - a complex shape representing AI
                const geometry = new THREE.IcosahedronGeometry(1.5, 1);
                
                // Create material with blue color
                const material = new THREE.MeshPhongMaterial({ 
                    color: 0x3a7bd5,
                    shininess: 100,
                    transparent: true,
                    opacity: 0.8
                });
                
                // Create mesh
                const mesh = new THREE.Mesh(geometry, material);
                scene.add(mesh);
                
                // Create Saturn-like rings with code numbers
                const ringGroup = new THREE.Group();
                scene.add(ringGroup);
                
                // Create multiple rings
                const ringCount = 3;
                const codeNumbers = ['1010', '1100', '1001', '0110', '0101', '1110', '0011', '1011'];
                
                for (let r = 0; r < ringCount; r++) {
                    const ringRadius = 2.2 + r * 0.5;
                    const codeCount = 20 + r * 5;
                    
                    for (let i = 0; i < codeCount; i++) {
                        const angle = (i / codeCount) * Math.PI * 2;
                        
                        // Create text sprite for code number
                        const canvas = document.createElement('canvas');
                        const context = canvas.getContext('2d');
                        canvas.width = 64;
                        canvas.height = 32;
                        
                        context.fillStyle = '#3a7bd5';
                        context.font = 'bold 20px monospace';
                        context.textAlign = 'center';
                        context.textBaseline = 'middle';
                        context.fillText(codeNumbers[Math.floor(Math.random() * codeNumbers.length)], 32, 16);
                        
                        const texture = new THREE.CanvasTexture(canvas);
                        const spriteMaterial = new THREE.SpriteMaterial({ 
                            map: texture,
                            transparent: true,
                            opacity: 0.7
                        });
                        
                        const sprite = new THREE.Sprite(spriteMaterial);
                        sprite.position.x = Math.cos(angle) * ringRadius;
                        sprite.position.y = Math.sin(angle) * ringRadius;
                        sprite.scale.set(0.5, 0.25, 1);
                        
                        ringGroup.add(sprite);
                    }
                }
                
                // Add lights
                const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
                scene.add(ambientLight);
                
                const directionalLight = new THREE.DirectionalLight(0x5dade2, 0.8);
                directionalLight.position.set(5, 5, 5);
                scene.add(directionalLight);
                
                // Animation
                function animate() {
                    requestAnimationFrame(animate);
                    
                    mesh.rotation.x += 0.005;
                    mesh.rotation.y += 0.01;
                    
                    // Rotate the rings like Saturn's rings
                    ringGroup.rotation.z += 0.005;
                    
                    renderer.render(scene, camera);
                }
                
                animate();
                
                // Handle window resize
                window.addEventListener('resize', function() {
                    const newWidth = container.clientWidth;
                    const newHeight = container.clientHeight;
                    
                    camera.aspect = newWidth / newHeight;
                    camera.updateProjectionMatrix();
                    
                    renderer.setSize(newWidth, newHeight);
                });
            }
            
            // Initialize stock charts
            function initCharts() {
                // S&P 500 Chart
                const sp500Ctx = document.getElementById('sp500Chart');
                if (sp500Ctx) {
                    new Chart(sp500Ctx.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets: [{
                                label: 'S&P 500',
                                data: [4100, 4200, 4300, 4400, 4500, 4567],
                                borderColor: '#3a7bd5',
                                backgroundColor: 'rgba(58, 123, 213, 0.1)',
                                borderWidth: 2,
                                tension: 0.3,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#e8f5e9'
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.1)'
                                    },
                                    ticks: {
                                        color: '#e8f5e9'
                                    }
                                },
                                x: {
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.1)'
                                    },
                                    ticks: {
                                        color: '#e8f5e9'
                                    }
                                }
                            }
                        }
                    });
                }
                
                // NASDAQ Chart
                const nasdaqCtx = document.getElementById('nasdaqChart');
                if (nasdaqCtx) {
                    new Chart(nasdaqCtx.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets: [{
                                label: 'NASDAQ',
                                data: [12500, 13000, 13500, 13800, 14200, 14316],
                                borderColor: '#5dade2',
                                backgroundColor: 'rgba(93, 173, 226, 0.1)',
                                borderWidth: 2,
                                tension: 0.3,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#e8f5e9'
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.1)'
                                    },
                                    ticks: {
                                        color: '#e8f5e9'
                                    }
                                },
                                x: {
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.1)'
                                    },
                                    ticks: {
                                        color: '#e8f5e9'
                                    }
                                }
                            }
                        }
                    });
                }
                
                // Tech Sector Chart
                const techSectorCtx = document.getElementById('techSectorChart');
                if (techSectorCtx) {
                    new Chart(techSectorCtx.getContext('2d'), {
                        type: 'bar',
                        data: {
                            labels: ['AAPL', 'MSFT', 'GOOGL', 'AMZN', 'TSLA', 'META'],
                            datasets: [{
                                label: 'YTD Performance (%)',
                                data: [45, 38, 42, 52, 65, 48],
                                backgroundColor: [
                                    'rgba(58, 123, 213, 0.7)',
                                    'rgba(93, 173, 226, 0.7)',
                                    'rgba(46, 134, 193, 0.7)',
                                    'rgba(102, 178, 255, 0.7)',
                                    'rgba(143, 188, 219, 0.7)',
                                    'rgba(58, 123, 213, 0.7)'
                                ],
                                borderColor: [
                                    '#3a7bd5',
                                    '#5dade2',
                                    '#2e86c1',
                                    '#66b2ff',
                                    '#8fbcdb',
                                    '#3a7bd5'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#e8f5e9'
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.1)'
                                    },
                                    ticks: {
                                        color: '#e8f5e9'
                                    }
                                },
                                x: {
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.1)'
                                    },
                                    ticks: {
                                        color: '#e8f5e9'
                                    }
                                }
                            }
                        }
                    });
                }
                
                // Global Markets Chart
                const globalMarketsCtx = document.getElementById('globalMarketsChart');
                if (globalMarketsCtx) {
                    new Chart(globalMarketsCtx.getContext('2d'), {
                        type: 'radar',
                        data: {
                            labels: ['US', 'UK', 'Germany', 'Japan', 'China', 'India'],
                            datasets: [{
                                label: 'Market Performance',
                                data: [85, 72, 78, 65, 58, 68],
                                backgroundColor: 'rgba(58, 123, 213, 0.2)',
                                borderColor: '#3a7bd5',
                                pointBackgroundColor: '#3a7bd5',
                                pointBorderColor: '#fff',
                                pointHoverBackgroundColor: '#fff',
                                pointHoverBorderColor: '#3a7bd5'
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#e8f5e9'
                                    }
                                }
                            },
                            scales: {
                                r: {
                                    angleLines: {
                                        color: 'rgba(232, 245, 233, 0.2)'
                                    },
                                    grid: {
                                        color: 'rgba(232, 245, 233, 0.2)'
                                    },
                                    pointLabels: {
                                        color: '#e8f5e9'
                                    },
                                    ticks: {
                                        color: '#e8f5e9',
                                        backdropColor: 'transparent'
                                    }
                                }
                            }
                        }
                    });
                }
            }
            
            // Initialize companies carousel
            function initCompaniesCarousel() {
                const carousel = document.getElementById('companiesCarousel');
                if (!carousel) return;
                
                const dotsContainer = document.getElementById('carouselDots');
                const prevBtn = document.querySelector('.carousel-control.prev');
                const nextBtn = document.querySelector('.carousel-control.next');
                
                // List of 50+ companies with AI integration
                const companies = [
                    { name: 'Spotify', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/1200px-Spotify_logo_without_text.svg.png' },
                    { name: 'Netflix', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Netflix_2015_logo.svg/1200px-Netflix_2015_logo.svg.png' },
                    { name: 'Amazon', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1200px-Amazon_logo.svg.png' },
                    { name: 'Apple', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/1200px-Apple_logo_black.svg.png' },
                    { name: 'Adobe', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Adobe_Corporate_Logo.png/1200px-Adobe_Corporate_Logo.png' },
                    { name: 'Google', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png' },
                    { name: 'IBM', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/IBM_logo.svg/1200px-IBM_logo.svg.png' },
                    { name: 'Salesforce', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Salesforce.com_logo.svg/1200px-Salesforce.com_logo.svg.png' },
                    { name: 'Intel', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Intel_logo_1995.svg/1200px-Intel_logo_1995.svg.png' },
                    { name: 'IBM Watson', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/IBM_Watson_logo_pos.png/1200px-IBM_Watson_logo_pos.png' },
                    { name: 'Upstart', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Upstart_logo.svg/1200px-Upstart_logo.svg.png' },
                    { name: 'C3.ai', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/C3.ai_Logo.svg/1200px-C3.ai_Logo.svg.png' },
                    { name: 'Palantir', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/45/Palantir_Technologies_logo.svg/1200px-Palantir_Technologies_logo.svg.png' },
                    { name: 'UiPath', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/UiPath_logo.png/1200px-UiPath_logo.png' },
                    { name: 'Twilio', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Twilio_logo.svg/1200px-Twilio_logo.svg.png' },
                    { name: 'Snowflake', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Snowflake_Logo.svg/1200px-Snowflake_Logo.svg.png' },
                    { name: 'Datadog', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Datadog_Logo.svg/1200px-Datadog_Logo.svg.png' },
                    { name: 'CrowdStrike', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/CrowdStrike_Logo.svg/1200px-CrowdStrike_Logo.svg.png' },
                    { name: 'Zscaler', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Zscaler_logo.svg/1200px-Zscaler_logo.svg.png' },
                    { name: 'ServiceNow', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/ServiceNow_logo.svg/1200px-ServiceNow_logo.svg.png' },
                    { name: 'Workday', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Workday_logo.svg/1200px-Workday_logo.svg.png' },
                    { name: 'Splunk', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Splunk_logo.svg/1200px-Splunk_logo.svg.png' },
                    { name: 'Palo Alto Networks', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Palo_Alto_Networks_logo.svg/1200px-Palo_Alto_Networks_logo.svg.png' },
                    { name: 'Fortinet', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Fortinet_logo.svg/1200px-Fortinet_logo.svg.png' },
                    { name: 'DocuSign', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/DocuSign_logo.svg/1200px-DocuSign_logo.svg.png' },
                    { name: 'Square', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Square%2C_Inc._logo.svg/1200px-Square%2C_Inc._logo.svg.png' },
                    { name: 'Shopify', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Shopify_logo_2018.svg/1200px-Shopify_logo_2018.svg.png' },
                    { name: 'PayPal', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1200px-PayPal.svg.png' },
                    { name: 'Stripe', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Stripe_Logo%2C_revised_2016.svg/1200px-Stripe_Logo%2C_revised_2016.svg.png' },
                    { name: 'SquareSpace', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Squarespace_logo_and_wordmark_2014.svg/1200px-Squarespace_logo_and_wordmark_2014.svg.png' },
                    { name: 'HubSpot', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/HubSpot_Logo.svg/1200px-HubSpot_Logo.svg.png' },
                    { name: 'Zoom', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Zoom_Communications_Logo.svg/1200px-Zoom_Communications_Logo.svg.png' },
                    { name: 'Slack', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Slack_icon_2019.svg/1200px-Slack_icon_2019.svg.png' },
                    { name: 'Dropbox', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Dropbox_Icon.svg/1200px-Dropbox_Icon.svg.png' },
                    { name: 'Atlassian', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Atlassian-logo-blue.svg/1200px-Atlassian-logo-blue.svg.png' },
                    { name: 'GitHub', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Octicons-mark-github.svg/1200px-Octicons-mark-github.svg.png' },
                    { name: 'GitLab', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/GitLab_logo.svg/1200px-GitLab_logo.svg.png' },
                    { name: 'MongoDB', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/MongoDB_Logo.svg/1200px-MongoDB_Logo.svg.png' },
                    { name: 'Elastic', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Elasticsearch_logo.svg/1200px-Elasticsearch_logo.svg.png' },
                    { name: 'Confluent', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Confluent_logo.svg/1200px-Confluent_logo.svg.png' },
                    { name: 'Databricks', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/63/Databricks_Logo.png/1200px-Databricks_Logo.png' },
                    { name: 'Qualcomm', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Qualcomm-Logo.svg/1200px-Qualcomm-Logo.svg.png' },
                    { name: 'AMD', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/AMD_logo_2018.svg/1200px-AMD_logo_2018.svg.png' },
                    { name: 'Broadcom', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Broadcom_Inc._Logo.svg/1200px-Broadcom_Inc._Logo.svg.png' },
                    { name: 'Micron', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Micron_Technology_logo_2022.svg/1200px-Micron_Technology_logo_2022.svg.png' },
                    { name: 'Lam Research', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Lam_Research_logo.svg/1200px-Lam_Research_logo.svg.png' },
                    { name: 'Applied Materials', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Applied_Materials_logo.svg/1200px-Applied_Materials_logo.svg.png' },
                    { name: 'ASML', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/ASML_logo.svg/1200px-ASML_logo.svg.png' },
                    { name: 'Synopsys', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Synopsys_Logo_2020.svg/1200px-Synopsys_Logo_2020.svg.png' },
                    { name: 'Cadence', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Cadence_Design_Systems_logo.svg/1200px-Cadence_Design_Systems_logo.svg.png' },
                    { name: 'Ansys', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/ANSYS_logo.svg/1200px-ANSYS_logo.svg.png' },
                    { name: 'PTC', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/PTC_Logo.svg/1200px-PTC_Logo.svg.png' },
                    { name: 'Dassault Systèmes', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Dassault_Systemes_logo.svg/1200px-Dassault_Systemes_logo.svg.png' },
                    { name: 'Siemens', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Siemens_AG_logo.svg/1200px-Siemens_AG_logo.svg.png' },
                    { name: 'Rockwell Automation', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Rockwell_Automation_logo.svg/1200px-Rockwell_Automation_logo.svg.png' },
                    { name: 'ABB', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/ABB_logo.svg/1200px-ABB_logo.svg.png' },
                    { name: 'Schneider Electric', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Schneider_Electric_2015_logo.svg/1200px-Schneider_Electric_2015_logo.svg.png' }
                ];
                
                // Create company logo items
                companies.forEach(company => {
                    const logoItem = document.createElement('div');
                    logoItem.className = 'company-logo-item';
                    logoItem.innerHTML = `<img src="${company.logo}" alt="${company.name}" title="${company.name}">`;
                    carousel.appendChild(logoItem);
                });
                
                // Carousel functionality
                let currentIndex = 0;
                const itemsPerView = 6;
                const totalItems = companies.length;
                const totalSlides = Math.ceil(totalItems / itemsPerView);
                
                // Create dots
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'carousel-dot';
                    if (i === 0) dot.classList.add('active');
                    dot.addEventListener('click', () => goToSlide(i));
                    dotsContainer.appendChild(dot);
                }
                
                // Update carousel position
                function updateCarousel() {
                    const translateX = -currentIndex * (100 / itemsPerView);
                    carousel.style.transform = `translateX(${translateX}%)`;
                    
                    // Update active dot
                    document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
                        dot.classList.toggle('active', index === currentIndex);
                    });
                }
                
                // Go to specific slide
                function goToSlide(index) {
                    currentIndex = index;
                    if (currentIndex >= totalSlides) currentIndex = 0;
                    if (currentIndex < 0) currentIndex = totalSlides - 1;
                    updateCarousel();
                }
                
                // Next slide
                function nextSlide() {
                    currentIndex++;
                    if (currentIndex >= totalSlides) currentIndex = 0;
                    updateCarousel();
                }
                
                // Previous slide
                function prevSlide() {
                    currentIndex--;
                    if (currentIndex < 0) currentIndex = totalSlides - 1;
                    updateCarousel();
                }
                
                // Event listeners
                prevBtn.addEventListener('click', prevSlide);
                nextBtn.addEventListener('click', nextSlide);
                
                // Auto-rotate carousel
                let autoRotate = setInterval(nextSlide, 5000);
                
                // Pause auto-rotation on hover
                carousel.addEventListener('mouseenter', () => {
                    clearInterval(autoRotate);
                });
                
                carousel.addEventListener('mouseleave', () => {
                    autoRotate = setInterval(nextSlide, 5000);
                });
                
                // Initialize carousel
                updateCarousel();
            }
        });
    </script>
</body>

</html>