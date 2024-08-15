<?php 
    function factorial ($n){
        $result = 1;
        $factor = $n; //initialise factor with n incase we want to preserve the value of original n
        while ($factor > 1){
            $result *= $factor;
            $factor--;
        }
        return $result;
    }
?>