<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Friends System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navigation">
        <h1>My Friends System </h1>
        <ul class="nav">
        <li class="nav-link"><a href="index.php">Home</a></li>
        <li class="nav-link"><a href="signup.php">Sign Up</a></li>
        <li class="nav-link"><a href="login.php">Login</a></li>
        <li class="nav-link"><a href="about.php">About</a></li>
        </ul>
    </div>

    <div class="body">
        <h1>Assignment Home Page</h1>
        <p>Name: Vu Gia Thinh Dang</p>
        <p>Student ID: 103177240</p>
        <p>Email: <a class="email" href="mailto:103177240@student.swin.edu.au">103177240@student.swin.edu.au</a></p>
        <p>I declare that this assignment is my individual work. I have not worked collaboratively nor have i copied from any other student's work or from any other source.</p>
    </div>

    <div class="database">
        <h2>Status Messages</h2>
        <?php
            require_once("setup.php");
            //establishing connection
            $conn = @mysqli_connect($host, $user, $pass, $db);
            if (!$conn){ //no connection
                echo "<p>Database connection failure</p>";
                echo "<p>Error: " . mysqli_connect_error() . "</p>";
            } else {
                // Connection successful
                echo "<p>Database connection successful</p>";
            }

            //Create friends table
            $sqlFriends = "CREATE TABLE IF NOT EXISTS $tableName1 (
                friend_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                friend_email VARCHAR(50) NOT NULL UNIQUE,
                password VARCHAR(20) NOT NULL,
                profile_name VARCHAR(30) NOT NULL,
                date_started DATE NOT NULL,
                num_of_friends INT UNSIGNED
            )";

            //query execution
            if (mysqli_query($conn, $sqlFriends)) {
                echo "<p>Table '$tableName1' created successfully.</p>";
            } else {
                echo "<p>Error creating table: " . mysqli_error($conn) . "</p>";
            }

            //myfriends table
            $sqlMyFriends = "CREATE TABLE IF NOT EXISTS $tableName2 (
                friend_id1 INT NOT NULL,
                friend_id2 INT NOT NULL,
                CHECK (friend_id1 != friend_id2)
            )";

            //query execution
            if (mysqli_query($conn, $sqlMyFriends)) {
                echo "<p>Table '$tableName2' created successfully.</p>";
            } else {
                echo "<p>Error creating table: " . mysqli_error($conn) . "</p>";
            }

            //inserting into friends table
            $sqlInsertFriends = "INSERT INTO $tableName1 (friend_email, password, profile_name, date_started, num_of_friends)
            VALUES
            ('john@example.com', 'password1', 'John Doe', '2024-01-15', 4),
            ('maruy@example.com', 'password2', 'Jane Smith', '2024-02-15', 5),
            ('cat@example.com', 'password3', 'Michael Jordan', '2024-03-01', 4),
            ('tomtom@example.com', 'password4', 'Joey Im', '2024-04-22', 3),
            ('ivyivy@example.com', 'password5', 'Bao Tran', '2024-05-05', 2),
            ('emailemail@example.com', 'password6', 'Ivy Tran', '2024-06-20', 4),
            ('example@example.com', 'password7', 'David', '2024-07-10', 5),
            ('friend8@example.com', 'password8', 'Elle Kopi', '2024-08-08', 4),
            ('friend9@example.com', 'password9', 'Taylor Swift', '2024-09-30', 5),
            ('friend10@example.com', 'password10', 'David Gnob', '2024-10-20', 2)";
            
            $sqlCheck = "SELECT * FROM $tableName1";
            $result = mysqli_query($conn, $sqlCheck);
            if (mysqli_num_rows($result)>0){
                echo "<p>Table $tableName1 already has data</p>";
            } else {
                //insert sample data
                if (mysqli_query($conn, $sqlInsertFriends)){
                    echo "<p>Sample data has been inserted to '$tableName1' table</p>";
                } else {
                    echo "<p> Error inserting data: " . mysqli_error($conn) . "</p>";
                }
            }

            //inserting into myfriends table
            $sqlInsertMyFriends = "INSERT INTO myfriends (friend_id1, friend_id2)
                VALUES
                    (1, 2),
                    (2, 3),
                    (3, 4),
                    (4, 5),
                    (5, 6),
                    (6, 7),
                    (7, 8),
                    (8, 9),
                    (9, 10),
                    (10, 1),
                    (1, 3),
                    (2, 4),
                    (3, 5),
                    (4, 6),
                    (5, 7),
                    (6, 8),
                    (7, 9),
                    (8, 10),
                    (9, 1),
                    (10, 2)";
            $sqlCheck2 = "SELECT * FROM $tableName2";
            $result = mysqli_query($conn, $sqlCheck2);
            if (mysqli_num_rows($result)>0){
                echo "<p>Table $tableName2 already has data</p>";
            } else {
                //insert
                if (mysqli_query($conn, $sqlInsertMyFriends)){
                    echo "<p>Sample data has been inserted to '$tableName2' table</p>";
                } else{
                    echo "<p> Error inserting data: " . mysqli_error($conn) . "</p>";
                }
            }

            mysqli_close($conn);
        ?>
    </div>
</body>
</html>