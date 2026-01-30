<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { width: 100%; max-width: 600px; margin: 20px auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
        .header { background-color: #1a237e; color: #ffffff; padding: 20px; text-align: center; }
        .content { padding: 30px; }
        .field-label { font-weight: bold; color: #555; font-size: 14px; text-transform: uppercase; margin-bottom: 5px; }
        .field-value { font-size: 16px; color: #333; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #eee; }
        .footer { background-color: #f9f9f9; padding: 15px; text-align: center; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="margin:0;">Nouvelle demande : {{ $subject }}</h2>
        </div>
        <div class="content">
            <div class="field-label">Full Name</div>
            <div class="field-value">{{ $fullName}}</div>

            <div class="field-label">Email Address</div>
            <div class="field-value">{{ $emailUser }}</div>

            <div class="field-label">Phone Number</div>
            <div class="field-value">{{ $phoneUser }}</div>

            <div class="field-label">Reason for Inquiry</div>
            <div class="field-value">{{ $subject }}</div>

            <div class="field-label">Message Body</div>
            <div class="field-value" style="border-bottom: none; line-height: 1.5;">
                {{ $messageText }}
            </div>
        </div>
        <div class="footer">
            Cette demande a été envoyée depuis le site web de votre agence de véhicules d'occasion.
        </div>
    </div>
</body>
</html>