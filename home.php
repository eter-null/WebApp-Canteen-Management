<?php

    require_once ('menu.php');
    require_once ('db_conn.php');
    require_once ('add_to_cart.php');
    $menuDb = new MenuTable();
    $menuDb->createTable();

    $customerDb = new CustomerTable();
    $customerDb->createTable();
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Chows</title>
    <link rel="stylesheet" href="stylesheet/homeStyle.css">
    <link rel="stylesheet" href="stylesheet/footer.css">
    <script src="script/cartScript.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   

</head>
<body>
<!--header section-->
<section>
    <div class="background-image">
    <header class="header">
            <div class="logo">
                <a href="#">
                    <img src="img/canteen-logo-white.png" alt="Logo">
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
                            <span id="cart_count" class="cart-count"><?php echo getCartCount(); ?></span>

                        </a>
                    </li>
                    <li>
                        <a class="logout-button" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>

                </ul>
            </nav>
    
        </header>

        <div class="content-container">
            <h1 class="display-4">Welcome to our Canteen</h1>
            <p>Experience hassle-free dining on campus with our online ordering system. Cut down on canteen waiting times by placing your orders in advance and enjoy your meals without the wait!</p>
        </div>
    </div>
</section>

<!--menu section-->
<section>
    <!-- drinks -->
    <div class="center-container">
        <div class="container">
            <div class="row">
                <h1 style="font-weight: 700">Drinks</h1>
                
                    <?php
                        $result = $menuDb->getDataDrinks();
                             while($row=mysqli_fetch_assoc($result)){
                            
                            food($row['FoodName'],$row['Price'],$row['Imgpath'],$row['f_id']);
                           
                         }
                         ?>
  
            </div>
        </div>
    </div>

    <!-- desserts -->
    <div class="center-container">
        <div class="container">
            <div class="row">
                <h1 style="font-weight: 700">Desserts</h1>

                <?php
                         $result = $menuDb->getDataDesserts();
                         while($row=mysqli_fetch_assoc($result)){
                            food($row['FoodName'],$row['Price'],$row['Imgpath'],$row['f_id']);
                           
                         }
                         ?>
            </div>
        </div>
    </div>

<!--   rice -->
    <div class="center-container">
        <div class="container">
            <div class="row">
                <h1 style="font-weight: 700">Rice</h1>
                <?php
                        $result = $menuDb->getDataRice();
                         while($row=mysqli_fetch_assoc($result)){
                            food($row['FoodName'],$row['Price'],$row['Imgpath'],$row['f_id']);
                           
                         }
                         ?>
            </div>
        </div>
    </div>
</section>

<!--offers-->
<section style="margin-top: 10%">
    <h1 style="font-weight: 700; text-align: center">Special Offers!</h1>
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="row">
        <?php
                         $result = $menuDb->getDataSpecial();
                         while($row=mysqli_fetch_assoc($result)){
                            special($row['FoodName'],$row['Price'],$row['Imgpath'],$row['f_id']);
                           
                         }
                         ?>

           
    </div>
</section>


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






<div class="modal fade" id="itemExistsModal" tabindex="-1" aria-labelledby="itemExistsModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemExistsModalLabel">Item Already in Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                The selected item is already in your cart.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--jquery for using +- individually button w/o making unique ids -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart-button').click(function(e) {
            e.preventDefault();
            var f_id = $(this).siblings('input[name="f_id"]').val();
            
            $.ajax({
                type: "POST",
                url: "add_to_cart.php",
                data: { f_id: f_id },
                success: function(response) {
                    if (response === "item_exists") {
                        // Show the modal if item already exists
                        $('#itemExistsModal').modal('show');
                    } else {
                        // Update the cart count
                        $("#cart_count").text(response);
                    }
                }
            });
        });
    });


</script>
<script>
$(document).ready(function() {
    $(".del-all-btn").click(function() {
        var cartItem = $(this).closest(".cart-item");
        

        $.post("remove_from_cart.php", 
            {
                clearCart: true
            },
            function(data) {
                if (data === "success") {
                    // Reload the page after clearing the cart
                    location.reload();
                } else {
                    console.log("Error clearing cart.");
                }
            }
        );
    });
});
</script>

</body>
</html>