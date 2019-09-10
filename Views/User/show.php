<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User</title>
</head>
<body>

  <h1>User details</h1>

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
    
    if(!empty($user)){

        echo '<tr>';
        echo '<td>'.$user->getId().'</td>';
        echo '<td>'.$user->getUserName().'</td>';
        echo '<td>'.$user->getFirstName().'</td>';
        echo '<td>'.$user->getLastName().'</td>';
        echo '<td>'.$user->getEmail().'</td>';
        echo '<td>'.$user->getCountry().'</td>';
        echo '<td>'.$user->getRole().'</td>';
        echo '<td><a href="index.php?ctrl=user&action=edit&id='.$user->getId().'">Modifier</a></td>';
        echo '</tr>';
    
    }else {
      echo '<p>Aucune données</p>';
    }
    
    ?>

  
  </table>
  
</body>
</html>