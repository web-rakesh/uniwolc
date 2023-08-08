<!DOCTYPE html>
<html>
<head>
    <title>Education Partner Form Submission</title>
</head>
<body>
    <h1>Education Partner Form Submission</h1>
    <p><strong>Country:</strong> {{ $formData['getCountry']->name }}</p>
    <p><strong>School Name:</strong> {{ $formData['school_name'] }}</p>
    <p><strong>Name:</strong> {{ $formData['name'] }}</p>
    <p><strong>Email:</strong> {{ $formData['email'] }}</p>
    <p><strong>Phone No.:</strong> {{ '+'.$formData['phone_code'].$formData['phone_number'] }}</p>
    <p><strong>Contact Title:</strong> {{ $formData['contact_title'] }}</p>
    <p><strong>Applied:</strong> {{ $formData['is_apply'] == 'on' ? 'Yes' : 'No' }}</p>
    <p><strong>Refer Name:</strong> {{ $formData['refer_name']  }}</p>
    <p><strong>Refer email:</strong> {{ $formData['refer_email']  }}</p>
    <p><strong>Comments:</strong> {{ $formData['comment']  }}</p>
</body>
</html>
