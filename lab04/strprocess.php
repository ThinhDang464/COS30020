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
            $pattern = "/^[A-Za-z ]+$/"; //pattern matches a string that contains only letter 
            //uppercase or lowercase and spaces
            if(preg_match($pattern, $str)){ //check if string matches with regular expression
                $ans ="";
                $len = strlen($str); //length of the string
                for ($i = 0; $i < $len; $i++){
                    $letter = substr ($str, $i, 1); //extrac 1 char using substr, i is starting position
                    //check using strops
                    //position if froound and false other wise
                    if(strpos("AEIOUaeiou",$letter) === false){ //check letter against the string list of vowels
                        $ans = $ans . $letter;
                    }
                }
                // generate answer after all letters are checked
                echo "<p>The word with no vowels is " . $ans . ".</p>";
            } else {
                echo "<p>Please enter a string containing only letters or spaces.</p>";
            }
        } else {
            echo "<p>Please enter string from the input form.</p>";
        }
    ?>
</body>
</html>