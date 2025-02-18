<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link rel="stylesheet" href="/css/donorSuccess.css">
</head>
<body>
    <div class="success-container">
        <div class="success-box">
            <h2>Registration successful</h2>
            <h3>{{ session('success_name') }}</h3>
            <p>{{ session('success_msg') }}</p>
            <a href="{{ route('dashboard') }}" class="btn">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>