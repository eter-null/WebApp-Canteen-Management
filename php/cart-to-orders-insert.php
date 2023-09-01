<?php
session_start();
require "connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    date_default_timezone_set('Asia/Dhaka');
    $id = $_SESSION['ID'];                  // to store and restore after destroying session
    $orderID = rand(10000, 99999);        // rand 5digit number
    $total =  $_POST["total"];
    $orderDate = date('Y-m-d');
    $orderTime = date('H:i');






    $query = "INSERT INTO orders(orderID, c_id, FoodName, Quantity, Price, OrderDate, OrderTime) 
SELECT '$orderID', $id, FoodName, Quantity, Price, '$orderDate', '$orderTime' FROM cart";


    mysqli_query($conn, $query);

    $query1 = "DELETE FROM cart";
    mysqli_query($conn, $query1);


    // del all session data 2 prevent duplication
    session_start();
    session_unset();
    session_destroy();

    session_start();
    $_SESSION['ID']=$id;


}


?>
