<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Settings Dashboard</title>
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
        }
        
        /* Sidebar */
        .sidebar {
            background-color: var(--primary-blue);
            min-height: 100vh;
            padding: 0;
            border-right: 1px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .sidebar .navbar-brand {
            color: white;
            font-weight: bold;
            padding: 20px 15px;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }
        
        .sidebar .nav-link {
            color: #a8c6e5;
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: var(--light-blue);
            color: white;
        }
        
        .sidebar .nav-link i {
            width: 25px;
            text-align: center;
            margin-right: 10px;
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
        .form-control, .form-select {
            background-color: var(--light-blue);
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }
        
        .form-control:focus, .form-select:focus {
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
            .sidebar {
                min-height: auto;
                width: 100%;
            }
            
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
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="d-flex flex-column">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-robot me-2"></i>Tenex
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.html">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolio.html">
                                <i class="fas fa-chart-line"></i> Portfolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="investment">
                                <i class="fas fa-wallet"></i> Investments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transactions.html">
                                <i class="fas fa-exchange-alt"></i> Transactions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="insurance">
                                <i class="fas fa-file-invoice-dollar"></i> Insurance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="settings.html">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link" href="index.html">
                                <i class="fas fa-arrow-left"></i> Back to Main Site
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Top Bar -->
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Settings Dashboard</h4>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Tier 2 Investor</small>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="dashboard-card">
                    <div class="card-title">Quick Actions</div>
                    <div class="quick-actions">
                        <a href="#" class="action-btn">
                            <i class="fas fa-user-edit"></i>
                            Edit Profile
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-shield-alt"></i>
                            Security
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-bell"></i>
                            Notifications
                        </a>
                        <a href="#" class="action-btn">
                            <i class="fas fa-download"></i>
                            Export Data
                        </a>
                        <a href="#" class="action-btn">
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
                <div class="settings-section">
                    <div class="section-header">
                        <div class="section-title">Account Settings</div>
                        <div class="section-description">Manage your personal information and account preferences</div>
                    </div>
                    
                    <div class="profile-header">
                        <div class="profile-avatar">JD</div>
                        <h5>John Doe</h5>
                        <p class="text-muted">Tier 2 Investor • Member since 2021</p>
                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-camera me-1"></i> Change Photo
                        </button>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" value="John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="Doe">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="john.doe@example.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" value="+1 (555) 123-4567">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" value="123 Investment Street">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" value="New York">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" value="NY">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">ZIP Code</label>
                                <input type="text" class="form-control" value="10001">
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <button class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save Changes
                        </button>
                    </div>
                </div>
                
                <!-- Security Settings -->
                <div class="settings-section">
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
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Two-Factor Authentication</div>
                            <div class="settings-description">Add an extra layer of security to your account</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="2faSwitch" checked>
                                <label class="form-check-label" for="2faSwitch">Enabled</label>
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
                                <input class="form-check-input" type="checkbox" id="loginNotifications" checked>
                                <label class="form-check-label" for="loginNotifications">Enabled</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Session Timeout</div>
                            <div class="settings-description">Automatically log out after period of inactivity</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option>15 minutes</option>
                                <option selected>30 minutes</option>
                                <option>1 hour</option>
                                <option>4 hours</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Password</div>
                            <div class="settings-description">Last changed 2 months ago</div>
                        </div>
                        <div class="settings-controls">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-edit me-1"></i> Change Password
                            </button>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Active Sessions</div>
                            <div class="settings-description">Manage your active login sessions</div>
                        </div>
                        <div class="settings-controls">
                            <button class="btn btn-outline-secondary">
                                <i class="fas fa-desktop me-1"></i> View Sessions
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Notification Settings -->
                <div class="settings-section">
                    <div class="section-header">
                        <div class="section-title">Notification Preferences</div>
                        <div class="section-description">Control how and when you receive notifications</div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Email Notifications</div>
                            <div class="settings-description">Receive notifications via email</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                <label class="form-check-label" for="emailNotifications">Enabled</label>
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
                                <input class="form-check-input" type="checkbox" id="pushNotifications" checked>
                                <label class="form-check-label" for="pushNotifications">Enabled</label>
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
                                <input class="form-check-input" type="checkbox" id="smsAlerts">
                                <label class="form-check-label" for="smsAlerts">Enabled</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Portfolio Updates</div>
                            <div class="settings-description">Daily portfolio performance summaries</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="portfolioUpdates" checked>
                                <label class="form-check-label" for="portfolioUpdates">Enabled</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Market Alerts</div>
                            <div class="settings-description">Important market movements and news</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="marketAlerts" checked>
                                <label class="form-check-label" for="marketAlerts">Enabled</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Dividend Notifications</div>
                            <div class="settings-description">When dividends are paid or announced</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="dividendNotifications" checked>
                                <label class="form-check-label" for="dividendNotifications">Enabled</label>
                            </div>
                        </div>
                    </div>
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
                                <option>Conservative</option>
                                <option selected>Moderate</option>
                                <option>Aggressive</option>
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
                                <input class="form-check-input" type="checkbox" id="autoRebalancing">
                                <label class="form-check-label" for="autoRebalancing">Enabled</label>
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
                                <option selected>USD - US Dollar</option>
                                <option>EUR - Euro</option>
                                <option>GBP - British Pound</option>
                                <option>JPY - Japanese Yen</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Tax-Loss Harvesting</div>
                            <div class="settings-description">Automatically optimize for tax efficiency</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="taxLossHarvesting" checked>
                                <label class="form-check-label" for="taxLossHarvesting">Enabled</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">AI Investment Recommendations</div>
                            <div class="settings-description">Receive AI-powered investment suggestions</div>
                        </div>
                        <div class="settings-controls">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="aiRecommendations" checked>
                                <label class="form-check-label" for="aiRecommendations">Enabled</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Appearance Settings -->
                <div class="settings-section">
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
                                <option selected>Dark Theme</option>
                                <option>Light Theme</option>
                                <option>Auto (System)</option>
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
                                <option selected>Standard</option>
                                <option>Compact</option>
                                <option>Detailed</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Charts Display</div>
                            <div class="settings-description">How charts and graphs are displayed</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option selected>Interactive</option>
                                <option>Static</option>
                                <option>Minimal</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="settings-item">
                        <div class="settings-info">
                            <div class="settings-label">Number Formatting</div>
                            <div class="settings-description">How numbers and currencies are displayed</div>
                        </div>
                        <div class="settings-controls">
                            <select class="form-select" style="width: 200px;">
                                <option selected>Standard (1,000.00)</option>
                                <option>Compact (1K)</option>
                                <option>Detailed (1,000.00)</option>
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
        // Settings functionality
        document.addEventListener('DOMContentLoaded', function() {
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
            
            // Save settings functionality
            const saveButtons = document.querySelectorAll('.btn-primary');
            saveButtons.forEach(button => {
                if (button.textContent.includes('Save')) {
                    button.addEventListener('click', function() {
                        // Simulate saving
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Saving...';
                        this.disabled = true;
                        
                        setTimeout(() => {
                            this.innerHTML = '<i class="fas fa-check me-1"></i> Saved!';
                            setTimeout(() => {
                                this.innerHTML = originalText;
                                this.disabled = false;
                            }, 2000);
                        }, 1000);
                    });
                }
            });
        });
    </script>
</body>
</html>