<?php
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Require header 
    require_once 'partials/header.php';

    // Get users info from database
    $stmt = $db->prepare('SELECT * FROM users WHERE is_admin = 0');
    $stmt->execute(array());
    $users = $stmt->fetchAll();
?>
    <nav>
        <ul>
            <li><a href="#">Users</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section id="rate-us" class="page">
        <h1 class="text-primary my-1">Users</h1>
        <table>
            <thead>
                <tr>
                    <th class="text-primary">First Name</th>
                    <th class="text-primary">Last Name</th>
                    <th class="text-primary">Email</th>
                    <th class="text-primary">Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['firstname'] ?></td>
                    <td><?php echo $user['lastname'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php
    // Require footer
    require_once 'partials/header.php';
?>