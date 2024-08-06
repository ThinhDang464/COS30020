<?php 

    if (isset($_GET['num']) && is_numeric($_GET['num'])) //check if theres var sent thru get method and if its numeric
    {
        $num = $_GET['num'];
        $roundValue = round($num);
        if($num % 2 == 0)
        {
            echo "<p>The variable $num contains an even number</p>";
        } else{
            echo "<p>The variable $num contains an odd number</p>";
        }
    } else{
        //if num not set from form or not valid numeric type
        echo "<p>Please enter a valid number in form</p>";
    }
?>