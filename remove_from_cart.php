<?php
session_start();
require_once('menu.php');
require_once('db_conn.php');
require_once('home.php');
if (isset($_POST['foodname'])) {
    require_once('cart.php');
    $food_name = $_POST['foodname'];
    
    //  get the customer ID, update it accordingly
    $c_id = 1; 

    // Remove the item from the PHP session-based cart
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($food_name) {
            return $item['foodname'] !== $food_name;
            
        });
    }

    // Remove the item from the database (cartDb)
    if ($cartDb->removeCartItem($c_id, $food_name)) {
        echo "success";
    } else {
        echo "error";
    }
}
if (isset($_POST['clearCart'])) {
    $c_id = 1; // Assuming a constant customer ID for now
    if ($cartDb->clearCart($c_id)) {
        // Clear the session cart as well
        unset($_SESSION['cart']);
        echo "success";
    } else {
        echo "error";
    }
}
?>
