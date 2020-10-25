<?php
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Require header 
    require_once 'partials/header.php';

    // Get users info from database
    $stmt = $db->prepare('SELECT * FROM reviews');
    $stmt->execute(array());
    $reviews = $stmt->fetchAll();
?>
    <nav>
        <ul>
            <li><a href="admin.php">Users</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section id="rate-us" class="page">
        <h1 class="text-primary my-1">Reviews</h1>
        <table>
            <thead>
                <tr>
                    <th class="text-primary">Comment</th>
                    <th class="text-primary">Scale</th>
                    <th class="text-primary">Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?php echo $review['comment'] ?></td>
                    <td><?php echo $review['scale'] ?></td>
                    <td><?php echo $review['created_at'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php
    // Require footer
    require_once 'partials/header.php';
?>