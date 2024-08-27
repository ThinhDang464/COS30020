<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Vu Dang" />
    <title>Guestbook</title>
</head>
<body>
    <h1>LAB05 Task 2 - Guestbook</h1>
    <form action="guestbooksave.php" method="post">
        <legend><b>Enter your details to sign our guest book</b></legend>
        <p>
            <label for="fname">First Name: </label>
            <input type="text" id="fname" name="fname" required>
        </p>
        <p>
            <label for="lname">Last Name: </label>
            <input type="text" id="lname" name="lname" required>
        </p>
        <input type="submit" value="Submit" />
    </form>
</body>
</html>