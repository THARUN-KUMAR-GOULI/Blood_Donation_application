<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeker Registration</title>
    <link rel="stylesheet" href="/css/seekerRegistration.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <h1>Blood Seeker Form</h1>

        <form id="seekerForm">
            @csrf

            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

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

            <button type="submit">Search</button>
        </form>
    </div>


    <!-- Donor pop-up Modal -->

    <div id="donorModal" class="modal">
        <div class="modal-content">
            <h2>Available Donors In your city </h2>

            <table id="donorTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>City</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>


    @else
        <p>Please <a href="{{ route('login') }}">log in</a> to register as donor</p>
    @endif


    <script>
        $(document).ready(function(){
            $("#seekerForm").submit(function(event){
                event.preventDefault();

                let city = $("#city").val();
                let csrfToken = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('search.donors') }}",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    },
                    data: {city: city},
                    success: function(response){
                        let tableBody = $("#donorTable tbody");
                        tableBody.empty();

                        if(response.length > 0){
                            response.forEach(donor => {
                                tableBody.append(`<tr>
                                    <td>${donor.name}</td>
                                    <td>${donor.age}</td>
                                    <td>${donor.email}</td>
                                    <td>${donor.contact}</td>
                                    <td>${donor.city}</td>
                                </tr>`)
                            });
                        } else{
                            tableBody.append(`<tr><td colspan="5">No donors found in this city</td></tr>`);
                        }

                        $("#donorModal").fadeIn();
                    }
                });
            });

            $(".closebtn").click(function(){
                $("#donorModal").fadeOut();
            });

            $(window).click(function(event){
                if(event.target.id === "donorModal"){
                    $("#donorModal").fadeOut();
                }
            });
        })
    </script>

</body>
</html>