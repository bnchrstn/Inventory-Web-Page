<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['admin_name'] = $row['name']; 
        
        header('location:admin_page.php');
        exit();

    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css?v=1.1">
   <title>login form</title>

</head>
<body>   

<header>
    <img src="images/gouache.png" alt="Gouache Image" class="admin-image">
    <h1>Inventory</h1>
</header>

<div class="form-container">

   <form action="" method="post">
      <h3>login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter admin email" required autocomplete="off">
      <input type="password" name="password" required placeholder="enter password" required autocomplete="off">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>forgot password?<a href="reset_pass.php"> reset here</a></p>
   </form>

</div>

</body>
</html>