<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Vu Dang" />
    <title>File()</title>
</head>
<body>
    <h1>Web Programming Form - Lab 5</h1>
    <form action="shoppingsave.php" method="post">
        <p>
            <label for="item">Enter item name:</label>
            <input type="text" id="item" name="item" required>
        </p>
        <p>
            <label for="qty">Enter quantity:</label>
            <input type="number" id="qty" name="qty" required>
        </p>
        <input type="submit" value="Submit" />
    </form>
</body>
</html>