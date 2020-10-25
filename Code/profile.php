<?php
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Require header 
    require_once 'partials/header.php';

    // Get user info from database
    $stmt = $db->prepare('SELECT * FROM `users` WHERE id = ?');
    $stmt->execute(array($_SESSION['user_id']));
    $user = $stmt->fetch();
?>
    <nav>
        <ul>
            <li><a href="main.php">Start Venture</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="rate.php">Rate Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section class="page">
        <h1 class="text-primary my-1">Profile</h1>
        <h3><span class="text-primary py-1">First Name</span> <?php echo $user['firstname'] ?></h3>
        <h3><span class="text-primary py-1">First Name</span> <?php echo $user['lastname'] ?></h3>
        <h3><span class="text-primary py-1">Username</span> <?php echo $user['username'] ?></h3>
        <h3><span class="text-primary py-1">Email</span> <?php echo $user['email'] ?></h3>
    </section>
<?php
    // Require footer
    require_once 'partials/header.php';
?>