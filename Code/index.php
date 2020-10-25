<?php
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Require header 
    require_once 'partials/header.php';
?>
    <header id="welcome" class="page">
        <img id="logo" src="./img/b.png" alt="logo">
        <h1 class="py-1 text-primary">Welcome to Buzlaysis</h1>
        <h4 class="py-1 text-primary">Challenging The Traditional Ways</h4>
        <p>
            The idea of Buzlysis came out in need to take advantage of this treasure that is data
            To help business owner for seeking the best place for the venture With the use of many
            aspects of technology that will be the perfect aid for Buzlysis such as Machine Learning.
        </p>
        <div class="btn-group">
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Signup</a>
        </div>
    </header>
<?php
    // Require footer
    require_once 'partials/header.php';
?>