<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add User</title>
</head>
<body>
  <h1>User ADD</h1>

  <form action="index.php?ctrl=user&action=store" method="POST">

    <label for="firstName">First Name</label>
    <p><input type="text" name="firstName" id="firstName"></p>
    
    <label for="lastName">Last Name</label>
    <p><input type="text" name="lastName" id="lastName"></p>
    
    <label for="userName">User Name</label>
    <p><input type="text" name="userName" id="userName"></p>
    
    <label for="email">Email</label>
    <p><input type="email" name="email" id="email"></p>
      
    <label for="country">Country</label>
    <p><input type="text" name="country" id="country"></p>
  
    <label for="role">Role</label>
    <p><input type="text" name="role" id="role"></p>

    <label for="pwd">password</label>
    <p><input type="text" name="pwd" id="pwd"></p>

    <p><input type="submit" ></p>

  </form>

</body>
</html>