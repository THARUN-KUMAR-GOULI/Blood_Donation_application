
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<div class="code">
    <div>
    <h1>User ID : {{ Auth::user()->code }}</h1>
    </div>

    <div class="sliding-container">
        <div class="sliding-text">
            <p>Total Donations : 1234</p>
            <p>Donate Blood, Save Lives</p>
            <p>Blood Needed : O+</p>

            <p>Total Donations : 1234</p>
            <p>Donate Blood, Save Lives</p>
            <p>Blood Needed : O+</p>
        </div>
    </div>

    <div class="btn">
        <div>
            <button id="bookingsbtn">Bookings</button>

        </div>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</div>



<!-- @if($donors->isNotEmpty())
    <h2>Upcoming donations.</h2>
    <table>
        <thead>
            <tr>
                <tr>Date</tr>
                <tr>City</tr>
                <tr>Slot</tr>
            </tr>
        </thead>

        <tbody>
            @foreach($donors as $donor)
            <tr>
                <td>{{ $donor->date }}</td>
                <td>{{ $donor->city }}</td>
                <td>{{ $donor->time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No upcoming donations</p>
    @endif -->

    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <h2>BloodDonor</h2>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="#overview">Dashboard</a></li>
                    <li><a href="#requests">Blood Requests</a></li>
                    <li><a href="#donors">Donors</a></li>
                    <li><a href="#profile">Profile</a></li>
                    <li><a href="#logout">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                @if(Auth::check())
                <h1>Welcome, {{ Auth::user()->firstname }}</h1>
                
                
                @else
                
                <p>You are not login in.</p>
                @endif

                <div class="buttons">

                    <div>
                        <h3>Are you a :</h3>
                    </div>
                    <div class="donor1">
                        <form action="/donor" method="get">
                            
                            <button>Donor</button>
                        </form>
                    </div>

                    <div class="seeker">
                        <form action="/seeker" method="get">
                            <button>Seeker</button>
                        </form>
                    </div>
                </div>
            </header>

            <section id="overview" class="section">
                <h2>Overview</h2>
                <div class="cards">
                    <div class="card">
                        <h3>Total Donors</h3>
                        <p>120</p>
                    </div>
                    <div class="card">
                        <h3>Pending Requests</h3>
                        <p>15</p>
                    </div>
                    <div class="card">
                        <h3>Blood Units Available</h3>
                        <p>340</p>
                    </div>
                </div>
            </section>

            <section id="requests" class="section">
                <h2>Recent Blood Requests</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>Blood Group</th>
                            <th>Requested By</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#REQ101</td>
                            <td>A+</td>
                            <td>John Doe</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td>#REQ102</td>
                            <td>B-</td>
                            <td>Jane Smith</td>
                            <td>Approved</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>


    <!-- pop-up modal -->

    <div id="bookingmodal" class="modal">
        <div class="modal-content">
            <span class="closebtn">&times;</span>
            <h2>Your Bookings</h2>
            <table id="donortable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>City</th>
                        <th>Time</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>




    <script>
        $(document).ready(function(){
            $("#bookingsbtn").click(function(){
                $.ajax({
                    url: "{{ route('get.donors') }}",
                    method: "GET",
                    success: function(response){
                        let tableBody = $("#donortable tbody");
                        tableBody.empty();

                        if(response.length > 0){
                            response.forEach(donor => {
                                tableBody.append(`<tr>
                                    <td>${donor.date}</td>
                                    <td>${donor.city}</td>
                                    <td>${donor.time}</td>
                                </tr>`);
                            });
                        } else{
                            tableBody.append(`<tr><td colspan="3">No bookings found</td></tr>`);
                        }

                        $("#bookingmodal").fadeIn();
                    }
                });
            });

            $(".closebtn").click(function(){
                $("#bookingmodal").fadeOut();
            });

            $(window).click(function(event){
                if(event.target.id === "bookingmodal"){
                    $("#bookingmodal").fadeOut();
                }
            });
        });
    </script>


<style>
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(148, 96, 96, 0.5); }
        .modal-content { background: white; padding: 20px; margin: 10% auto; width: 50%; border-radius: 5px; text-align: center; }
        .closebtn { position: absolute; top: 100px; right: 55px; font-size: 20px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        /* th { background: #f4f4f4; } */
        
    </style>
</body>

</html>
