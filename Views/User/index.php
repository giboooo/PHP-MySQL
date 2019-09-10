<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Users List</title>
</head>
<body>

  <h1>Users List</h1>

  <p><a href="index.php?ctrl=user&action=create">add user</a></p>
  

  <?php 
    if(isset($msg)){
      echo '<p><strong>'.$msg.'</strong></p>';
    }
  ?>

  <table border="1" cellpadding="10" style="border-collapse: collapse" >
  
  
    <tr>
      <th>Id</th>
      <th>UserName</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>email</th>
      <th>Country</th>
      <th>Role</th>
      <th>more</th>
    </tr>

    <?php 
    if(!empty($users)){

      foreach ($users as $user) {
        echo '<tr>';
        echo '<td>'.$user->getId().'</td>';
        echo '<td>'.$user->getUserName().'</td>';
        echo '<td>'.$user->getFirstName().'</td>';
        echo '<td>'.$user->getLastName().'</td>';
        echo '<td>'.$user->getEmail().'</td>';
        echo '<td>'.$user->getCountry().'</td>';
        echo '<td>'.$user->getRole().'</td>';
        echo '<td><a href="index.php?ctrl=user&action=show&id='.$user->getId().'">show</a> / <a href="index.php?ctrl=user&action=delete&id='.$user->getId().'">Delete</a></td>';
        echo '</tr>';
      }
    }else {
      echo '<p>Aucune données</p>';
    }
    
  ?>
  </table>
</body>
</html>