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
<nav>
    <ul>
        <li><a href='index.php'>Home</a></li>
        <li><a href='postjobform.php'>Post a job vacancy</a></li>
        <li><a href='searchjobform.php'>Search for a job vacancy</a></li>
        <li class='about'><a href='about.php'>About this assignment</a></li>
    </ul>
</nav>
<?php
    //sanitizing input from user
    function sanitizeInput($input){
        $input = trim($input); //rmove whitespace begin n end
        $input = stripslashes($input); //remove backslashes 
        $input = htmlspecialchars($input);//convert special char to html equi
        return $input;
    }

    //Form validation
    function validateForm($data){
        $errors = array();

        //Check positionID
        if (!preg_match('/^ID\d{3}$/', $data['positionId'])){
            $errors[] = "Position ID should start with ID + 3 digits.";
        }

        //Check TITLE
        if (!preg_match('/^[a-zA-Z0-9 ,\.!]{1,10}$/', $data['title'])){
            $errors[] = "Title can only have maximum 10 alphanumeric characters including spaces, coma, period, and exclamation point.";
        }

        //Check description
        if (strlen($data['description']) > 250) {
            $errors[] = "Description can only contain a maximum of 250 characters.";
        }

        //Check CLosing date
        if (!preg_match('/^\d{1,2}\/\d{1,2}\/\d{2}$/', $data['closingDate'])) { //matches one or 2 digits, last one 2 dig only
            $errors[] = "Closing Date must be in the format 'dd/mm/yy'.";
        }

        return $errors;
    }

    //Check Uniqe Position ID
    function isIdUnique($id){
        $filename="../../data/jobs/positions.txt";
        if (file_exists($filename)){
            $filedata = file_get_contents($filename);
            if (strpos($filedata, $id)!==false){
                return false;
            }
        }
        return true;
    }

    //Save job posting into txt on merc server
    function saveJobVacancy($data){
       $dir = "../../data/jobs";
       $filename = $dir . "/positions.txt";
       
       //format data
       $row = implode("\t", $data) . "\n"; //append \t after each ele of array then a final \n at last element

       //create direc and write data to file
       if (!is_dir($dir)){
        mkdir($dir, 0777, true); //full permisison for testing with recursive protection enable incase folder no exist
       }

       file_put_contents($filename, $row, FILE_APPEND | LOCK_EX); //best concurrency pratice

       //Success msg
       echo"<div class='header-container'>";
       echo "<button onclick=\"window.location.href='postjobform.php'\" class='home-button'>← Post</button>";
       echo "<h1>Job has been posted!</h1>";
       echo "<button onclick=\"window.location.href='index.php'\" class='home-button'>Home →</button>";
    }

    echo"<div class='container'>";
    //Check if submitted fields exist
    if (isset($_POST['positionId']) && !empty($_POST['positionId']) &&
    isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['description']) && !empty($_POST['description']) &&
    isset($_POST['closingDate']) && !empty($_POST['closingDate']) &&
    isset($_POST['position']) && !empty($_POST['position']) &&
    isset($_POST['contract']) && !empty($_POST['contract']) &&
    isset($_POST['location']) && !empty($_POST['location']) &&
    isset($_POST['via']) && !empty($_POST['via'])) {
        //set data var with array key-value pair and validate
        $formData = array(
            'positionId' => sanitizeInput($_POST['positionId']),
            'title' => sanitizeInput($_POST['title']),
            'description' => sanitizeInput($_POST['description']),
            'closingDate' => sanitizeInput($_POST['closingDate']),
            'position' => sanitizeInput($_POST['position']),
            'contract' => sanitizeInput($_POST['contract']),
            'location' => sanitizeInput($_POST['location']),
            'viaPost' => in_array('Post', $_POST['via']) ? 'Post' : '', //2 separate column for application method
            'viaEmail' => in_array('Email', $_POST['via']) ? 'Email' : ''
        );

        $errors = validateForm($formData);

        //check position id
        if(!isIdUnique($formData['positionId'])){
            $errors[] = "Position ID must be unique!";
        }

        if (empty($errors)) {
            // No validation errors, proceed with saving the job vacancy
            saveJobVacancy($formData);
            // Display success message or redirect to a success page
        } else {
            // Display validation errors
            echo"<div class='header-container'>";
            echo "<button onclick=\"window.location.href='postjobform.php'\" class='home-button'>← Post</button>";
            echo "<h1>Error while posting job!</h1>";
            echo "<button onclick=\"window.location.href='index.php'\" class='home-button'>Home →</button>";
            echo "</div>";
            foreach ($errors as $error) {
                echo "<p class='no-jobs-message'>$error</p>";
            }
        }
    } else {
        //missing input
        echo"<div class='header-container'>";
        echo "<button onclick=\"window.location.href='postjobform.php'\" class='home-button'>← Post</button>";
        echo "<h1>Error while posting job!</h1>";
        echo "<button onclick=\"window.location.href='index.php'\" class='home-button'>Home →</button>";
        echo "</div>";
        echo "<p class='no-jobs-message'>Please fill in all the input fields!</p>";
    }
    echo "</div>";
?>
</body>
</html>