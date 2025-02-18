<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
</head>

<body>

<!-- @include('components/header') -->

<header class="header">
        <div class="logo">
            <span id="name">Tharun</span>
            <br>
            <span id="caption">Blood Organisation</span>
        </div>

        <div class="buttons">
            
            <form action="{{ route('signup') }}" method="get">
                <button type="submit" class="btn">Signup</button>
            </form>

            <form action="{{ route('homepage') }}" method="get">
                <button type="submit" class="btn">Home</button>
            </form>
        </div>
    </header>


<div class="login-container">

        <div class="login-form">

        @if(session('error'))
    <p class="errormsg" style="color:red;">{{ session('error') }}</p>
@endif

@if(session('success'))
    <p class="successmsg" style="color:green;">{{ session('success') }}</p>
@endif
            <h1>Login</h1>
            <form action="{{ route('login')}}" method="POST">

            @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
                
            </form>
            <p class="signup-link">Don't have an account? <a href="/signup">Sign up here</a></p>
        </div>

        <div class="additional-section">
            <h2>Why Join Us?</h2>
            <ul>
                <li><i class="fas fa-heartbeat"></i> Save lives by donating blood regularly.</li>
                <li><i class="fas fa-users"></i> Be a part of a community of life savers.</li>
                <li><i class="fas fa-bullhorn"></i> Get updates on blood donation drives and events.</li>
                <li><i class="fas fa-gift"></i> Receive rewards for regular contributions.</li>
            </ul>
        </div>
    </div>


    @include('components/footer')
</body>

</html>
