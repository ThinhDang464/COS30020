<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member Add Form</title>
</head>

<body>
  <h1>Add VIP Member</h1>
  <form action="member_add.php" method="post">
    <label for="fname">First Name:</label>
    <input name="fname" />
    <br>
    
    <label for="lname">Last Name:</label>
    <input name="lname" />
    <br>

    <label for="gender">Gender:</label>
    <label>
    <input type="radio" name="gender" value="M">
        M
    </label>
    <label>
    <input type="radio" name="gender" value="F">
        F
    </label>
    
    <br>
    <label for="email">Email:</label>
    <input name="email" />
    
    <br>
    <label for="phone">Phone:</label>
    <input name="phone" />
    
    <br>
    <input type="submit" value="Add Member" />
    <input type="reset" value="Clear Form" />
    
  </form>
</body>

</html>