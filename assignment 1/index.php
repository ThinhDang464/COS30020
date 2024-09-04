<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />
<meta name="description" content="Web application development assignment 1" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Vu Gia Thinh Dang" />
<title>Job Vacancy Posting System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    //nav bar element
    echo "<nav>";
    echo "<ul>";
    echo "<li><a href='index.php'>Home</a></li>";
    echo "<li><a href='postjobform.php'>Post a job vacancy</a></li>";
    echo "<li><a href='searchjobform.php'>Search for a job vacancy</a></li>";
    echo "<li class='about'><a href='about.php'>About this assignment</a></li>";
    echo "</ul>";
    echo "</nav>";


    //Info box
    echo "<div class='container'>";
    //Info section
    echo "<h1>Job Vacancy Posting System</h1>";
    echo "<section class='info'>";
    echo "<p><strong>Name:</strong> Vu Gia Thinh Dang</p>";
    echo "<p><strong>Student ID:</strong> 103177240</p>";
    echo "<p><strong>Email:</strong> <a href='mailto:103177240@student.swin.edu.au'>103177240@student.swin.edu.au</a></p>";
    echo "</section>";
    
    //Declaration
    echo "<section class='declaration'>";
    echo "<p><strong>Declaration</strong></p>";
    echo "<p>I declare that this assignment is my individual work. I have not worked collaboratively, nor have I copied from any other student's work or from any other source.</p>";
    echo "</section>";
    echo "</div>"
?>
</body>
</html>