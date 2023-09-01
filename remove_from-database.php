<?php
session_start();
require_once('db_conn.php'); // Include your database connection file here
require_once('cart.php');
require_once('home.php');
if (isset($_POST['foodname'])) {
    $foodname = $_POST['foodname'];
    // Get the customer ID, update it accordingly
    $c_id = 1; // Assuming you have a way to get the customer ID

    // Remove the item from the database (cartDb)
    if ($cartDb->removeCartItem($c_id, $foodname)) {
        // Update the session cart data by filtering out the removed item
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($foodname) {
                return $item['FoodName'] !== $foodname;
            });
        }
        
        echo "success";
    } else {
        echo "error";
    }
}
?>
