<?php
    // flash message
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Get POST Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get form data
        $data = [
            'username'      => trim($_POST['username']),
            'password'      => trim($_POST['password']),
            'username_err'  => '',
            'password_err'  => ''
        ];

        // validate data
        if(empty($data['username'])) {
            $data['username_err'] = 'Enter a username or email';
        } else {
            $stmt = $db->prepare('SELECT * FROM `users` WHERE username = ?');
            $stmt->execute(array($data['username']));
            $user = $stmt->fetch();

            if (count($user) != 0) {
                if (empty($data['username_err']) && empty($data['password_err'])) {
                    // check if password is correct
                    if (password_verify($data['password'], $user['password'])) {
                        $_SESSION['user_id']    = $user['id'];
                        $_SESSION['username']    = $user['username'];

                        // if admin redirect to admin panel otherwise to user main page
                        if($user['is_admin']) {
                            header("Location: admin.php");
                        } else {
                            header("Location: main.php");
                        }
                    } else {
                        $data['password_err'] = 'incorrect password';
                    }
                }
            } else {
                $data['username_err'] = 'User does not exist';
            }
        }
    } else {
        // Get form data
        $data = [
            'username'      => '',
            'password'      => '',
            'username_err'  => '',
            'password_err'  => ''
        ];
    }
?>
    <section id="login" class="page">
        <div id="icons">
            <a href="index.php"><span class="fa fa-info-circle fa-3x"></span></a>
            <a href="#login"><span class="fa fa-user fa-3x"></span></a>
            <a href="#login"><span class="fa fa-cogs fa-3x"></span></a>
        </div>
        <h1>Login</h1>
        <p id="success"><?php echo $msg ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="username" value="<?php echo $data['username'] ?>" required>
                <small class="input-error"><?php echo $data['username_err'] ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password" value="<?php echo $data['password'] ?>" required>
                <small class="input-error"><?php echo $data['password_err'] ?></small>
            </div>
            <button class="btn" type="submit">login</button>
            <small>Don't Have an Account ? <a href="register.php">Signup</a></small>
        </form>
    </section>
<?php
    // Require footer
    require_once 'partials/header.php';
?>