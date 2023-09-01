<?php
session_start();

// Sample item prices
$itemPrices = [
    1 => 10,
    2 => 20,
    3 => 15
];

if (isset($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];

    foreach ($cartItems as $itemId) {
        echo "Item $itemId - $" . $itemPrices[$itemId] . "<br>";
    }
} else {
    echo "Cart is empty.";
}
?>

