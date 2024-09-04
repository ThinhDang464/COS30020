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
            <label for="name">Name: </label>
            <input type="text" id="name" name="name" required>
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email" required>
        </p>
        <input type="submit" value="Sign" />
        <input type="reset" value="Reset Form" />
    </form>
    <p><a href="guestbookshow.php">View Guest Book</a></p>
</body>
</html>