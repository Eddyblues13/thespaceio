<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenex - Direct Deposit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- QR Code Generator -->
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
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
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-blue);
        }
        
        .card-title {
            font-size: 1.3rem;
            color: var(--text-color);
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .card-subtitle {
            font-size: 1rem;
            color: #a8c6e5;
            margin-bottom: 20px;
        }
        
        /* Amount Input */
        .amount-input-container {
            margin-bottom: 25px;
        }
        
        .amount-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #a8c6e5;
        }
        
        .amount-input {
            background-color: var(--light-blue);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-color);
            padding: 12px 15px;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s;
        }
        
        .amount-input:focus {
            border-color: var(--accent-blue);
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 82, 163, 0.2);
        }
        
        /* Payment Method Cards */
        .payment-method-card {
            background-color: var(--light-blue);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }
        
        .payment-method-card.active {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 2px rgba(0, 82, 163, 0.2);
        }
        
        .payment-method-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .payment-method-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .crypto-icon {
            background-color: rgba(247, 147, 26, 0.2);
            color: #f7931a;
        }
        
        .wire-icon {
            background-color: rgba(0, 200, 83, 0.2);
            color: var(--success-green);
        }
        
        .payment-method-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
        }
        
        .payment-method-description {
            color: #a8c6e5;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }
        
        /* Crypto Payment Section */
        .crypto-payment-section {
            display: none;
        }
        
        .wallet-address-container {
            margin-bottom: 20px;
        }
        
        .wallet-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #a8c6e5;
        }
        
        .wallet-address {
            background-color: var(--primary-blue);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 12px 15px;
            font-family: monospace;
            color: var(--text-color);
            word-break: break-all;
            margin-bottom: 10px;
        }
        
        .copy-btn {
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 15px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .copy-btn:hover {
            background-color: #00458a;
        }
        
        .copy-btn.copied {
            background-color: var(--success-green);
        }
        
        .qr-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        
        .qr-code {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            max-width: 200px;
        }
        
        .crypto-note {
            background-color: rgba(247, 147, 26, 0.1);
            border-left: 4px solid #f7931a;
            padding: 12px 15px;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 0.9rem;
        }
        
        /* Wire Transfer Section */
        .wire-transfer-section {
            display: none;
        }
        
        .wire-info {
            background-color: var(--primary-blue);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .wire-detail {
            margin-bottom: 10px;
            display: flex;
        }
        
        .wire-label {
            font-weight: 500;
            min-width: 150px;
            color: #a8c6e5;
        }
        
        .wire-value {
            color: var(--text-color);
        }
        
        .contact-manager-btn {
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 25px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .contact-manager-btn:hover {
            background-color: #00458a;
            transform: translateY(-2px);
        }
        
        /* Notification */
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--success-green);
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 1050;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s;
        }
        
        .notification.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                width: 100%;
            }
            
            .dashboard-card {
                padding: 20px;
            }
            
            .payment-method-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .payment-method-icon {
                margin-bottom: 10px;
            }
            
            .wire-detail {
                flex-direction: column;
            }
            
            .wire-label {
                min-width: auto;
                margin-bottom: 5px;
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
        }
    </style>
</head>
<body>
    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle me-2"></i>
        <span id="notificationText">Copied to clipboard!</span>
    </div>
    
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
                            <a class="nav-link active" href="directdeposit.html">
                                <i class="fas fa-money-bill-transfer"></i> Direct Deposit
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
                            <a class="nav-link" href="settings.html">
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
                    <h4 class="mb-0">Direct Deposit</h4>
                    <div class="user-info">
                        <div class="user-avatar">JD</div>
                        <div>
                            <div class="fw-bold">John Doe</div>
                            <small class="text-muted">Tier 2 Investor</small>
                        </div>
                    </div>
                </div>
                
                <!-- Deposit Amount Section -->
                <div class="dashboard-card">
                    <h2 class="card-title">Make a Direct Deposit</h2>
                    <p class="card-subtitle">Choose your preferred deposit method based on the amount you wish to deposit</p>
                    
                    <div class="amount-input-container">
                        <div class="amount-label">Deposit Amount (USD)</div>
                        <input type="number" class="amount-input" id="depositAmount" placeholder="Enter amount in USD" min="1" step="0.01">
                    </div>
                    
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note:</strong> Input the specific amount you want to invest.
                    </div>
                </div>
                
                <!-- Payment Methods -->
                <div class="row">
                    <!-- Cryptocurrency Payment Method -->
                    <div class="col-lg-6">
                        <div class="payment-method-card" id="cryptoMethodCard">
                            <div class="payment-method-header">
                                <div class="payment-method-icon crypto-icon">
                                    <i class="fab fa-bitcoin"></i>
                                </div>
                                <h3 class="payment-method-title">Bitcoin Payment</h3>
                            </div>
                            <p class="payment-method-description">
                                For deposits of any amount, enjoy fast, secure, and direct cryptocurrency transfer using Bitcoin.
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="cryptoMethod" value="crypto">
                                <label class="form-check-label" for="cryptoMethod">
                                    Select Bitcoin Payment
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Wire Transfer Payment Method -->
                    <div class="col-lg-6">
                        <div class="payment-method-card" id="wireMethodCard">
                            <div class="payment-method-header">
                                <div class="payment-method-icon wire-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h3 class="payment-method-title">Wire Transfer</h3>
                            </div>
                            <p class="payment-method-description">
                                We only accept traditional wire transfers for deposits exceeding $100,000
                            </p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="wireMethod" value="wire">
                                <label class="form-check-label" for="wireMethod">
                                    Select Wire Transfer
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cryptocurrency Payment Section -->
                <div class="dashboard-card crypto-payment-section" id="cryptoPaymentSection">
                    <h3 class="card-title">Bitcoin Payment Instructions</h3>
                    
                    <div class="wallet-address-container">
                        <div class="wallet-label">Bitcoin Wallet Address</div>
                        <div class="wallet-address" id="walletAddress">bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh</div>
                        <button class="copy-btn" id="copyWalletBtn">
                            <i class="fas fa-copy me-1"></i> Copy Address
                        </button>
                    </div>
                    
                    <div class="qr-container">
                        <div class="qr-code" id="qrCode"></div>
                    </div>
                    
                    <div class="crypto-note">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Please send exactly the amount specified above to this Bitcoin address. Transactions may take 10-30 minutes to confirm on the blockchain.
                    </div>
                    
                    <div class="mt-4">
                        <h4>Payment Status</h4>
                        <div class="alert alert-warning" role="alert">
                            <i class="fas fa-clock me-2"></i>
                            Waiting for payment confirmation. Your deposit will be credited once we receive 3 confirmations on the Bitcoin network.
                        </div>
                    </div>
                </div>
                
                <!-- Wire Transfer Section -->
                <div class="dashboard-card wire-transfer-section" id="wireTransferSection">
                    <h3 class="card-title">Wire Transfer Instructions</h3>
                    
                    <div class="wire-info">
                        <h4 class="mb-3">Bank Account Details</h4>
                        <div class="wire-detail">
                            <div class="wire-label">Bank Name:</div>
                            <div class="wire-value">Global Trust Bank</div>
                        </div>
                        <div class="wire-detail">
                            <div class="wire-label">Account Name:</div>
                            <div class="wire-value">Tenex Investments LLC</div>
                        </div>
                        <div class="wire-detail">
                            <div class="wire-label">Account Number:</div>
                            <div class="wire-value">7501 9845 6321 0452</div>
                        </div>
                        <div class="wire-detail">
                            <div class="wire-label">Routing Number:</div>
                            <div class="wire-value">021000021</div>
                        </div>
                        <div class="wire-detail">
                            <div class="wire-label">SWIFT Code:</div>
                            <div class="wire-value">GTBUS33</div>
                        </div>
                        <div class="wire-detail">
                            <div class="wire-label">Address:</div>
                            <div class="wire-value">123 Financial District, New York, NY 10005</div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        For wire transfers of $100,000 or more, we require you to contact your Investment Manager to ensure proper handling and personalized service.
                    </div>
                    
                    <button class="contact-manager-btn" id="contactManagerBtn">
                        <i class="fas fa-user-tie me-1"></i> Contact Investment Manager
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const depositAmountInput = document.getElementById('depositAmount');
            const cryptoMethodCard = document.getElementById('cryptoMethodCard');
            const wireMethodCard = document.getElementById('wireMethodCard');
            const cryptoMethodRadio = document.getElementById('cryptoMethod');
            const wireMethodRadio = document.getElementById('wireMethod');
            const cryptoPaymentSection = document.getElementById('cryptoPaymentSection');
            const wireTransferSection = document.getElementById('wireTransferSection');
            const copyWalletBtn = document.getElementById('copyWalletBtn');
            const walletAddress = document.getElementById('walletAddress');
            const contactManagerBtn = document.getElementById('contactManagerBtn');
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notificationText');
            
            // Generate QR Code
            function generateQRCode() {
                const qrCodeElement = document.getElementById('qrCode');
                const walletAddr = walletAddress.textContent;
                
                // Clear previous QR code
                qrCodeElement.innerHTML = '';
                
                // Generate new QR code
                QRCode.toCanvas(qrCodeElement, walletAddr, {
                    width: 180,
                    height: 180,
                    margin: 1,
                    color: {
                        dark: '#000000',
                        light: '#FFFFFF'
                    }
                }, function(error) {
                    if (error) console.error(error);
                });
            }
            
            // Show notification
            function showNotification(message) {
                notificationText.textContent = message;
                notification.classList.add('show');
                
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 3000);
            }
            
            // Update payment method based on amount
            function updatePaymentMethod() {
                const amount = parseFloat(depositAmountInput.value) || 0;
                
                // Reset active states
                cryptoMethodCard.classList.remove('active');
                wireMethodCard.classList.remove('active');
                cryptoMethodRadio.checked = false;
                wireMethodRadio.checked = false;
                cryptoPaymentSection.style.display = 'none';
                wireTransferSection.style.display = 'none';
                
                if (amount > 0) {
                    if (amount < 100000) {
                        // Show crypto option for amounts under $100,000
                        cryptoMethodCard.classList.add('active');
                        cryptoMethodRadio.checked = true;
                        cryptoPaymentSection.style.display = 'block';
                    } else {
                        // Show wire transfer for amounts $100,000 and above
                        wireMethodCard.classList.add('active');
                        wireMethodRadio.checked = true;
                        wireTransferSection.style.display = 'block';
                    }
                }
            }
            
            // Copy wallet address to clipboard
            copyWalletBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(walletAddress.textContent).then(() => {
                    copyWalletBtn.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
                    copyWalletBtn.classList.add('copied');
                    showNotification('Wallet address copied to clipboard!');
                    
                    setTimeout(() => {
                        copyWalletBtn.innerHTML = '<i class="fas fa-copy me-1"></i> Copy Address';
                        copyWalletBtn.classList.remove('copied');
                    }, 2000);
                }).catch(err => {
                    console.error('Failed to copy: ', err);
                    showNotification('Failed to copy address');
                });
            });
            
            // Contact manager button
            contactManagerBtn.addEventListener('click', function() {
                showNotification('Your investment manager will contact you shortly.');
                
                // In a real application, this would trigger an email or notification
                setTimeout(() => {
                    alert('Thank you for your request. Your investment manager will contact you within 24 hours to assist with your wire transfer.');
                }, 500);
            });
            
            // Manual payment method selection
            cryptoMethodRadio.addEventListener('change', function() {
                if (this.checked) {
                    cryptoMethodCard.classList.add('active');
                    wireMethodCard.classList.remove('active');
                    cryptoPaymentSection.style.display = 'block';
                    wireTransferSection.style.display = 'none';
                }
            });
            
            wireMethodRadio.addEventListener('change', function() {
                if (this.checked) {
                    wireMethodCard.classList.add('active');
                    cryptoMethodCard.classList.remove('active');
                    wireTransferSection.style.display = 'block';
                    cryptoPaymentSection.style.display = 'none';
                }
            });
            
            // Initialize
            depositAmountInput.addEventListener('input', updatePaymentMethod);
            generateQRCode();
            
            // Admin functionality to update wallet address (simplified for demo)
            // In a real application, this would be a secure admin interface
            console.log('Admin: To update the Bitcoin wallet address, modify the walletAddress element content and call generateQRCode() again.');
        });
    </script>
</body>
</html>