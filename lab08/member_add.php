<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAb 08</title>
</head>

<body>
<h1>Member Added to Database!</h1>
<?php
//DB connect
require_once("settings.php");
$tablename = "vipmembers";
$conn = @mysqli_connect($host, $user, $pswd) or die("Connection failed: ".mysqli_connect_error());
@mysqli_select_db($conn, $dbnm) or die("Database connection failed: ".mysqli_error($conn));

//create table if no exist
$query = "CREATE TABLE IF NOT EXISTS $tablename (
    member_id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(40),
    lname VARCHAR(40),
    gender VARCHAR(1),
    email VARCHAR(40),
    phone VARCHAR(20)
)";

//run query
if (mysqli_query($conn, $query)){
    echo "<p>Table has been created</p>";
} else {
    echo "<p>Error: " . mysqli_error($conn). "</p>";
}

//Get form data
if (
    isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"]) && isset($_POST["email"]) && isset($_POST["phone"])
    && !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["gender"]) && !empty($_POST["email"]) && !empty($_POST["phone"])
  ) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    //duplicate check
    $duplicateQuery = "SELECT * FROM vipmembers WHERE fname = '$fname' AND lname = '$lname'";
    $duplicateResult = mysqli_query($conn, $duplicateQuery);

    if (mysqli_num_rows($duplicateResult) > 0) { // return num of rows
        echo "<p style='color:red'>A member with the same first name and last name already exists.</p>";
      } else {
        //insert
        $sql = "INSERT INTO vipmembers (fname, lname, gender, email, phone) VALUES ('$fname', '$lname', '$gender', '$email', '$phone')";
        if (mysqli_query($conn, $sql)){
            echo "<p>Data has been inserted</p>";
        } else {
            "<p>Error:" . mysqli_error($conn) . "</p>";
        }
    }
  } else {
    echo "<p>All fields need to be filled in!!</p>";
  }

  //close conn
  mysqli_close($conn);
?>
</body>
</html>