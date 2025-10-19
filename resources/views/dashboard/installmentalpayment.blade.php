<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installmental Payment - TheSpace</title>
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

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .payment-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            background-color: var(--primary-blue);
            border-radius: 10px;
            border: 1px solid var(--border-color);
        }

        .payment-card {
            background-color: var(--primary-blue);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .payment-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-blue);
        }

        .payment-card h3 {
            color: var(--accent-blue);
            margin-bottom: 20px;
            font-size: 1.4rem;
        }

        .wallet-address {
            background-color: var(--light-blue);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
        }

        .wallet-address p {
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: #a8c6e5;
        }

        .address-box {
            display: flex;
            align-items: center;
            background-color: var(--dark-blue);
            padding: 12px 15px;
            border-radius: 6px;
            margin-top: 10px;
        }

        .address-text {
            flex-grow: 1;
            font-family: monospace;
            font-size: 0.95rem;
            word-break: break-all;
            color: var(--text-color);
        }

        .copy-btn {
            background-color: var(--accent-blue);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            margin-left: 10px;
            font-size: 0.9rem;
        }

        .copy-btn:hover {
            background-color: #004080;
        }

        .copy-btn.copied {
            background-color: var(--success-green);
        }

        .upload-area {
            border: 2px dashed var(--border-color);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
            background-color: rgba(10, 45, 77, 0.3);
        }

        .upload-area:hover {
            border-color: var(--accent-blue);
            background-color: rgba(10, 45, 77, 0.5);
        }

        .upload-area i {
            font-size: 3rem;
            color: var(--accent-blue);
            margin-bottom: 15px;
        }

        .upload-area p {
            margin-bottom: 0;
            color: #a8c6e5;
        }

        .upload-area input {
            display: none;
        }

        .preview-container {
            margin-top: 20px;
            display: none;
        }

        .preview-image {
            max-width: 100%;
            max-height: 300px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }

        .remove-btn {
            background-color: var(--danger-red);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        .payment-instructions {
            background-color: var(--light-blue);
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            border-left: 4px solid var(--accent-blue);
        }

        .payment-instructions h4 {
            color: var(--accent-blue);
            margin-bottom: 15px;
        }

        .payment-instructions ol {
            padding-left: 20px;
        }

        .payment-instructions li {
            margin-bottom: 10px;
            color: #a8c6e5;
        }

        .submit-btn {
            background-color: var(--success-green);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: block;
            margin: 40px auto 0;
            width: 200px;
        }

        .submit-btn:hover {
            background-color: #00a844;
            transform: translateY(-2px);
        }

        .submit-btn:disabled {
            background-color: #666;
            cursor: not-allowed;
            transform: none;
        }

        .alert {
            border-radius: 8px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .payment-container {
                padding: 15px;
            }

            .payment-card {
                padding: 20px;
            }

            .address-box {
                flex-direction: column;
                align-items: flex-start;
            }

            .copy-btn {
                margin-left: 0;
                margin-top: 10px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-blue);">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-robot me-2"></i>TheSpace
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.portfolio')}}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="installmental">Installmental Payment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="payment-container">
        <div class="payment-header">
            <h1>Installmental Payment</h1>
            <p class="lead">Complete your payment in installments using any of the payment methods below</p>
        </div>

        <!-- Payment Methods -->
        <div class="row">
            <!-- Bitcoin Payment -->
            <div class="col-lg-4 col-md-6">
                <div class="payment-card">
                    <h3><i class="fab fa-bitcoin me-2"></i> Bitcoin Payment</h3>
                    <div class="wallet-address">
                        <p>Send exactly: <strong>30% of your investment deposit.00</strong></p>
                        <p>Bitcoin Wallet Address:</p>
                        <div class="address-box">
                            <span class="address-text" id="btc-address">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</span>
                            <button class="copy-btn" data-address="btc-address">
                                <i class="fas fa-copy me-1"></i> Copy
                            </button>
                        </div>
                    </div>
                    <div class="upload-area" id="btc-upload">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Click to upload payment screenshot</p>
                        <p class="small">(PNG, JPG, or PDF - Max 5MB)</p>
                        <input type="file" id="btc-file" accept="image/*,.pdf">
                    </div>
                    <div class="preview-container" id="btc-preview">
                        <img src="" alt="Payment Screenshot" class="preview-image">
                        <button class="remove-btn mt-2">
                            <i class="fas fa-trash me-1"></i> Remove
                        </button>
                    </div>
                </div>
            </div>

            <!-- Ethereum Payment -->
            <div class="col-lg-4 col-md-6">
                <div class="payment-card">
                    <h3><i class="fab fa-ethereum me-2"></i> Ethereum Payment</h3>
                    <div class="wallet-address">
                        <p>Send exactly: <strong>30% of your investment deposit.00</strong></p>
                        <p>Ethereum Wallet Address:</p>
                        <div class="address-box">
                            <span class="address-text"
                                id="eth-address">0x742d35Cc6634C0532925a3b8D4B5e3a3A3a3a3a3</span>
                            <button class="copy-btn" data-address="eth-address">
                                <i class="fas fa-copy me-1"></i> Copy
                            </button>
                        </div>
                    </div>
                    <div class="upload-area" id="eth-upload">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Click to upload payment screenshot</p>
                        <p class="small">(PNG, JPG, or PDF - Max 5MB)</p>
                        <input type="file" id="eth-file" accept="image/*,.pdf">
                    </div>
                    <div class="preview-container" id="eth-preview">
                        <img src="" alt="Payment Screenshot" class="preview-image">
                        <button class="remove-btn mt-2">
                            <i class="fas fa-trash me-1"></i> Remove
                        </button>
                    </div>
                </div>
            </div>

            <!-- USDT Payment -->
            <div class="col-lg-4 col-md-6">
                <div class="payment-card">
                    <h3><i class="fas fa-coins me-2"></i> USDT Payment</h3>
                    <div class="wallet-address">
                        <p>Send exactly: <strong>30% of your investment deposit.00</strong></p>
                        <p>USDT (TRC20) Wallet Address:</p>
                        <div class="address-box">
                            <span class="address-text" id="usdt-address">TYVJ7uJ7uJ7uJ7uJ7uJ7uJ7uJ7uJ7uJ7uJ7</span>
                            <button class="copy-btn" data-address="usdt-address">
                                <i class="fas fa-copy me-1"></i> Copy
                            </button>
                        </div>
                    </div>
                    <div class="upload-area" id="usdt-upload">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Click to upload payment screenshot</p>
                        <p class="small">(PNG, JPG, or PDF - Max 5MB)</p>
                        <input type="file" id="usdt-file" accept="image/*,.pdf">
                    </div>
                    <div class="preview-container" id="usdt-preview">
                        <img src="" alt="Payment Screenshot" class="preview-image">
                        <button class="remove-btn mt-2">
                            <i class="fas fa-trash me-1"></i> Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Instructions -->
        <div class="payment-instructions">
            <h4>Payment Instructions</h4>
            <ol>
                <li>Select your preferred payment method from the options above</li>
                <li>Copy the wallet address by clicking the "Copy" button</li>
                <li>Send the exact amount specified to the wallet address</li>
                <li>After making the payment, upload a screenshot as proof of payment</li>
                <li>Click the "Submit Payment" button to complete the process</li>
                <li>Your payment will be verified within 24 hours and reflected in your account</li>
            </ol>
        </div>

        <!-- Submit Button -->
        <button class="submit-btn" id="submit-payment" disabled>
            <i class="fas fa-paper-plane me-2"></i> Submit Payment
        </button>

        <!-- Success Alert -->
        <div class="alert alert-success d-none" id="success-alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Success!</strong> Your payment has been submitted and is pending verification.
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Copy wallet address functionality
            const copyButtons = document.querySelectorAll('.copy-btn');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const addressId = this.getAttribute('data-address');
                    const addressElement = document.getElementById(addressId);
                    const addressText = addressElement.textContent;
                    
                    // Copy to clipboard
                    navigator.clipboard.writeText(addressText).then(() => {
                        // Visual feedback
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
                        this.classList.add('copied');
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.classList.remove('copied');
                        }, 2000);
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                        alert('Failed to copy address. Please copy manually.');
                    });
                });
            });
            
            // File upload functionality
            const uploadAreas = document.querySelectorAll('.upload-area');
            const fileInputs = document.querySelectorAll('input[type="file"]');
            const previewContainers = document.querySelectorAll('.preview-container');
            const removeButtons = document.querySelectorAll('.remove-btn');
            const submitButton = document.getElementById('submit-payment');
            
            // Handle file selection
            fileInputs.forEach((input, index) => {
                input.addEventListener('change', function(e) {
                    if (this.files && this.files[0]) {
                        const file = this.files[0];
                        
                        // Check file size (5MB limit)
                        if (file.size > 5 * 1024 * 1024) {
                            alert('File size exceeds 5MB limit. Please choose a smaller file.');
                            this.value = '';
                            return;
                        }
                        
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            const preview = previewContainers[index];
                            const img = preview.querySelector('.preview-image');
                            
                            img.src = e.target.result;
                            preview.style.display = 'block';
                            
                            // Enable submit button if at least one file is uploaded
                            checkSubmitButton();
                        }
                        
                        reader.readAsDataURL(file);
                    }
                });
            });
            
            // Handle click on upload area
            uploadAreas.forEach((area, index) => {
                area.addEventListener('click', function() {
                    fileInputs[index].click();
                });
            });
            
            // Handle remove button
            removeButtons.forEach((button, index) => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    
                    const preview = previewContainers[index];
                    const fileInput = fileInputs[index];
                    
                    preview.style.display = 'none';
                    fileInput.value = '';
                    
                    // Check if submit button should be disabled
                    checkSubmitButton();
                });
            });
            
            // Check if submit button should be enabled
            function checkSubmitButton() {
                let hasFile = false;
                
                fileInputs.forEach(input => {
                    if (input.files.length > 0) {
                        hasFile = true;
                    }
                });
                
                submitButton.disabled = !hasFile;
            }
            
            // Handle form submission
            submitButton.addEventListener('click', function() {
                // In a real application, you would send the data to a server here
                // For demonstration, we'll just show a success message
                
                const successAlert = document.getElementById('success-alert');
                successAlert.classList.remove('d-none');
                
                // Scroll to the alert
                successAlert.scrollIntoView({ behavior: 'smooth' });
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    fileInputs.forEach(input => {
                        input.value = '';
                    });
                    
                    previewContainers.forEach(preview => {
                        preview.style.display = 'none';
                    });
                    
                    submitButton.disabled = true;
                }, 3000);
            });
        });
    </script>
</body>

</html>