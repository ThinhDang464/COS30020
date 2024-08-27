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
    <h1>Web Programming - Lab 5</h1>
    <?php 
    if (isset($_POST["item"])&&isset($_POST["qty"])){
        $item = $_POST["item"]; //obtain form item data
        $qty = $_POST["qty"]; //obtain qty data
        $filename = "../../data/shop.txt";
        $handle = fopen($filename, "a"); //append mode
        $data = $item . ", ". $qty. "\n";//concat data with , and spacee delimiter
        fwrite($handle,$data);//write string to text file
        fclose($handle);
        echo "<p>Shopping List</p> ";
        $handle = fopen($filename,"r");
        while(!feof($handle)){//while not end of file
            $data = fgets($handle); //read a line from text file
            echo"<p>", $data, "</p>"; // generate HTML output of the data
        }
        fclose($handle);
    }else{//no input
        echo "<p>Please enter item and quantity in the input form.</p>";
    } 
    ?>
</body>
</html>