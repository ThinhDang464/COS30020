<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Your Name" />
<title>TITLE</title>
</head>
<body>
    <h1>LAB05 -Task 2 - Sign Guestbook</h1>
    <?php 
    umask(0007);
    $dir = "../../data/lab05";
    if (!file_exists($dir)) {
        mkdir($dir, 02770);
    }
    if (isset($_POST["fname"])&&isset($_POST["lname"])){
        $fname = $_POST["fname"]; //obtain form fname data
        $lname = $_POST["lname"]; //obtain lname data
        $filename = "../../data/lab05/guestbook.txt";
        $handle = fopen($filename, "a"); //append mode
        $data = addslashes($fname.", ".$lname . "\n");//concat data with , and spacee delimiter
        fwrite($handle,$data);//write string to text file
        fclose($handle);
        echo "<p style='color:green'>Thank you for signing our guest book!!</p> ";
    }else{//no input
        echo "<p style='color:red'>You must enter first name and last name in the input form. USe the back button</p>";
    } 
    echo"<a href='guestbookshow.php'>Show Guest Book</a>";
    ?>
</body>
</html>