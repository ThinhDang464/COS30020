<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Your Name" />
<title>Standard Palindrome Self</title>
</head>
<body>
    <h1>LAB04 Task 2 - STANDARD PALINDROME</h1>
    <form action="standardpalindromeself.php" method="post">
        <input type="text" name="text" required>
        <input type="submit" value="Check for Standard Palindrome">
    </form> 
    <?php
        if (isset($_POST["text"])) {
            $str = $_POST["text"];
            $lowerStr = strtolower($str);
            $processedStr = str_replace(array(',', '.', '?', '!', ';', ':', '-', '_', '(', ')', '[', ']', '{', '}', '/', '\\', '"', "'"), "", $lowerStr);  // Remove punctuation
            $finishedStr = preg_replace('/\s+/', '', $processedStr);  // Remove whitespace
            $reverseStr = strrev($finishedStr);
            if (strcmp($finishedStr, $reverseStr) === 0) {
                echo "<p>The text you entered '" . htmlspecialchars($str) . "' is a standard palindrome!</p>";
            } else {
                echo "<p>The text you entered '" . htmlspecialchars($str) . "' is not a standard palindrome!</p>";
            }
        }
    ?>
</body>
</html>