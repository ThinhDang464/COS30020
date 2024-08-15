<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Application Development :: Lab 1" />
<meta name="keywords" content="Web,programming" />
<title>Using if and while statements</title>
</head>
<body>
<?php
function is_prime($n){
    if ($n == 1){//1 is not prime
        return false;
    }

    for ($i = 2; $i < $n; $i++) {//check all num can be divided beside the num itsself
        if ($n % $i == 0) {
            return false;
        }
    }
    
    return true;
}
?>
<h1>Lab03 Task 3 - Prime Number</h1>
<?php
if (isset ($_GET["num"])) { // check if form data exists
$num = $_GET["num"]; // obtain the form data
if ($num > 0) { // check if $num is a positive number
    if ($num == round ($num)) { // check if $num is an integer
        if(is_prime($num)){
            echo "<p>The number you entered $num is a prime number</p>";
        } else {
            echo "<p>The number you entered $num is not a prime number</p>";
        }
    } else { // number is not an integer
    echo "<p>Please enter an integer.</p>";
    }
    } else { // number is not positive
    echo "<p>Please enter a positive integer. </p>";
    }
    } else { // no input
    echo "<p>Please enter an integer.</p>";
    }
    ?>
</body>
</html>