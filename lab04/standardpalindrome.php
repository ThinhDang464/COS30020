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
    <h1>Web Programming - Lab 4</h1>
    <?php
        if (isset($_POST["text"])) {
        $str = $_POST["text"];
        $lowerStr = strtolower($str);
        $processedStr = str_replace(array(',', '.', '?', '!', ';', ':', '-', '_', '(', ')', '[', ']', '{', '}', '/', '\\', '"', "'"), "", $lowerStr);  // Remove punctuation)
        $finishedStr = preg_replace('/\s+/', '', $processedStr);  // Remove whitespace
        $reverseStr = strrev($finishedStr);
        if (strcmp($finishedStr, $reverseStr)===0){
            echo "<p>The text you entered '$str' is a standard palindrome!</p>";
        } else {
            echo "<p>The text you entered '$str' is not a standard palindrome!</p>";
        }
        } else {
            echo "<p>Please enter into the input form</p>";
        }

?>
</body>
</html>