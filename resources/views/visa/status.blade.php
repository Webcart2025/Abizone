<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Application Status</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .status-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .status-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .status-icon.pending { color: #ffc107; }
        .status-icon.completed { color: #28a745; }
        .status-icon.failed { color: #dc3545; }
        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .detail-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .detail-label {
            font-weight: bold;
            color: #6c757d;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #212529;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="status-header">
            <div class="status-icon {{ $payment->payment_status }}">
                @if($payment->payment_status === 'pending')
                    <i class="fas fa-clock"></i>
                @elseif($payment->payment_status === 'completed')
                    <i class="fas fa-check-circle"></i>
                @else
                    <i class="fas fa-times-circle"></i>
                @endif
            </div>
            <h1>Visa Application Status</h1>
            <p>Application ID: {{ $payment->visaApplication->id }}</p>
        </div>

        <div class="details-grid">
            <div class="detail-item">
                <div class="detail-label">Visa Type</div>
                <div class="detail-value">{{ $payment->visa_type }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Amount</div>
                <div class="detail-value">INR {{ number_format($payment->amount, 2) }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Duration</div>
                <div class="detail-value">{{ $payment->duration_days }} Days</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Travel Date</div>
                <div class="detail-value">{{ $payment->travel_date->format('d M Y') }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Payment Status</div>
                <div class="detail-value">{{ ucfirst($payment->payment_status) }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Transaction ID</div>
                <div class="detail-value">{{ $payment->transaction_id ?? 'Pending' }}</div>
            </div>
        </div>
    </div>
</body>
</html> 