<?php
    //sanitizing input from user
    function sanitizeInput($input){
        $input = trim($input); //rmove whitespace begin n end
        $input = stripslashes($input); //remove backslashes 
        $input = htmlspecialchars($input);//convert special char to html equi
        return $input;
    }
    //Check if submitted fields exist
    if (isset($_POST['positionId']) && isset($_POST['title'])&&isset($_POST['description'])
    && isset($_POST['closingDate']) && isset($_POST['position']) && isset($_POST['contract'])
    && isset($_POST['location']) && isset($_POST['via'])) {
        //set data var
        $positionId = $_POST['positionId'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $closingDate = $_POST['closingDate'];
        $position = $_POST['position'];
        $contract = $_POST['contract'];
        $location = $_POST['location'];

    } else {
        //missing input
        echo "<p>Please fill in all the input fields!</p>";
        echo "<p><a href='index.php'>Return to Home</a></p>";
        echo "<p><a href='postjobform.php'>Return to Home</a></p>";

    }
?>