<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Application Development :: Lab 3" />
<meta name="keywords" content="Web,programming" />
<title>Using if and while statements</title>
</head>
<body>
<?php
function is_leapyear($year) {
    return ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
}
?>
<h1>Web Programming - Lab 3</h1>
<form action="leapyear_selfcall.php" method="get">
    <label for="year">Year:</label>
    <input type="number" id="year" name="year" required>
    <input type="submit" value="Check for Leap Year">
</form>
<?php
if (isset($_GET["year"])) { // check if form data exists
    $year = $_GET["year"]; // obtain the form data
    if ($year > 0) { // check if $year is a positive number
        if ($year == round($year)) { // check if $year is an integer
            if (is_leapyear($year)) {
                echo "<p>$year is a leap year.</p>";
            } else {
                echo "<p>$year is not a leap year.</p>";
            }
        } else { // number is not an integer
            echo "<p>Please enter an integer.</p>";
        }
    } else { // number is not positive
        echo "<p>Please enter a positive integer for year.</p>";
    }
}
?>
</body>
</html>