<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message from THESPACE</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background-color: #667eea;
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
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>THESPACE</h1>
            <p>Administrative Message</p>
        </div>
        <div class="email-body">
            <div class="email-content">
                {!! nl2br(e($content)) !!}
            </div>
            <div class="divider"></div>
            <p style="font-size: 14px; color: #6c757d;">
                This is an automated message from the THESPACE administration team. Please do not reply to this email.
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

