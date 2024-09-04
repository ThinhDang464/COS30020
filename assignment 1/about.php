<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development assignment 1" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Vu Gia Thinh Dang" />
<title>Job Vacancy Posting System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="postjobform.php">Post a job vacancy</a></li>
            <li><a href="searchjobform.php">Search for a job vacancy</a></li>
            <li class="about"><a href="about.php">About this assignment</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="header-container">
            <button onclick="window.location.href='index.php'" class="home-button">← Home</button>
            <h1>About Assignment 1</h1>
        </div>
        <div class="declaration">
            <h3>About:</h3>
            <div>
                <ul>
                    <li> PHP version: <?php echo phpversion(); ?> </li>
                    <br><li> Requirements: I completed all requirements from basic to advance. </li>
                    <br><li>Advanced features:</li>
                    <p>&nbsp;- Used associative arrays to display read-in lines as single objects, improving data organization and access.</p>
                    <p>&nbsp;- Implemented custom sorting function using usort() to order job listings by closing date.</p>
                    <p>&nbsp;- Utilized regular expressions (preg_match()) for robust form validation.</p>
                </ul>
            </div>
        </div>
        <div class="declaration">
            <h3>Discussion Contribution:</h3>
            <div class="discussion-images">
                <figure>
                    <img src="images/Picture1.png" alt="Discussion contribution 1" />
                    <figcaption>Figure 1: Object type in PHP</figcaption>
                </figure>
                <figure>
                    <img src="images/Picture2.png" alt="Discussion contribution 2" />
                    <figcaption>Figure 2: Mercury permission</figcaption>
                </figure>
                <figure>
                    <img src="images/Picture3.png" alt="Discussion contribution 3" />
                    <figcaption>Figure 3: Advanced Search</figcaption>
                </figure>
            </div>
        </div>
    </div>
</body>
</html>