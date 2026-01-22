<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal Request - THESPACE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #0052a3 0%, #061b2e 100%);
            padding: 40px 30px;
            text-align: center;
            color: #ffffff;
        }
        .email-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .email-body {
            padding: 40px 30px;
        }
        .email-content {
            font-size: 16px;
            line-height: 1.8;
            color: #444444;
            margin-bottom: 30px;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #0052a3;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .info-box h3 {
            color: #0052a3;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
        }
        .info-value {
            color: #333333;
            font-weight: 500;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            background-color: #fff3cd;
            color: #856404;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .email-footer p {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #0052a3;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 20px;
        }
        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 30px 0;
        }
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                border-radius: 0;
            }
            .email-header, .email-body, .email-footer {
                padding: 25px 20px;
            }
            .email-header h1 {
                font-size: 24px;
            }
            .info-row {
                flex-direction: column;
            }
            .info-value {
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>THESPACE</h1>
            <p>Withdrawal Request Confirmation</p>
        </div>
        <div class="email-body">
            <div class="email-content">
                <p>Hello {{ $user->first_name }} {{ $user->last_name }},</p>
                <br>
                <p>We have received your withdrawal request. Your request is currently being processed and will be reviewed by our team.</p>
            </div>

            <div class="info-box">
                <h3>Withdrawal Details</h3>
                <div class="info-row">
                    <span class="info-label">Reference Number:</span>
                    <span class="info-value"><strong>{{ $transaction->reference }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Amount:</span>
                    <span class="info-value"><strong>${{ number_format(abs($transaction->amount), 2) }}</strong></span>
                </div>
                <div class="info-row">
                    <span class="info-label">Method:</span>
                    <span class="info-value">{{ ucfirst($transaction->method) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value">
                        <span class="status-badge">{{ ucfirst($transaction->status) }}</span>
                    </span>
                </div>
                <div class="info-row">
                    <span class="info-label">Request Date:</span>
                    <span class="info-value">{{ $transaction->created_at->format('M d, Y H:i A') }}</span>
                </div>
                @if($transaction->metadata && isset($transaction->metadata['wallet_address']))
                <div class="info-row">
                    <span class="info-label">Wallet Address:</span>
                    <span class="info-value" style="font-family: monospace; font-size: 12px;">{{ $transaction->metadata['wallet_address'] }}</span>
                </div>
                @endif
            </div>

            <div class="email-content">
                <p><strong>What happens next?</strong></p>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>Your withdrawal request is currently pending review</li>
                    <li>Our team will process your request within 24-48 hours</li>
                    <li>You will receive a confirmation email once your withdrawal is approved</li>
                    <li>If additional verification is required, we will contact you</li>
                </ul>
                <br>
                <p><strong>Important Notes:</strong></p>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>Please ensure all withdrawal details are correct</li>
                    <li>Processing times may vary depending on the withdrawal method</li>
                    <li>Network fees may apply for cryptocurrency withdrawals</li>
                </ul>
            </div>

            <div class="divider"></div>
            <p style="font-size: 14px; color: #6c757d;">
                If you did not initiate this withdrawal request, please contact our support team immediately.
            </p>
        </div>
        <div class="email-footer">
            <p><strong>THESPACE</strong></p>
            <p>Investment Platform</p>
            <p style="margin-top: 15px; font-size: 12px;">
                &copy; {{ date('Y') }} THESPACE. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
