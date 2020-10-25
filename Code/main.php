<?php
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Require header 
    require_once 'partials/header.php';

    // Require Navbar
    require_once 'partials/navbar.php';
?>
    <section id="main" class="page">
        <h4 class="py-1 text-primary">Challenging The Traditional Ways</h4>
        <h1 class="py-1">Welcome to Buzlysis</h1>
        <p>You Are Only a Few Answes Away From your Successful Venture</p>
        <div class="btn-group">
            <a href="#venture-type" class="btn">Start Your Venture</a>
        </div>
    </section>
    <section id="venture-type" class="page">
        <h3 class="py-1">Select Your Venture Type</h3>
        <div class="btn-group">
            <a href="#city-choose" class="btn">Coffee shop</a>
            <a class="btn-disabled">Beautique</a>
            <a class="btn-disabled">Resturant</a>
            <a class="btn-disabled">Candy Store</a>
        </div>
    </section>
    <section id="city-choose" class="page">
        <h3 class="py-1">Select The City</h3>
        <div class="btn-group">
            <a href="#street-choose" class="btn">Riyadh</a>
            <a class="btn-disabled">Jeddah</a>
            <a class="btn-disabled">Dammam</a>
            <a class="btn-disabled">Alkobar</a>
            <a class="btn-disabled">Medina</a>
            <a class="btn-disabled">Mecca</a>
            <a class="btn-disabled">Aljubail</a>
        </div>
    </section>
    <section id="street-choose" class="page">
        <h3 class="py-1">Select The Desired Road</h3>
        <div class="btn-group">
            <a class="btn-disabled">King Abdullah Road</a>
            <a class="btn-disabled">King Fahad Road</a>
            <a class="btn-disabled">Abu baker Road</a>
            <a class="btn-disabled">Princess Turki Bin Abdulaziz Al Awaal Road</a>
            <a class="btn-disabled">Othman Bin Affan Road</a>
            <a class="btn-disabled">Khaliad Bin Alwaleed Road</a>
            <a href="#result" class="btn">Anas Bin Malek Road</a>
        </div>
    </section>
    <section id="result" class="page">
        <h1 class="py-1">The Result </h1>
        <iframe src="https://www.google.com/maps/d/embed?mid=1DKhDyW9ZG9gNslk2zgqMvk-umicI9Gtc" width="640" height="480"></iframe>
        <nav class="my-1">
            <ul>
                <li><a class="btn" href="profile.php">Profile</a></li>
                <li><a class="btn" href="rate.php">Rate Us</a></li>
                <li><a class="btn" href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </section>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <script>
        // Smooth Scrolling
        $('.btn').on('click', function (event) {
            if (this.hash !== '') {
                event.preventDefault();
                const hash = this.hash;
                $('html, body').animate(
                    { scrollTop: $(hash).offset().top },
                    800
                );
            }
        });
    </script>
<?php
    // Require footer
    require_once 'partials/header.php';
?>