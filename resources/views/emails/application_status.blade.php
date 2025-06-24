<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visa Application Status</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 90%; max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { background-color: #f2f2f2; padding: 10px; text-align: center; border-bottom: 1px solid #ddd; }
        .content { margin-top: 20px; }
        .footer { margin-top: 20px; font-size: 0.8em; text-align: center; color: #777; }
        .status-approved { color: #28a745; font-weight: bold; }
        .status-rejected { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Visa Application Status Update</h2>
        </div>
        <div class="content">
            <p>Dear {{ $application->first_name }},</p>
            <p>
                We are writing to inform you about an update on your recent visa application (ID: {{ $application->application_id }}).
            </p>
            <p>
                Your application status has been updated to: 
                <span class="status-{{ $application->status }}">{{ ucfirst($application->status) }}</span>.
            </p>
            
            @if(!empty($feedback))
            <p><strong>Feedback from our team:</strong></p>
            <p><em>{{ $feedback }}</em></p>
            @endif

            <p>
                If you have any questions, please don't hesitate to contact our support team.
            </p>
            <p>Thank you,<br>The Abizone Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Abizone. All rights reserved.</p>
        </div>
    </div>
</body>
</html> 