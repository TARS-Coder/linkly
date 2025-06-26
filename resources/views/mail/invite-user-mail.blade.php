<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>You're Invited</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: white; border-radius: 8px; padding: 20px;">
        <h2 style="color: #333;">Hello {{ $user->name }},</h2>

        <p>You’ve been invited to join <strong>{{ config('app.name') }}</strong> as an admin for a company.</p>

        <p>Click the button below to accept the invitation and set your password:</p>

        <p style="text-align: center;">
            <a href="{{ route('user.invite.accept', $user->invite_token) }}"
               style="background-color: #1d4ed8; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Accept Invitation
            </a>
        </p>

        <p>If you did not expect this invitation, you can ignore this email.</p>

        <p>Thanks,<br>{{ config('app.name') }} Team</p>
    </div>
</body>
</html>
