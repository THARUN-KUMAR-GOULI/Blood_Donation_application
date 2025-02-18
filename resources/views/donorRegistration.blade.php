<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donar Registration</title>
    <link rel="stylesheet" href="/css/donorRegistration.css">
</head>
<body>
    
    <header>
        <button onClick="window.location.href='/dashboard'">Dashboard</button>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </header>

    @if(Auth::check())
    <div class="container">
        <h1>Blood Donor Registration</h1>

        <form action="{{ route('donor.register') }}" method="POST">
            @csrf

            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="bloodgroup">Blood Group :</label>
            <select name="bloodgroup" id="bloodgroup" required>
                <option value="#" disabled selected>---select blood group---</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required>

            <label for="city">City :</label>
            <select name="city" id="city" required>
                <option value="#" disabled selected>---select the city---</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Chennai">Chennai</option>
                <option value="Cochin">Cochin</option>
                <option value="Pune">Pune</option>
                <option value="Delhi">Delhi</option>
            </select>

            <label for="date">---Select Date---</label>
            <input type="date" name="date" id="date" required>

            <label for="time">Preferred Slot : :</label>
            <select name="time" id="time" required>
                <option value="#" disabled selected>---Select the slot---</option>
                <option value="mrng">8 Am - 12 Pm</option>
                <option value="aftrn">12Pm - 4 Pm</option>
                <option value="eveng">4 Pm - 8 Pm</option>
                <option value="any">Anytime</option>
            </select>

            <label class="checkbox-label">
                <input type="checkbox" name="terms" required>
                i agree to the terms and conditions.
            </label>

            <button type="submit">Register</button>
        </form>
    </div>
    @else
        <p>Please <a href="{{ route('login') }}">log in</a> to register as donor</p>
    @endif


    <script>
        let today = new Date().toISOString().split('T')[0];
        document.getElementById("date").setAttribute("min", today);
    </script>
</body>
</html>