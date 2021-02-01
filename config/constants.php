<?php
    // start session
    session_start();
    
// 3. Execute Query and save data into database
define('SITEURL','http://localhost/food-order/');

$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); // database connection
$db_select = mysqli_select_db($conn, 'food-order') or (mysqli_error()); // selecting database
?>