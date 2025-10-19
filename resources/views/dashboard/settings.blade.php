<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheSpace - Settings Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #061b2e;
            --accent-blue: #0052a3;
            --dark-blue: #051524;
            --light-blue: #0a2d4d;
            --text-color: #e8f1f8;
            --light-gray: #0c1f33;
            --border-color: #1a3a5f;
            --success-green: #00c853;
            --warning-orange: #ff9800;
            --danger-red: #f44336;
        }

        body {
            background-color: var(--dark-blue);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            padding-top: 70px;
            /* Added for fixed navbar */
        }

        /* Enhanced Navigation */
        .navbar {
            background-color: var(--primary-blue) !important;
            border-bottom: 1px solid var(--border-color);
            padding: 0.5rem 0;
            height: 70px;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background-color: var(--dark-blue) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 8px;
            font-size: 1.8rem;
        }

        .nav-link {
            font-weight: 500;
            color: #a8c6e5 !important;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--light-blue);
            color: white !important;
            transform: translateY(-1px);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background: var(--accent-blue);
            border-radius: 2px;
        }

        .navbar-toggler {
            border: 1px solid var(--border-color);
            padding: 0.25rem 0.5rem;
            font-size: 1.2rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28168, 198, 229, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Mobile menu adjustments */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: var(--primary-blue);
                margin-top: 10px;
                border-radius: 10px;
                border: 1px solid var(--border-color);
                padding: 15px;
            }

            .nav-link {
                margin: 0.2rem 0;
                padding: 0.8rem 1rem !important;
            }

            .nav-link.active::after {
                display: none;
            }
        }

        /* Compact navbar for very small screens */
        @media (max-width: 576px) {
            .navbar-brand span {
                display: none;
            }

            .navbar-brand i {
                margin-right: 0;
                font-size: 2rem;
            }
        }

        /* Main Content */
        .main-content {
            padding: 20px;
        }

        /* Top Bar */
        .top-bar {
            background-color: var(--primary-blue);
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 10px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: transform 0.3s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-blue);
        }

        .card-title {
            font-size: 1.1rem;
            color: #a8c6e5;
            margin-bottom: 15px;
        }

        /* Settings Sections */
        .settings-section {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
        }

        .section-header {
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: white;
        }

        .section-description {
            font-size: 0.9rem;
            color: #a8c6e5;
        }

        /* Settings Items */
        .settings-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .settings-item:last-child {
            border-bottom: none;
        }

        .settings-info {
            flex: 1;
        }

        .settings-label {
            font-weight: 600;
            margin-bottom: 5px;
            color: white;
        }

        .settings-description {
            font-size: 0.9rem;
            color: #a8c6e5;
        }

        /* Toggle Switch */
        .form-check-input {
            background-color: var(--light-blue);
            border-color: var(--border-color);
        }

        .form-check-input:checked {
            background-color: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        /* Form Controls */
        .form-control,
        .form-select {
            background-color: var(--light-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .form-control:focus,
        .form-select:focus {
            background-color: var(--light-blue);
            border-color: var(--accent-blue);
            color: var(--text-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 82, 163, 0.25);
        }

        /* Profile Section */
        .profile-header {
            text-align: center;
            padding: 20px 0;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 auto 15px;
        }

        /* Security Status */
        .security-status {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background-color: rgba(0, 200, 83, 0.1);
            border: 1px solid rgba(0, 200, 83, 0.3);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .security-icon {
            color: var(--success-green);
            font-size: 1.5rem;
            margin-right: 15px;
        }

        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .action-btn {
            background-color: var(--light-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
        }

        .action-btn:hover {
            background-color: var(--accent-blue);
            color: white;
            transform: translateY(-2px);
        }

        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 8px;
            display: block;
        }

        /* Danger Zone */
        .danger-zone {
            background-color: rgba(244, 67, 54, 0.1);
            border: 1px solid rgba(244, 67, 54, 0.3);
            border-radius: 10px;
            padding: 25px;
        }

        .danger-title {
            color: var(--danger-red);
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .settings-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .settings-controls {
                margin-top: 10px;
                width: 100%;
            }

            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .main-content {
                padding: 15px 10px;
            }

            .top-bar {
                padding: 10px 15px;
            }

            .dashboard-card {
                padding: 15px;
            }

            .settings-section {
                padding: 20px;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Enhanced Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-robot"></i>
                <span>TheSpace</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.portfolio') }}">
                            <i class="fas fa-chart-line me-1"></i> Portfolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.investments') }}">
                            <i class="fas fa-wallet me-1"></i> Investments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.transactions') }}">
                            <i class="fas fa-exchange-alt me-1"></i> Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard.insurance') }}">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Insurance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.settings') }}">
                            <i class="fas fa-cog me-1"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fas fa-arrow-left me-1"></i> Main Site
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 main-content">
                <!-- Top Bar -->
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Settings Dashboard</h4>
                    <div class="user-info">
                        <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                        <div>
                            <div class="fw-bold">{{ $user->name }}</div>
                            <small class="text-muted">{{ $user->investor_tier }}</small>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <div class="card-title">Quick Actions</div>
                    <div class="quick-actions">
                        <a href="#profile" class="action-btn">
                            <i class="fas fa-user-edit"></i>
                            Edit Profile
                        </a>
                        <a href="#security" class="action-btn">
                            <i class="fas fa-shield-alt"></i>
                            Security
                        </a>
                        <a href="#notifications" class="action-btn">
                            <i class="fas fa-bell"></i>
                            Notifications
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-download"></i>
                            Export Data
                        </a>
                        <a href="#appearance" class="action-btn">
                            <i class="fas fa-palette"></i>
                            Appearance
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-question-circle"></i>
                            Help & Support
                        </a>
                    </div>
                </div>

                <!-- Account Settings -->
                <div class="settings-section" id="profile">
                    <div class="section-header">
                        <div class="section-title">Account Settings</div>
                        <div class="section-description">Manage your personal information and account preferences</div>
                    </div>

                    <div class="profile-header">
                        <div class="profile-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                        <h5>{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->investor_tier }} • Member since {{
                            $user->created_at->format('Y') }}</p>
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-camera me-1"></i> Change Photo
                        </button>
                    </div>

                    <form method="POST" action="{{ route('settings.profile.update') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Investor Tier</label>
                                    <input type="text" class="form-control" value="{{ $user->investor_tier }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" value="{{ $user->state }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">ZIP Code</label>
                                    <input type="text" class="form-control" name="zip_code"
                                        value="{{ $user->zip_code }}">
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Security Settings -->
                <div class="settings-section" id="security">
                    <div class="section-header">
                        <div class="section-title">Security Settings</div>
                        <div class="section-description">Manage your account security and privacy preferences</div>
                    </div>

                    <div class="security-status">
                        <div class="security-icon">
                            <i class="fas fa-shield-check"></i>
                        </div>
                        <div>
                            <div class="fw-bold">Your account security is strong</div>
                            <div class="text-muted">All recommended security measures are enabled</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('settings.security.update') }}">
                        @csrf
                        <div class="settings-item">
                            <div class="settings-info">
                                <div class="settings-label">Two-Factor Authentication</div>
                                <div class="settings-description">Add an extra layer of security to your account</div>
                            </div>
                            <div class="settings-controls">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="two_factor_enabled"
                                        id="2faSwitch" {{ $user->two_factor_enabled ? 'checked' : '' }}>
                                    <label class="form-check-label" for="2faSwitch">{{ $user->two_factor_enabled ?
                                        'Enabled' : 'Disabled' }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="settings-item">
                            <div class="settings-info">
                                <div class="settings-label">Login Notifications</div>
                                <div class="settings-description">Get notified when someone logs into your account</div>
                            </div>
                            <div class="settings-controls">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="login_notifications"
                                        id="loginNotifications" {{ $user->login_notifications ? 'checked' : '' }}>
                                    <label class="form-check-label" for="loginNotifications">{{
                                        $user->login_notifications ? 'Enabled' : 'Disabled' }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="settings-item">
                            <div class="settings-info">
                                <div class="settings-label">Session Timeout</div>
                                <div class="settings-description">Automatically log out after period of inactivity</div>
                            </div>
                            <div class="settings-controls">
                                <select class="form-select" name="session_timeout" style="width: 200px;">
                                    <option value="15" {{ $user->session_timeout == 15 ? 'selected' : '' }}>15 minutes
                                    </option>
                                    <option value="30" {{ $user->session_timeout == 30 ? 'selected' : '' }}>30 minutes
                                    </option>
                                    <option value="60" {{ $user->session_timeout == 60 ? 'selected' : '' }}>1 hour
                                    </option>
                                    <option value="240" {{ $user->session_timeout == 240 ? 'selected' : '' }}>4 hours
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Security Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Notification Settings -->
                <div class="settings-section" id="notifications">
                    <div class="section-header">
                        <div class="section-title">Notification Preferences</div>
                        <div class="section-description">Control how and when you receive notifications</div>
                    </div>

                    <form method="POST" action="{{ route('settings.notifications.update') }}">
                        @csrf
                        <div class="settings-item">
                            <div class="settings-info">
                                <div class="settings-label">Email Notifications</div>
                                <div class="settings-description">Receive notifications via email</div>
                            </div>
                            <div class="settings-controls">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="email_notifications"
                                        id="emailNotifications" {{ $user->email_notifications ? 'checked' : '' }}>
                                    <label class="form-check-label" for="emailNotifications">{{
                                        $user->email_notifications ? 'Enabled' : 'Disabled' }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="settings-item">
                            <div class="settings-info">
                                <div class="settings-label">Push Notifications</div>
                                <div class="settings-description">Receive push notifications on your devices</div>
                            </div>
                            <div class="settings-controls">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="push_notifications"
                                        id="pushNotifications" {{ $user->push_notifications ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pushNotifications">{{ $user->push_notifications
                                        ? 'Enabled' : 'Disabled' }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="settings-item">
                            <div class="settings-info">
                                <div class="settings-label">SMS Alerts</div>
                                <div class="settings-description">Receive important alerts via SMS</div>
                            </div>
                            <div class="settings-controls">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="sms_alerts" id="smsAlerts" {{
                                        $user->sms_alerts ? 'checked' : '' }}>
                                    <label class="form-check-label" for="smsAlerts">{{ $user->sms_alerts ? 'Enabled' :
                                        'Disabled' }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Notification Settings
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Investment Preferences -->
                <div class="settings-section">
                    <div class="section-header">
                        <div class="section-title">Investment Preferences</div>
                        <div class="section-description">Customize your investment experience and preferences</div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Risk Tolerance</div>
                            <div class="settings-description">Your preferred level of investment risk</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option {{ $user->risk_tolerance == 'Conservative' ? 'selected' : '' }}>Conservative
                                </option>
                                <option {{ $user->risk_tolerance == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                <option {{ $user->risk_tolerance == 'Aggressive' ? 'selected' : '' }}>Aggressive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Auto-Rebalancing</div>
                            <div class="settings-description">Automatically rebalance portfolio periodically</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="autoRebalancing" {{
                                    $user->auto_rebalancing ? 'checked' : '' }}>
                                <label class="form-check-label" for="autoRebalancing">{{ $user->auto_rebalancing ?
                                    'Enabled' : 'Disabled' }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Default Currency</div>
                            <div class="settings-description">Preferred currency for displaying values</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option {{ $user->default_currency == 'USD' ? 'selected' : '' }}>USD - US Dollar
                                </option>
                                <option {{ $user->default_currency == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                <option {{ $user->default_currency == 'GBP' ? 'selected' : '' }}>GBP - British Pound
                                </option>
                                <option {{ $user->default_currency == 'JPY' ? 'selected' : '' }}>JPY - Japanese Yen
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Appearance Settings -->
                <div class="settings-section" id="appearance">
                    <div class="section-header">
                        <div class="section-title">Appearance & Display</div>
                        <div class="section-description">Customize the look and feel of your dashboard</div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Theme</div>
                            <div class="settings-description">Choose your preferred color theme</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option {{ $user->theme == 'dark' ? 'selected' : '' }}>Dark Theme</option>
                                <option {{ $user->theme == 'light' ? 'selected' : '' }}>Light Theme</option>
                                <option {{ $user->theme == 'auto' ? 'selected' : '' }}>Auto (System)</option>
                            </select>
                        </div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Dashboard Layout</div>
                            <div class="settings-description">Choose your preferred dashboard layout</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option {{ $user->dashboard_layout == 'standard' ? 'selected' : '' }}>Standard</option>
                                <option {{ $user->dashboard_layout == 'compact' ? 'selected' : '' }}>Compact</option>
                                <option {{ $user->dashboard_layout == 'detailed' ? 'selected' : '' }}>Detailed</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="settings-section danger-zone">
                    <div class="section-header">
                        <div class="section-title">Danger Zone</div>
                        <div class="section-description">Irreversible and destructive actions</div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="danger-title">Export Account Data</div>
                            <div class="settings-description">Download all your account data in a portable format</div>
                        </div>
                        <div class="settings-controls">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-download me-1"></i> Export Data
                            </button>
                        </div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="danger-title">Deactivate Account</div>
                            <div class="settings-description">Temporarily deactivate your account</div>
                        </div>
                        <div class="settings-controls">
                            <button class="btn btn-outline-warning">
                                <i class="fas fa-user-slash me-1"></i> Deactivate
                            </button>
                        </div>
                    </div>

                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="danger-title">Delete Account</div>
                            <div class="settings-description">Permanently delete your account and all data</div>
                        </div>
                        <div class="settings-controls">
                            <button class="btn btn-outline-danger">
                                <i class="fas fa-trash me-1"></i> Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Success messages
            @if(session('success'))
                alert('{{ session('success') }}');
            @endif

            // Toggle switch feedback
            const toggleSwitches = document.querySelectorAll('.form-check-input');
            toggleSwitches.forEach(switchElement => {
                switchElement.addEventListener('change', function() {
                    const label = this.nextElementSibling;
                    if (this.checked) {
                        label.textContent = 'Enabled';
                    } else {
                        label.textContent = 'Disabled';
                    }
                });
            });

            // Smooth scroll for quick actions
            document.querySelectorAll('.action-btn[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add confirmation for dangerous actions
            const dangerButtons = document.querySelectorAll('.danger-zone .btn');
            dangerButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const action = this.textContent.trim();
                    if (!confirm(`Are you sure you want to ${action}? This action cannot be undone.`)) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>

</html>