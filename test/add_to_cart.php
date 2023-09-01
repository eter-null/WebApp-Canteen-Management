<?php
session_start();

if (isset($_POST['item_id'])) {
    $itemId = $_POST['item_id'];
    $_SESSION['cart'][] = $itemId;
}

?>

<!-- Add any necessary HTML for cart addition confirmation -->

