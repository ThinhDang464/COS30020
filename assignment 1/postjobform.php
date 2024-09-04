<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="assignment 1" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Vu Gia Thinh Dang" />
<title>Post Job Vacancy</title>
<link rel="stylesheet" href="style.css">
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
<div class="container">
    <div class="header-container">
        <button onclick="window.location.href='index.php'" class="home-button">← Home</button>
        <h1>Post Job Vacancy</h1>
    </div>

    <!-- No validation, perform regex and validation in postjobprocess.php -->

    <form action="postjobprocess.php" method="post">
        <div class="form-text">
            <label for="positionId" class="label-text"><strong>Position ID:</strong></label>
            <input type="text" id="positionId" name="positionId"><br>

            <label for="title" class="label-text"><strong>Title:</strong></label>
            <input type="text" id="title" name="title"><br>

            <label for="description" class="label-text"><strong>Description:</strong></label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br>

            <label for="closingDate" class="label-text"><strong>Closing Date:</strong></label>
            <input type="text" id="closingDate" name="closingDate" value="<?php echo date('d/m/y'); ?>" required><br>
        </div>

        <div class="form-radio">
            <label><strong>Position:</strong></label><br>
            <input type="radio" id="fullTime" name="position" value="Full Time">
            <label for="fullTime">Full Time</label><br>
            <input type="radio" id="partTime" name="position" value="Part Time">
            <label for="partTime">Part Time</label><br>
        </div>

        <div class="form-radio">
            <label><strong>Contract:</strong></label><br>
            <input type="radio" id="onGoing" name="contract" value="On-going">
            <label for="onGoing">On-going</label><br>
            <input type="radio" id="fixedTerm" name="contract" value="Fixed term">
            <label for="fixedTerm">Fixed term</label><br>
        </div>  

        <div class="form-radio">
            <label><strong>Location:</strong></label><br>
            <input type="radio" id="onSite" name="location" value="On site">
            <label for="onSite">On site</label><br>
            <input type="radio" id="remote" name="location" value="Remote">
            <label for="remote">Remote</label><br>
        </div>

        <div class="form-radio">
            <label><strong>Accept Application by:</strong></label><br>
            <input type="checkbox" id="post" name="via[]" value="Post">
            <label for="post">Post</label><br>
            <input type="checkbox" id="email" name="via[]" value="Email">
            <label for="email">Email</label><br>
        </div>
        <input type="submit" value="Submit">
    </form>

</div>
</body>
</html>