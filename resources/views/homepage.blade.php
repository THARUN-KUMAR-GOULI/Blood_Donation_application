<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
</head>

<body>
    @include('components/header')

    <div class="image-container">
        <img src="/images/blood_drop.webp" alt="blood_drop">
        <div class="overlay-text">
            <h1>Donate Blood</h1>
        </div>
        <div class="overlay-text1">
        <h1>Save Lives</h1>
        </div>
    </div>

    <div class="information">
        <div class="overview">
            <h1>Overview</h1>
            <p>Donating the blood is a voluntary procedure that can help saving other's lives. There are several type of blood donation. Each type helps meet different medical needs.</p>
        </div>

        <div class="eligibility">
            <h1>Eligibility</h1>
            <p>To be eligible to donate blood, you must be :</p>

            <ul>
                <li>In good health.</li>
                <li>At least 17 or 18 years old, while there is no legal upper age limit.</li>
                <li>At least 50 kilograms weight.</li>
                <li>Get plenty of sleep the night before you plan to donate.</li>
                <li>Eat healthy meal before your donation, drink plenty of water.</li>
            </ul>
        </div>
    </div>

    <div class="donation">

        <div class="heart"></div>
        <div>
            <h1>Fuel</h1>
            <h1>groundbaking</h1>
            <h1>blood donations</h1>
        </div>

        <div>
            <h3>Your donation powers the future of donation</h3>
            <h3>And helps save lives.</h3>
        </div>

        <div>
            <button>Give Now</button>
        </div>
    </div>

    @include('components/footer')
</body>

</html>