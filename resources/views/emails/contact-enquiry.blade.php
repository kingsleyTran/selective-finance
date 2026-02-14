<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Enquiry</title>
</head>
<body style="font-family: sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h2 style="color: #0A3F24; margin-bottom: 20px;">Contact Enquiry</h2>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: 600;">Name</td>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee;">{{ $name }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: 600;">Email</td>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee;"><a href="mailto:{{ $email }}">{{ $email }}</a></td>
        </tr>
        <tr>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: 600;">Phone</td>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee;">{{ $phone }}</td>
        </tr>
        @if($service)
        <tr>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: 600;">Service</td>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee;">{{ $service }}</td>
        </tr>
        @endif
        @if($amount)
        <tr>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: 600;">Loan Amount</td>
            <td style="padding: 8px 0; border-bottom: 1px solid #eee;">{{ $amount }}</td>
        </tr>
        @endif
    </table>

    @if($enquiryMessage)
    <h3 style="color: #0A3F24; margin-top: 24px;">Message</h3>
    <p style="background: #f8f9fa; padding: 16px; border-radius: 8px;">{{ $enquiryMessage }}</p>
    @endif

    <p style="margin-top: 24px; font-size: 12px; color: #666;">This enquiry was submitted via the website contact form.</p>
</body>
</html>
