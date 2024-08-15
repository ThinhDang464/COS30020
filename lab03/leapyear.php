<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Application Development :: Lab 1" />
<meta name="keywords" content="Web,programming" />
<title>Using if and while statements</title>
</head>
<body>
<?php
function is_leapyear($year){
    return ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0));
}
?>
<h1>Web Programming - Lab 3</h1>
<?php
if (isset ($_GET["year"])) { // check if form data exists
$year = $_GET["year"]; // obtain the form data
if ($year > 0) { // check if $num is a positive number
    if ($year == round ($year)) { // check if $num is an integer
        if (is_leapyear($year)){
            echo "<p>$year is a leap year.</p>";
        } else {
            echo "<p>$year is not a leap year.</p>";
        }
    } else { // number is not an integer
    echo "<p>Please enter an integer.</p>";
    }
    } else { // number is not positive
    echo "<p>Please enter a positive integer for year. </p>";
    }
    } else { // no input
    echo "<p>Please enter a year.</p>";
    }
    ?>
</body>
</html>