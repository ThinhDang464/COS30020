<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="VDAng" />
<title>TITLE</title>
</head>
<body>
    <h1>LAB06 Task 2 - Guestbook</h1>
    <?php 
    umask(0007);
    $dir = "../../data/lab06";
    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }
    if (isset($_POST["name"]) && isset($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["email"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $filename = "../../data/lab06/guestbook.txt";
        $emailList = array();
        $nameList = array();
        if (file_exists($filename)) {
            $dataRead = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($dataRead as $line){
                $parts = explode(",", $line);
                $nameList[] = $parts[0];  
                $emailList[] = $parts[1];  
            }
        }

        //check duplication
        if (in_array($email, $emailList) || in_array($name, $nameList)) {
            echo "<p style='color:red'>You have already signed the guestbook!</p>";
        } else {
            $newData =  $name . "," . $email . "\n";
            file_put_contents($filename, $newData, FILE_APPEND);
            echo "<p style='color:green'>Thank you for signing our guestbook!</p>";
        } 
    } else {
        echo "<p style='color:red'>You must enter your name and email address!<br> Use the Go Back button to return to the form!</p>";
    }
    echo "<p><a href='guestbookform.php'>Add Another Visitor</a></p>";
    echo "<p><a href='guestbookshow.php'>View Guest Book</a></p>";
    ?>
</body>
</html>