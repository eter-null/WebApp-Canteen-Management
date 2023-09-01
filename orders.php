<?php
session_start();
include 'php/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <title>Orders | Chows</title>
    <link rel="stylesheet" href="stylesheet/header.css">
    <link rel="stylesheet" href="stylesheet/footer.css">
    <link rel="stylesheet" href="stylesheet/ordersStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



</head>
<body>
<!--header-->
<section>
    <header class="header">
        <div class="logo">
            <a href="#">
                <img src="img/canteen-logo.png" alt="Logo">
            </a>
            <span class="logo-text">Canteen Management System</span>
        </div>
        <nav class="nav-links">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="contactus.php">Contact</a></li>
                <li class="cart-icon">
                    <a class="cart-circle" href="cart.php">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <div class="cart-count">0</div>
                </li>
                <li>
                    <a class="logout-button" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</section>



<div class="vertical-list">
    <?php
    include "php/connect.php";



    $id = $_SESSION['ID']; // Get customer ID from the session

    // Modify the query to retrieve orders for the logged-in customer
    $query = "SELECT * FROM Orders WHERE c_id = $id ORDER BY OrderDate ASC, OrderTime ASC";
    $result = $conn->query($query);

    $grouped_orders = array();
    foreach ($result as $row) {
        $orderID = $row['orderID'];


        if (!isset($grouped_orders[$orderID])) {
            $grouped_orders[$orderID] = array(
                'total' => 0,
                'items' => array(),
                'datetime' => ''
            );
        }

        $vat = 5.25;
        $total_price = ($row['Price'] * $row['Quantity']);
        $grouped_orders[$orderID]['total'] += $total_price;


        $grouped_orders[$orderID]['items'][] = $row['FoodName'] . ' x' . $row['Quantity'];


        if ($grouped_orders[$orderID]['datetime'] === '') {
            $grouped_orders[$orderID]['datetime'] = $row['OrderDate'] . ' ' . $row['OrderTime'];
        }
    }
    ?>

    <div class="vertical-list">
        <?php foreach ($grouped_orders as $orderID => $order) { ?>
            <div class="list-group">
                <div class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Order <?php echo $orderID; ?></h5>
                        <small class="total-font">Tk <?php echo $order['total'] +$vat; ?></small>
                    </div>
                    <p class="mb-1"><?php echo implode(', ', $order['items']); ?></p>
                    <small><?php echo $order['datetime']; ?></small>
                </div>
            </div>
        <?php } ?>
    </div>
</div>











<footer>
    <div style="width: 40%; padding-right: 10%">
        <a class="canteen text-white" href="home.php">Canteen Management System</a>
        <p>Welcome to our Canteen Management System! We take pride in offering a delightful dining experience. Our diverse menu and exceptional service are designed to satisfy your cravings. Join us and discover a world of culinary delights.</p>
    </div>
    <div style="width: 20%;">
        <h3>Quick Links</h3>
        <ul>
            <li><a href="#">Browse Menu</a></li>
            <li><a href="#">Operating Hours</a></li>
            <li><a href="#">Register</a></li>
        </ul>
    </div>
    <div style="width: 20%;">
        <h3>Customer Support</h3>
        <ul>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Feedback</a></li>
        </ul>
    </div>
    <div style="width: 20%;">
        <h3>Connect With Us</h3>
        <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</footer>

</body>
</html>
