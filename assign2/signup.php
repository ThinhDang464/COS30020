<?php
    session_start();
    require_once("setup.php");
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = trim($_POST['email']);
        $profileName = trim($_POST['profileName']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        //validation
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Invalid email format";
        }

        if (empty($profileName) || !preg_match("/^[a-zA-Z]+$/", $profileName)){
            $errors[] = "Profile name must contain only letters and cannot be blank";
        }

        if (empty($password) || !preg_match("/^[a-zA-Z0-9]+$/", $password)) {
            $errors[] = "Password must contain only letters and numbers";
        }

        if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match";
        }

        //check duplicate email
        $conn = mysqli_connect($host, $user, $pass, $db);
        $checkEmail = mysqli_query($conn, "SELECT * FROM $tableName1 WHERE friend_email = '$email'");
        if (mysqli_num_rows($checkEmail) > 0) {
            $errors[] = "Email already exists";
        }

        //insert data if no error
        if (empty($errors)) {
            //insert new friend user
            $sql = "INSERT INTO $tableName1 
                (friend_email, password, profile_name, date_started, num_of_friends) 
                VALUES ('$email', '$password', '$profileName', CURDATE(), 0)";
            
            if (mysqli_query($conn, $sql)){
                $_SESSION['email'] = $email;
                $_SESSION['loggedIn'] = true;
                header("Location: friendadd.php");
                exit();
            } else {
                $errors[] = "Error creating account: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<div class="navigation">
    <h1>My Friends System </h1>
    <ul class="nav">
    <li class="nav-link"><a href="index.php">Home</a></li>
    <li class="nav-link"><a href="signup.php">Sign Up</a></li>
    <li class="nav-link"><a href="login.php">Login</a></li>
    <li class="nav-link"><a href="about.php">About</a></li>
    </ul>
</div>

<div class="registration-form">
<h1>Registration Page</h1>
<?php
if (!empty($errors)) {
    echo "<div class='errors'>";
    foreach ($errors as $error) {
        echo "<p class='error'>$error</p>";
    }
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Friends System</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <form method="post" action="signup.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="profileName">Profile Name</label>
            <input type="text" id="profileName" name="profileName" value="<?php echo isset($_POST['profileName']) ? htmlspecialchars($_POST['profileName']) : ''; ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <br>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
        </div>
        <br>
        <div class="form-actions">
            <input type="submit" value="Register">
            <input type="button" value="Clear" class="clear-button" onclick="window.location.href='signup.php';">
        </div>
    </form>
    </div>
</body>
</html>