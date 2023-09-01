<?php
   session_start();
    require_once ('db_conn.php');
    require_once ('menu.php');
    $cartDb = new CartTable();
    $cartDb->createTable();

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart | Chows</title>
    <link rel="stylesheet" href="stylesheet/header.css">
    <link rel="stylesheet" href="stylesheet/footer.css">
    <link rel="stylesheet" href="stylesheet/cartStyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--    <script src="script/cartButton.js"></script>-->



    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

    <script>
$(document).ready(function() {
    $(".del-all-btn").click(function() {
        var foodname = $(this).attr('foodname');

        var cartItem = $(this).closest(".cart-item");

        $.post("remove_from_cart.php",
                      {
                          foodname:foodname
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }

                );

        console.log("Food name:", foodname); // Check if foodName is being retrieved correctly
        console.log("Cart item:", cartItem); // Check if cartItem is the correct element

    });
});
    </script>


    <script>
        $(document).ready(function() {
            $(".plus").on("click", function() {
                var inputBox = $(this).siblings(".input-box");
                var itemCount = parseInt(inputBox.val()) + 1;
                inputBox.val(itemCount);

                var foodName = $(this).closest(".cart-item").data("foodname");
                updateCartItemQuantity(foodName, itemCount);
            });

            $(".minus").on("click", function() {
                var inputBox = $(this).siblings(".input-box");
                var itemCount = parseInt(inputBox.val());
                if (itemCount > 0) {
                    itemCount--;
                    inputBox.val(itemCount);
                    var foodName = $(this).closest(".cart-item").data("foodname");
                    updateCartItemQuantity(foodName, itemCount);
                }
            });

            function updateCartItemQuantity(foodName, quantity) {
                $.ajax({
                    url: "php/update-cart-items.php",
                    method: "POST",
                    data: { foodName: foodName, quantity: quantity },

                });
            }

        });

    </script>


<!--------
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
------------>
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

<!--cart items-->
<section>
    <div class="container">
        <h1 class="d-flex justify-content-center align-items-center">Your Order</h1>
        <div class="row">
            <div class="col-md-8 scrollable">
                <?php
//                include "php/connect.php";
                $total = 0;

//                $query = "SELECT COUNT(*) AS item_count FROM cart";
//                $result1 = mysqli_query($conn, $query);
//
//                if ($result1) {
//                    $row = mysqli_fetch_assoc($result1);
//                    $itemCount = $row['item_count'];
//
//                    if ($itemCount > 0) {
//
//
//                    }
//                    else {
//
//                    }
//
//                }

                if (isset($_SESSION['cart'])) {
                    $f_id = array_column($_SESSION['cart'], 'f_id');
                    $result = $cartDb->getDataDrinks();

                    // block code for inserting into cart

                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($f_id as $id) {
                            if ($row['f_id'] == $id) {
                                // Fetch necessary details
                                $foodName = $row['FoodName'];
                                $price = $row['Price'];

                                // Insert or update cart item
                                $cartDb->insertOrUpdateCartItem(1, $row['FoodName'], $row['Price']);

                                // Display the cart element (modify this part based on your HTML structure)
                                cartelement($row['Imgpath'], $row['FoodName'], $row['Price']);

                                // Calculate the total price
                                $total = $total + (int)$row['Price'];
                            }
                        }
                    }

// block code ends till here


                    $result = $cartDb->getDataDesserts();
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($f_id as $id) {
                            if ($row['f_id'] == $id) {
                                // Fetch necessary details
                                $foodName = $row['FoodName'];
                                $price = $row['Price'];

                                // Insert or update cart item
                                $cartDb->insertOrUpdateCartItem(1, $row['FoodName'], $row['Price']);

                                // Display the cart element (modify this part based on your HTML structure)
                                cartelement($row['Imgpath'], $row['FoodName'], $row['Price']);

                                // Calculate the total price
                                $total = $total + (int)$row['Price'];
                            }
                        }
                    }

// block code ends till here


                    $result = $cartDb->getDataRice();
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($f_id as $id) {
                            if ($row['f_id'] == $id) {
                                // Fetch necessary details
                                $foodName = $row['FoodName'];
                                $price = $row['Price'];

                                // Insert or update cart item
                                $cartDb->insertOrUpdateCartItem(1, $row['FoodName'], $row['Price']);

                                // Display the cart element (modify this part based on your HTML structure)
                                cartelement($row['Imgpath'], $row['FoodName'], $row['Price']);

                                // Calculate the total price
                                $total = $total + (int)$row['Price'];
                            }
                        }
                    }

// block code ends till here


                    $result = $cartDb->getDataSpecial();
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($f_id as $id) {
                            if ($row['f_id'] == $id) {
                                // Fetch necessary details
                                $foodName = $row['FoodName'];
                                $price = $row['Price'];

                                // Insert or update cart item
                                $cartDb->insertOrUpdateCartItem(1, $row['FoodName'], $row['Price']);

                                // Display the cart element (modify this part based on your HTML structure)
                                cartelement($row['Imgpath'], $row['FoodName'], $row['Price']);

                                // Calculate the total price
                                $total = $total + (int)$row['Price'];
                            }
                        }
                    }

// block code ends till here
                }

                else {
                    echo "<h5>Cart is Empty</h5>";
                }





                ?>
            </div>


            <!--            subtotal-->
            <div class="col-md-4">
                <h3>Cart Totals</h3>
                <div class="subtotal-card">
                    <?php
                    $vat = 5.25;
                    echo "<h5>Subtotal: Tk $total</h5>";
                    $netTotal = $total + $vat;
                    echo "<p>VAT: Tk $vat</p>
                    <hr>
                    <h4>Total: Tk $netTotal</h4>
                    ";
                    ?>

                        <button type="button" id="checkout" class="add-to-cart-button">Checkout</button>


                </div>

            </div>

        </div>
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




<script>

</script>


<!--ajax so the page doesnt refresh when sending data-->
<script>
    $(document).ready(function() {
        $("#checkout").click(function() {
            var quantities = {}; // Object to store quantities for each item

            // Loop through each cart item
            $(".cart-item").each(function() {
                var foodname = $(this).data('FoodName');
                var fid = $(this).data('fid');
                var quantity = $(this).find('.quantity-input').val();
                quantities[fid] = quantity; // Store quantity with the corresponding item identifier
            });

            // Make AJAX call
            $.ajax({
                url: "php/cart-to-orders-insert.php",
                method: 'POST',
                data: {
                    total: <?php echo $netTotal; ?>,
                    quantities: quantities // Pass the quantities object
                }
            })
                .done(function() {
                    // Redirect to orders.php when AJAX call is done
                    window.location.href = 'orders.php';
                });

        });
    });

</script>
</body>
</html>