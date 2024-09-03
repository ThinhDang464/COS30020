<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Search Job Vacancy" />
    <meta name="keywords" content="PHP, Search" />
    <meta name="author" content="Vu Gia Thinh Dang" />
    <title>Search Job Vacancy</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Job Vacancy Posting System</h1>

    <form action="searchjobprocess.php" method="get">
        <label for="jobTitle">Job Title:</label>
        <input type="text" id="jobTitle" name="jobTitle"></input> <br>

        <label for="position">Position:</label>
        <select id="position" name="position">
            <option value="">Any</option>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
        </select><br>

        <label for="contract">Contract:</label>
        <select id="contract" name="contract">
            <option value="">Any</option>
            <option value="On-going">On-going</option>
            <option value="Fixed term">Fixed term</option>
        </select><br>

        <label>Application Type:</label><br>
        <input type="checkbox" id="appPost" name="via[]" value="Post">
        <label for="appPost">Post</label>
        <input type="checkbox" id="appEmail" name="via[]" value="Email">
        <label for="appEmail">Email</label><br>

        <label for="location">Location:</label>
        <select id="location" name="location">
            <option value="">Any</option>
            <option value="On site">On site</option>
            <option value="Remote">Remote</option>
        </select><br>
        
        <input type="submit" value="Search">
    </form>

    <p><a href="index.php">Return to Home</a></p>
</body>
</html>