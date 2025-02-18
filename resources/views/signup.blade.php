
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Blood Organization</title>
    <link rel="stylesheet" href="/css/signup.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
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
            <form action="{{ route('login') }}" method="get">
                <button type="submit" class="btn">Login</button>
            </form>
            <form action="{{ route('homepage') }}" method="get">
                <button type="submit" class="btn">Home</button>
            </form>
        </div>
    </header>
<!-- <h1>dahsboard</h1> -->
    <div class="container">
    
        <div class="form-wrapper">
            <h1>Signup</h1>

    <form class="form" action="{{ route('signup') }}" method="POST">

    @csrf
            <!-- <form action="/signup" method="POST"> -->
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="blood-group">Blood Group</label>
                    <select id="blood-group" name="blood-group" required>
                        <option value="">Select</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <p style="color:red">{{$message}}</p>
                    @enderror
                </div>

                <div class="check-box">
                <input type="checkbox" required>
                    <label for="agree">I agree to terms and conditions.</label>
                    
                </div>

                @if(session('success'))
                <p class="successmsg" style="color:green">{{!! session('success') !!}}</p>
                @endif
                <button type="submit">Signup</button>
            </form>
            
            <p>Already have an account? <a href="login">Sign In</a></p>
        </div>

    </div>

    @include('components/footer')
</body>

</html>
