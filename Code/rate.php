<?php
    // flash message
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Require header 
    require_once 'partials/header.php';

    // Handle Rating
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
            'comment' => trim($_POST['comment']),
            'scale'   => trim($_POST['scale'])
        ];

        // insert into database
        $stmt = $db->prepare('INSERT INTO reviews (comment, scale, user_id) VALUES (?, ?, ?)');
        $stmt->execute(array($data['comment'], $data['scale'], $_SESSION['user_id']));

        header("Location: rate.php?msg=Review Sent");
    }
?>
    <nav>
        <ul>
            <li><a href="main.php">Start Venture</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="rate.php">Rate Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section id="rate-us" class="page">
        <h1 class="text-primary my-1">Rate Us</h1>
        <p id="success"><?php echo $msg ?></p>
        <form action="" method="post">
            <div class="form-group">
            <fieldset>
                <label><input type="radio" name="scale" value="1"> 1</label>
                <label><input type="radio" name="scale" value="2"> 2</label>
                <label><input type="radio" name="scale" value="3"> 3</label>
                <label><input type="radio" name="scale" value="4"> 4</label>
                <label><input type="radio" name="scale" value="5"> 5</label>
            </fieldset>
            </div>
            <div class="form-group">
                <label id="msg" for="message">Message</label>
                <textarea name="comment" id="message" cols="30" rows="10" placeholder="Leave us a comment"></textarea>
            </div>
            <button class="btn" type="submit">Send</button>
        </form>
    </section>
<?php
    // Require footer
    require_once 'partials/header.php';
?>