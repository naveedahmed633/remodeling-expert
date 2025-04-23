<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Request Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; background-color: #f5f7fa; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05); overflow: hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background-color: #2fa8fb; padding: 30px 20px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 26px;">Thank You, {{ $emailData['name'] }}!</h1>
                            <p style="margin-top: 10px; color: #e9f7ff; font-size: 15px;">We’ve successfully received your project request</p>
                        </td>
                    </tr>

                    <!-- Intro -->
                    <tr>
                        <td style="padding: 30px 25px 10px 25px; color: #333333; font-size: 16px;">
                            <p style="margin: 0 0 15px;">We appreciate your interest in working with <strong>Remodeling Expert</strong>. Below is a summary of the information you provided:</p>
                        </td>
                    </tr>

                    <!-- Services -->
                    @if (!empty($emailData['services']['titles']))
                    <tr>
                        <td style="padding: 15px 25px;">
                            <h3 style="margin: 0 0 5px; color: #2fa8fb; font-size: 17px;">Selected Services</h3>
                            <p style="margin: 0; color: #555;">{{ implode(', ', $emailData['services']['titles']) }}</p>
                        </td>
                    </tr>
                    @endif

                    <!-- Subcategories -->
                    @if (!empty($emailData['subcategories']['titles']))
                    <tr>
                        <td style="padding: 15px 25px;">
                            <h3 style="margin: 0 0 5px; color: #2fa8fb; font-size: 17px;">Focus Areas</h3>
                            <p style="margin: 0; color: #555;">{{ implode(', ', $emailData['subcategories']['titles']) }}</p>
                        </td>
                    </tr>
                    @endif

                    <!-- Remodel Type -->
                    @if (!empty($emailData['remodelType']))
                    <tr>
                        <td style="padding: 15px 25px;">
                            <h3 style="margin: 0 0 5px; color: #2fa8fb; font-size: 17px;">Remodel Type</h3>
                            <p style="margin: 0; color: #555;">{{ ucfirst($emailData['remodelType']) }}</p>
                        </td>
                    </tr>
                    @endif

                    <!-- Requirements -->
                    @if (!empty($emailData['subchild']['titles']))
                    <tr>
                        <td style="padding: 15px 25px;">
                            <h3 style="margin: 0 0 5px; color: #2fa8fb; font-size: 17px;">Additional Requirements</h3>
                            <p style="margin: 0; color: #555;">{{ implode(', ', $emailData['subchild']['titles']) }}</p>
                        </td>
                    </tr>
                    @endif

                    <!-- Contact Info -->
                    <tr>
                        <td style="padding: 30px 25px 10px 25px;">
                            <p style="font-size: 14px; color: #777; margin: 0 0 5px;">For urgent queries, reach us at:</p>
                            <p style="margin: 0; font-size: 15px;"><strong>Email:</strong> <a href="mailto:support@remodelingexpert.com" style="color: #2fa8fb;">support@remodelingexpert.com</a></p>
                            <p style="margin: 0; font-size: 15px;"><strong>Phone:</strong> +1 (415) 555-0123</p>
                        </td>
                    </tr>

                    <!-- Button -->
                    <tr>
                        <td align="center" style="padding: 30px 25px;">
                            <a href="https://remodelingexpert.com" style="background-color: #2fa8fb; color: #ffffff; text-decoration: none; padding: 12px 28px; border-radius: 6px; font-size: 16px; font-weight: 600;">Explore More Services</a>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f0f4f7; padding: 15px; text-align: center; font-size: 13px; color: #777;">
                            &copy; 2025 Remodeling Expert. All rights reserved.<br>
                            <a href="https://remodelingexpert.com/unsubscribe" style="color: #2fa8fb; text-decoration: none;">Unsubscribe</a>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
