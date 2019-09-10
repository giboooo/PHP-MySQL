<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>edit user</title>
</head>
<body>
  <h1>User EDIT</h1>

  <form action="index.php?ctrl=user&action=update&id=<?php echo $user->getId() ?>" method="POST">

    <p name="id" id="<?php echo $user->getId()?>">User ID : <?php echo $user->getId() ?></p>

    <label for="firstName">First Name</label>
    <p><input type="text" name="firstName" id="firstName" value="<?php echo $user->getFirstName() ?>"></p>
    
    <label for="lastName">Last Name</label>
    <p><input type="text" name="lastName" id="lastName" value="<?php echo $user->getLastName() ?>"></p>
    
    <label for="userName">User Name</label>
    <p><input type="text" name="userName" id="userName" value="<?php echo $user->getUserName() ?>"></p>
    
    <label for="email">Email</label>
    <p><input type="email" name="email" id="email" value="<?php echo $user->getEmail() ?>"></p>
      
    <label for="country">Country</label>
    <p><input type="text" name="country" id="country" value="<?php echo $user->getCountry() ?>"></p>
  
    <label for="role">Role</label>
    <p><input type="text" name="role" id="role" value="<?php echo $user->getRole() ?>"></p>

    <label for="role">Password</label>
    <p><input type="text" name="pwd" id="pwd"></p>
    
    <p><input type="submit" value="Modifier"></p>

  </form>

</body>
</html>