<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="assignment 1" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Vu Gia Thinh Dang" />
<title>Post Job Vacancy</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    echo "<nav>";
    echo "<ul>";
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='postjobform.php'>Post a job vacancy</a></li>";
    echo "<li><a href='searchjobform.php'>Search for a job vacancy</a></li>";
    echo "<li class='about'><a href='about.php'>About this assignment</a></li>";
    echo "</ul>";
    echo "</nav>";
?>

<h1>Post Job Vacancy</h1>

<!-- No validation, perform regex and validation in postjobprocess.php -->

<form action="postjobprocess.php" method="post">
    <label for="positionId">Position ID:</label>
    <input type="text" id="positionId" name="positionId" required><br>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>

    <label for="closingDate">Closing Date:</label>
    <input type="text" id="closingDate" name="closingDate" value="<?php echo date('d/m/y'); ?>" required><br>

    <label>Position:</label><br>
    <input type="radio" id="fullTime" name="position" value="FullTime" required>
    <label for="fullTime">Full Time</label><br>
    <input type="radio" id="partTime" name="position" value="PartTime">
    <label for="partTime">Part Time</label><br>

    <label>Contract:</label><br>
    <input type="radio" id="onGoing" name="contract" value="On-going" required>
    <label for="onGoing">On-going</label><br>
    <input type="radio" id="fixedTerm" name="contract" value="Fixed term">
    <label for="fixedTerm">Fixed term</label><br>

    <label>Location:</label><br>
    <input type="radio" id="onSite" name="location" value="On site" required>
    <label for="onSite">On site</label><br>
    <input type="radio" id="remote" name="location" value="Remote">
    <label for="remote">Remote</label><br>

    <label>Accept Application by:</label><br>
    <input type="checkbox" id="post" name="via" value="Post">
    <label for="post">Post</label><br>
    <input type="checkbox" id="email" name="via" value="Email">
    <label for="email">Email</label><br>

    <input type="submit" value="Submit">
</form>

<p><a href="index.php">Return to Home</a></p>

</body>
</html>