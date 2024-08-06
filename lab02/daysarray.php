<?php
    $days = array("Sunday", "Monday", "Tuesday", "Wednesday",
    "Thursday", "Friday", "Saturday");

    echo "<p>The days of the week in English are: $days[0], $days[1], $days[2],
    $days[3], $days[4], $days[5], $days[6].</p>";

    $days = array("Dimanche", "Lundi", "Mardi", "Mercredi",
    "Jeudi", "Vendredi", "Samedi");
    echo "<p>The days of the week in French are: ";
    $lastIndex = count($days) - 1;
    foreach($days as $index => $val) //indx and value
    {
        echo $val;
        if ($index < $lastIndex) {
            echo ", ";
        } else {
            echo "."; //period on last day
        }
    }
    echo "</p>";
?>
