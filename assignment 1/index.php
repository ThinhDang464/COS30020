<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development assignment 1" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Vu Gia Thinh Dang" />
<title>Job Vacancy Posting System</title>
<link rel="stylesheet" href="styles.css">
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
    
    //Info section
    echo "<h1>Job Vacancy Posting System</h1>";
    echo "<section class='info'>";
    echo "<p><strong>Name:</strong> Vu Gia Thinh Dang</p>";
    echo "<p><strong>Student ID:</strong> 103177240</p>";
    echo "<p><strong>Email:</strong> <a href='mailto:103177240@student.swin.edu.au'>103177240@swin.edu.au</a></p>";
    echo "</section>";
    
    //Declaration
    echo "<section class='declaration'>";
    echo "<p>I declare that this assignment is my individual work. I have not worked collaboratively, nor have I copied from any other student's work or from any other source.</p>";
    echo "</section>";
?>
</body>
</html>