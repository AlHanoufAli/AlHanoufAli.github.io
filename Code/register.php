<?php
    // start session
    session_start();

    // connect to database
    require_once 'config.inc.php';

    // Get POST Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get form data
        $data = [
            'firstname'     => trim($_POST['firstname']),
            'lastname'      => trim($_POST['lastname']),
            'username'      => trim($_POST['username']),
            'email'         => trim($_POST['email']),
            'password'      => trim($_POST['password']),
            'password2'     => trim($_POST['password2']),
            'firstname_err' => '',
            'lastname_err'  => '',
            'username_err'  => '',
            'email_err'     => '',
            'password_err'  => '',
            'password2_err' => '',
        ];

        // Validate Data
        if(empty($data['firstname'])) {
            $data['firstname_err'] = 'First Name field cannot be empty';
        }

        if(empty($data['lastname'])) {
            $data['lastname_err'] = 'Last Name field cannot be empty';
        }

        if(empty($data['username'])){
            $data['username_err'] = 'Userrname field cannot be empty';
        } else if(strlen($data['username']) < 4) {
            $data['username_err'] = 'Username must be at least 4 charaters long';
        } else {
            $stmt = $db->prepare('SELECT * FROM `users` WHERE username = ? LIMIT 1');
            $stmt->execute(array($data['username']));
            $user = $stmt->fetchAll();
            
            if (count($user) > 0) {
                $data['username_err'] = 'Username already taken';
            }
        }

        if(empty($data['password'])) {
            $data['password_err'] = 'passwrod field cannot be empty';
        } else if (strlen($data['password']) < 6) {
            $data['password_err'] = 'Password must be at least 6 characters long';
        }

        if(empty($data['password2'])) {
            $data['password2_err'] = 'Confirm your password';
        }

        if($data['password'] != $data['password2']) {
            $data['password_err'] = 'Passwords does not match';
            $data['password2_err'] = 'Passwords does not match';
        }

        // Register new user
        if (empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['username_err']) && empty($data['password_err']) && empty($data['password2_err'])) {
            // encrypt password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            // save to database
            $stmt = $db->prepare('INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)');
            $stmt->execute(array($data['firstname'], $data['lastname'], $data['username'], $data['email'], $data['password']));

            // redirect
            header("Location: login.php?msg=Signup successfull Please login");
        }
    } else {
        // Get form data
        $data = [
            'firstname'     => '',
            'lastname'      => '',
            'username'      => '',
            'email'         => '',
            'password'      => '',
            'password2'     => '',
            'firstname_err' => '',
            'lastname_err'  => '',
            'username_err'  => '',
            'email_err'     => '',
            'password_err'  => '',
            'password2_err' => '',
        ];
    }
?>
    <section id="signup" class="page">
        <div id="icons">
            <a href="index.php"><span class="fa fa-info-circle fa-3x"></span></a>
            <a href="login.php"><span class="fa fa-user fa-3x"></span></a>
            <a href="login.php"><span class="fa fa-cogs fa-3x"></span></a>
        </div>
        <h1>Signup</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $data['firstname'] ?>" required>
                <small class="input-error"><?php echo $data['firstname_err'] ?></small>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $data['lastname'] ?>" required>
                <small class="input-error"><?php echo $data['lastname_err'] ?></small>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $data['username'] ?>" required>
                <small class="input-error"><?php echo $data['username_err'] ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $data['email'] ?>" required>
                <small class="input-error"><?php echo $data['email_err'] ?></small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $data['password'] ?>" required>
                <small class="input-error"><?php echo $data['password_err'] ?></small>
            </div>
            <div class="form-group">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2" placeholder="Confirm Password" value="<?php echo $data['password2'] ?>" required>
                <small class="input-error"><?php echo $data['password2_err'] ?></small>
            </div>
            <button class="btn" type="submit">Signup</button>
        </form>
    </section>
<?php
    // Require footer
    require_once 'partials/header.php';
?>