<?php
    session_start();
    require_once("setup.php");
    $errors = [];
    $inputEmail = '';
    $inputPassword = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputEmail = trim($_POST['email']);
        $inputPassword = ($_POST['password']);
    
        if (empty($inputEmail)) {
            $errors[] = "Email is required";
        }
        if (empty($inputPassword)) {
            $errors[] = "Password is required";
        }

        // Connect to the database
        $conn = mysqli_connect($host, $user, $pass, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //check email and password
        $sql = "SELECT * FROM $tableName1 WHERE friend_email = '$inputEmail'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            if ($inputPassword === $row['password']) {
                // Login successful
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $inputEmail;
                $_SESSION['user_id'] = $row['friend_id'];
                header("Location: friendlist.php");
                exit();
            } else {
                $errors[] = "Invalid password";
            }
        } else {
            $errors[] = "Email not found";
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends System - Login</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="navigation">
        <h1>My Friends System</h1>
        <ul class="nav">
            <li class="nav-link"><a href="index.php">Home</a></li>
            <li class="nav-link"><a href="signup.php">Sign Up</a></li>
            <li class="nav-link"><a href="login.php">Login</a></li>
            <li class="nav-link"><a href="about.php">About</a></li>
        </ul>
    </div>

    <div class="login-form">
        <h2>Login</h2>
        <?php
        if (!empty($errors)) {
            echo "<div class='errors'>";
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
            echo "</div>";
        }
        ?>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($inputEmail); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-actions">
                <input type="submit" value="Login">
                <input type="button" value="Clear" class="clear-button" onclick="window.location.href='login.php';">
            </div>
        </form>
        <p><a href="index.php">Return to Home</a></p>
    </div>
</body>
</html>