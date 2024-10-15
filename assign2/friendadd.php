<?php
session_start();
require_once("setup.php");

// Check if user is logged in
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

// Get user's profile name and ID
$sql = "SELECT friend_id, profile_name FROM $tableName1 WHERE friend_email = '$userEmail'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
$userId = $user['friend_id'];
$profileName = $user['profile_name'];

// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page, default is 1
$perPage = 10; // Number of items per page
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0; // Calculate the starting point for LIMIT clause

// Get total number of potential friends
$total_sql = "SELECT COUNT(*) as total FROM $tableName1 f 
              WHERE f.friend_id != $userId 
              AND f.friend_id NOT IN (
                  SELECT IF(friend_id1 = $userId, friend_id2, friend_id1)
                  FROM $tableName2
                  WHERE friend_id1 = $userId OR friend_id2 = $userId
              )";
$total_result = mysqli_query($conn, $total_sql);
$total = mysqli_fetch_assoc($total_result)['total'];
$pages = ceil($total / $perPage); // Calculate total number of pages

// Get list of users who are not friends with the current user (paginated) and count mutual friends
$sql = "SELECT f.friend_id, f.profile_name,
        (SELECT COUNT(*) FROM $tableName2 mf1
         WHERE (mf1.friend_id1 = f.friend_id OR mf1.friend_id2 = f.friend_id)
         AND (mf1.friend_id1 IN (SELECT IF(friend_id1 = $userId, friend_id2, friend_id1)
                                 FROM $tableName2 WHERE friend_id1 = $userId OR friend_id2 = $userId)
              OR mf1.friend_id2 IN (SELECT IF(friend_id1 = $userId, friend_id2, friend_id1)
                                    FROM $tableName2 WHERE friend_id1 = $userId OR friend_id2 = $userId))
        ) AS mutual_friends_count
        FROM $tableName1 f 
        WHERE f.friend_id != $userId 
        AND f.friend_id NOT IN (
            SELECT IF(friend_id1 = $userId, friend_id2, friend_id1)
            FROM $tableName2
            WHERE friend_id1 = $userId OR friend_id2 = $userId
        )
        ORDER BY f.profile_name
        LIMIT $start, $perPage";
$result = mysqli_query($conn, $sql);

// Explanation of the mutual friends count subquery:
// 1. It counts the number of rows in myfriends table where:
//    a. One of the friend IDs matches the potential friend's ID
//    b. The other friend ID is in the list of current user's friends
// 2. This effectively counts how many of the potential friend's friends are also friends with the current user

// Handle add friend action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_friend'])) {
    $friendToAdd = $_POST['add_friend'];
    
    // Add friend to myfriends table
    $sql = "INSERT INTO $tableName2 (friend_id1, friend_id2) VALUES ($userId, $friendToAdd)";
    mysqli_query($conn, $sql);
    
    // Update num_of_friends for both users
    $sql = "UPDATE $tableName1 SET num_of_friends = num_of_friends + 1 WHERE friend_id IN ($userId, $friendToAdd)";
    mysqli_query($conn, $sql);
    
    // Refresh the page to show updated list
    header("Location: friendadd.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends System - Add Friends</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>My Friend System</h1>
    <h2>Add Friends for <?php echo htmlspecialchars($profileName); ?></h2>

    <table>
        <tr>
            <th>Profile Name</th>
            <th>Mutual Friends</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['profile_name']); ?></td>
                <td><?php echo $row['mutual_friends_count']; ?></td>
                <td>
                    <form method="post" action="friendadd.php">
                        <input type="hidden" name="add_friend" value="<?php echo $row['friend_id']; ?>">
                        <input type="submit" value="Add as Friend">
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Pagination links -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page-1; ?>">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" <?php echo ($i == $page) ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $pages): ?>
            <a href="?page=<?php echo $page+1; ?>">Next</a>
        <?php endif; ?>
    </div>

    <p><a href="friendlist.php">Friend List</a></p>
    <p><a href="logout.php">Log Out</a></p>
</body>
</html>