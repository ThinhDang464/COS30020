<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Your Name" />
<title>TITLE</title>
</head>
<body>
<h1>Web Programming - Lab08</h1>
<?php
    require_once ("settings.php");
    // complete your answer based on Lecture 8 slides 26 and 44

    //connect to server
    $conn = @mysqli_connect($host, $user, $pswd) or die("No connection: ". mysqli_connect_error());
    @mysqli_select_db($conn, $dbnm) or die ("No connection to database: ". mysqli_error($conn));

    //retrieve data
    $query = "SELECT * FROM cars";
    $data = mysqli_query($conn, $query);

    //table display
    echo "<table border = '1'>";
    echo "<tr><th>Car</th><th>Make</th><th>Model</th><th>Price</th></tr>";
    while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr><td>" . $row['car_id'] . "</td><td>" . $row['make'] . "</td><td>"
      . $row['model'] . "</td><td>" . $row["price"] . "</td></tr>";
    }
    echo "</table>";
?>
</body>
</html>