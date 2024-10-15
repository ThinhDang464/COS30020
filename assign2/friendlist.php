<?php
session_start();
require_once("setup.php");

// Check if user logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['email'];

// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user's profile name and number of friends
$sql = "SELECT friend_id, profile_name, num_of_friends FROM $tableName1 WHERE friend_email = '$userEmail'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$userId = $user['friend_id'];
$profileName = $user['profile_name'];
$numFriends = $user['num_of_friends'];

// Get user's friends list
//alias f 
$sql = "SELECT f.friend_id, f.profile_name 
        FROM $tableName1 f 
        INNER JOIN $tableName2 mf ON (f.friend_id = mf.friend_id2 OR f.friend_id = mf.friend_id1)
        WHERE (mf.friend_id1 = $userId OR mf.friend_id2 = $userId) AND f.friend_id != $userId
        ORDER BY f.profile_name";
$result = mysqli_query($conn, $sql);

// Handle unfriend
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['unfriend'])) {
    $friendToRemove = $_POST['unfriend'];
    
    // Remove friend from myfriends table
    $sql = "DELETE FROM $tableName2 WHERE (friend_id1 = $userId AND friend_id2 = $friendToRemove) OR (friend_id1 = $friendToRemove AND friend_id2 = $userId)";
    mysqli_query($conn, $sql);
    
    // Update num_of_friends for both users
    $sql = "UPDATE $tableName1 SET num_of_friends = num_of_friends - 1 WHERE friend_id IN ($userId, $friendToRemove)";
    mysqli_query($conn, $sql);
    
    // Refresh the page to show updated list
    header("Location: friendlist.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends System - Friend List</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>My Friend System</h1>
    <h2><?php echo htmlspecialchars($profileName); ?>'s Friend List Page</h2>
    <p>Total number of friends is <?php echo $numFriends; ?></p>

    <table>
        <tr>
            <th>Friend's Profile Name</th>
            <th>Unfriend</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['profile_name']); ?></td>
                <td>
                    <form method="post" action="friendlist.php">
                        <input type="hidden" name="unfriend" value="<?php echo $row['friend_id']; ?>">
                        <input type="submit" value="Unfriend">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <p><a href="friendadd.php">Add Friends</a></p>
    <p><a href="logout.php">Log Out</a></p>
</body>
</html>