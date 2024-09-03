<?php
//search filter array:
$searchfilter = array();
//check for search input
if (isset($_GET['jobTitle']) && !empty($_GET['jobTitle'])) {
    $searchfilter['jobTitle'] = $_GET['jobTitle'];
}
if (isset($_GET['position']) && !empty($_GET['position']) && $_GET['position'] !== 'Any') {
    $searchfilter['position'] = $_GET['position'];
}
if (isset($_GET['contract']) && !empty($_GET['contract']) && $_GET['contract'] !== 'Any') {
    $searchfilter['contract'] = $_GET['contract'];
}
if (isset($_GET['via']) && !empty($_GET['via'])) {
    $searchfilter['via'] = $_GET['via'];
}
if (isset($_GET['location']) && !empty($_GET['location']) && $_GET['location'] !== 'Any') {
    $searchfilter['location'] = $_GET['location'];
}

$filename = "../../data/jobs/positions.txt";

//Check file
if (!file_exists($filename)){
    echo "<p>The positions.txt file does not exist in the system please double check</p>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
    echo "<p><a href='searchjobform.php'>Return to Search Job Vacancy</a></p>";
}

//read file
$matchedQueries = array();//store lines from file that matches search query
$fileData = file_get_contents($filename); //content will have \n \t and backslahses if any
if ($fileData === false){
    echo "<p>Error reading the positions.txt file.</p>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
    echo "<p><a href='searchjobform.php'>Return to Search Job Vacancy</a></p>";
}

$lines = explode("\n", $fileData); //split each line (delimit by \n) to element of lines array \t still included

//looking for matches in lines array
$matches = array(); //all relevant lines based on search
foreach($lines as $line){
    if (empty($line)) continue; // Skip empty lines
    $props = explode("\t", $line); //array of fields value
    $matched = true;

    foreach($searchfilter as $key => $value){
        switch($key){
            case 'jobTitle':
                if (stripos($props[1], $value) === false){ //check value of the key (title: IT manager)
                    $matched = false;
                }
                break; //each key handled independently, exit switch block 
            case 'position':
                if($props[4]!==$value){
                    $matched = false;
                }
                break;
            case 'contract':
                if($props[5]!==$value){
                    $matched = false;
                }
                break;
            case 'via':
                $viaMatch  =false;
                foreach ($value as $via){
                    if (($via === 'Post' && $props[7]==='Post') || ($via === 'Email' && $props[8]==='Email')){
                        $viaMatch = true;
                        break;
                    }
                }
                if (!$viaMatch){
                    $matched = false;
                }
                break;
            case 'location':
                if ($props[6] !== $value){
                    $matched = false;
                }
            break;
        }

        //check condition of line
        if (!$matched) break; //no need to check more search filter if mismatch happen early
    }

    if ($matched){
        $matches[] = $line;
    }
}
if (empty($searchfilter)) {
    $matches = $lines;
}

//format date string for comparison
function formatDate($date){
    $parts = explode("/", $date);
    if (count($parts) === 3){
        return sprintf('20%02d-%02d-%02d', $parts[2], $parts[1], $parts[0]);
    }
    return false;
}

//convert match into array of objects for granular control and display
$jobs = array();
foreach($matches as $match){
    if (empty($match)) continue; // Skip empty lines
    $props = explode("\t", $match); //all fields extracted to be in an array
    $job = array(//asociative array for key-value
        'positionId' => $props[0],
        'title' => $props[1],
        'description' => $props[2],
        'closingDate' => $props[3],
        'position' => $props[4],
        'contract' => $props[5],
        'location' => $props[6],
        'viaPost' => $props[7],
        'viaEmail' => $props[8],
        'formattedClosingDate' => formatDate(trim($props[3])) //formated date for sorting
    );
    $jobs[] = $job;
}

//sort available jobs based on future date
usort($jobs, function($a, $b){
    return strcmp($b['formattedClosingDate'], $a['formattedClosingDate']);
});
//display
if (!empty($jobs)){
    echo "<h2>Available Jobs:</h2>";
    foreach ($jobs as $job) {
        echo "<div class='job'>";
        echo "<p><strong>Position ID: " . htmlspecialchars($job['positionId']) . "</strong></p>";
        echo "<p><strong>Title: " . htmlspecialchars($job['title']) . "</strong></h3>";
        echo "<p>Description: " . htmlspecialchars($job['description']) . "</p>";
        echo "<p>Closing Date: " . htmlspecialchars($job['closingDate']) . "</p>";
        echo "<p>Position: " . htmlspecialchars($job['position']) . "</p>";
        echo "<p>Contract: " . htmlspecialchars($job['contract']) . "</p>";
        echo "<p>Location: " . htmlspecialchars($job['location']) . "</p>";
        echo "<p>Accept Application by: ";
        if (!empty($job['viaPost'])){
            echo "Post";
        }
        if(!empty($job['viaEmail'])){
            if (!empty($job['viaPost'])){
                echo ", ";
            }
            echo "Email";
        }
        echo "</p>";
        echo "</div><br>";
    }
    echo "<p><a href='index.php'>Return to Home</a></p>";
    echo "<p><a href='searchjobform.php'>Return to Search Job Vacancy</a></p>";
}else {
    //No matches
    echo "<p>No available job found at the moment.</p>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
    echo "<p><a href='searchjobform.php'>Return to Search Job Vacancy</a></p>";
}
?>