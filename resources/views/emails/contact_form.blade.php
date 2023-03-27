<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 14px">
    <h2>New Contact Form Submission</h2>
    <hr style="border: none; border-top: 2px solid">
    <p><strong>Name of sender:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong> {{ $contact->message }}</p>
    <hr style="border: none; border-top: 2px solid">
    <p style="font-size: 12px;">This message was sent from the contact form on Celessentials website.</p>
</body>
</html>