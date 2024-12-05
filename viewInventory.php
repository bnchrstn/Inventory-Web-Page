<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:index.php');
    exit();
}

// connects to the database (make sure ur config.php is set up for ur db name)
$conn = mysqli_connect('localhost', 'root', 'airism', 'login_db') or die('Connection failed');

// query to fetch bestsellers data
$query = "SELECT * FROM bestsellers";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inventory</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>

<header>
    <img src="images/gouache.png" alt="Gouache Image" class="admin-image">
    <h1>Inventory</h1>
</header>

<div class="container">
    <div class="content">
        <h3>Best Sellers</h3>
        
        <!-- displays table -->
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Sales ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['prod_id'] . "</td>";
                        echo "<td>" . $row['sales_id'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='text-align: center;'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <br>
        <a href="admin_page.php" class="btn">Back to Home Page</a>
    </div>
</div>

</body>
</html>
