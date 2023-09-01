<?php
session_start();
require_once ('menu.php');
require_once ('db_conn.php');

if (isset($_POST['f_id'])) {
    $f_id = $_POST['f_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $item_array_id = array_column($_SESSION['cart'], "f_id");

    if (!in_array($f_id, $item_array_id)) {
        $count = count($_SESSION['cart']);
        $item_array = array(
            'f_id' => $f_id
        );
        $_SESSION['cart'][$count] = $item_array;
        $cart_count = count($_SESSION['cart']);
        echo $cart_count;
    } else {
        echo "item_exists";
    }
}
?>
