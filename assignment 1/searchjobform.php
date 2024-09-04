<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Search Job Vacancy" />
    <meta name="keywords" content="PHP, Search" />
    <meta name="author" content="Vu Gia Thinh Dang" />
    <title>Search Job Vacancy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href='index.php'>Home</a></li>
            <li><a href='postjobform.php'>Post a job vacancy</a></li>
            <li><a href='searchjobform.php'>Search for a job vacancy</a></li>
            <li class='about'><a href='about.php'>About this assignment</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="header-container">
        <button onclick="window.location.href='index.php'" class="home-button">← Home</button>
            <h1>Job Vacancy Posting System</h1>
        </div>

        <form action="searchjobprocess.php" method="get">
            <div class="form-text">
                <label for="jobTitle" class="label-text"><strong>Job Title:</strong></label>
                <input type="text" id="jobTitle" name="jobTitle"></input> <br>
            </div>

            <div class="form-radio">
                <label for="position"><strong>Position:</strong></label>
                <select id="position" name="position">
                    <option value="">Any</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select><br>
            </div>

            <div class="form-radio">
                <label for="contract"><strong>Contract:</strong></label>
                <select id="contract" name="contract">
                    <option value="">Any</option>
                    <option value="On-going">On-going</option>
                    <option value="Fixed term">Fixed term</option>
                </select><br>
            </div>

            <div class="form-radio">
                <label><strong>Application Type:</strong></label><br>
                <input type="checkbox" id="appPost" name="via[]" value="Post">
                <label for="appPost">Post</label>
                <input type="checkbox" id="appEmail" name="via[]" value="Email">
                <label for="appEmail">Email</label><br>
            </div>

            <div class="form-radio">
                <label for="location"><strong>Location:</strong></label>
                <select id="location" name="location">
                    <option value="">Any</option>
                    <option value="On site">On site</option>
                    <option value="Remote">Remote</option>
                </select><br>
            </div>
            
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>