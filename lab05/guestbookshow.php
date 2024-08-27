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
<h1>Lab05 Task 2 - Guestbook Show</h1>
<?php
$filename = "../../data/lab05/guestbook.txt";
if (!file_exists($filename)) {
    echo "<p style='color:red'>Guestbook is empty!</p>";
    exit; //terminate current script
} else {
    $handle = fopen($filename,"r");
    $data = ""; //empty data will be filled in
    while (!feof($handle)){
        $line = stripslashes(fgets($handle));
        $data .= $line;
    }
    echo "<p style='color:green'>Guest book entries:</p>";
    echo "<pre>$data</pre>";
    fclose($handle);
}
?>
</body>
</html>