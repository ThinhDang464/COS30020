<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAb08</title>
</head>

<body>
  <h1>Display VIP members</h1>
  <?php
  require_once("settings.php");
  $tablename = "vipmembers";

  // connect to db
  $conn = @mysqli_connect($host, $user, $pswd) or die("Connection error: " . mysqli_connect_error());
  @mysqli_select_db($conn, $dbnm) or die("Database selection error: " . mysqli_error($conn));

  // check table exist
  $checkQuery = "SHOW TABLES LIKE '$tablename'";
  $checkResult = mysqli_query($conn, $checkQuery);

  if (mysqli_num_rows($checkResult) > 0) {
    // yes table

    // query and retrieve data
    $query = "SELECT * FROM $tablename";
    $results = mysqli_query($conn, $query);

    if (mysqli_num_rows($results) > 0) {
      // display data in table
      echo "<table border='1'>";
      echo "<tr><th>Member ID</th><th>First Name</th><th>Last Name</th></tr>";
      while ($row = mysqli_fetch_assoc($results)) {
        echo "<tr><td>" . $row['member_id'] . "</td><td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</tr>";
      }
      echo "</table>";
    } else {
      echo "<p>No data available in the $tablename table.</p>";
    }

    // free result
    mysqli_free_result($results);
  } else {
    echo "<p>Table $tablename does not exist.</p>";
  }

  // close connection and free results
  mysqli_free_result($checkResult);
  mysqli_close($conn);
  ?>
</body>
</html>