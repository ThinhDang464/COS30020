<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="VDAng" />
<title>Guestbook Display</title>
</head>
<body>
    <h1>LAB06 Task 2 - Guestbook</h1>
    <?php
    $filename = "../../data/lab06/guestbook.txt";
    if (file_exists($filename)){
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $guestbook = array();

        foreach ($lines as $line){
            $parts = explode(",", $line);
            $guestbook[] = array('name' => $parts[0], 'email' => $parts[1]);
        }

        // Sort by name
        usort($guestbook, function($a, $b) { //a and b rep 2 elements from array
            return strcmp($a['name'], $b['name']);
        });

        // Display
        echo "<table border='1'>";
        echo "<tr><th>No.</th><th>Name</th><th>Email</th></tr>";
        foreach ($guestbook as $index => $entry) {
            $number = $index + 1; // Start numbering from 1
            echo "<tr>";
            echo "<td>" . $number . "</td>";
            echo "<td>" . htmlspecialchars($entry['name']) . "</td>";
            echo "<td>" . htmlspecialchars($entry['email']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No entries in the guestbook yet.</p>";
    }
    echo "<p><a href='guestbookform.php'>Add Another Visitor</a></p>";
    ?>
</body>
</html>