<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $new_pass = md5($_POST['new_password']);
   $confirm_pass = md5($_POST['confirm_password']);

   $select = "SELECT * FROM users WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      if($new_pass != $confirm_pass){
         $error[] = 'Passwords do not match!';
      }else{
         $update = "UPDATE users SET password = '$new_pass' WHERE email = '$email'";
         mysqli_query($conn, $update);
         header('location:index.php'); // redirect to login page
      }

   }else{
      $error[] = 'Email does not exist!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Password Reset</title>
   <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>

<header>
    <img src="images/gouache.png" alt="Gouache Image" class="admin-image">
    <h1>Inventory</h1>
</header>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Reset Password</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter admin email" autocomplete="off">
      <input type="password" name="new_password" required placeholder="enter new password" autocomplete="off">
      <input type="password" name="confirm_password" required placeholder="confirm new password" autocomplete="off">
      <input type="submit" name="submit" value="Reset Password" class="form-btn">
      <p>remembered the password? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>
