<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>

<header>
    <img src="images/gouache.png" alt="Gouache Image" class="admin-image">
    <h1>Inventory</h1>
</header>

<div class="container">

    <div class="content">
        <h3>hi, <span>admin</span></h3>
        <h1>welcome back!</h1>
        <p>Navigate through the Gouache inventory now!</p>
        <a href="logout.php" class="btn">logout</a>
        <a href="viewInventory.php" class="btn">View Inventory</a>
    </div>

</div>

</body>
</html>
