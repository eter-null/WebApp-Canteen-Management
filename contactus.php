<?php
include 'php/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home | Chows</title>
    <link rel="stylesheet" href="stylesheet/header.css">
    <link rel="stylesheet" href="stylesheet/footer.css">
    <link rel="stylesheet" href="stylesheet/contactStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
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

<section style="margin-top: 5%">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2> We are Chows and we are here to serve!</h2>
                <h2> How can we help you?</h2>
                <br>
                <p>
                    If you have any questions about your experience, billing, menus or anything else Chows related, we’re here to help!
                </p>
            </div>


            <div class="col-lg-4">
                <form id="contactus" class="contact-form">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
                    </div>

                    <button id="sendMsg" type="button" class="btn btn-primary btn-full-width">Send Message</button>
                    <br><br>
                    <p class="social-heading">Reach us on</p>
                    <div class="social-icons">
                        <a href="#" class="icon-link" style="color: #1877F2;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="icon-link" style="color: #1DA1F2;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="icon-link" style="color: #25D366;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </form>

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






<!--ajax so the page doesnt refresh when sending data-->
<script>
    $(document).ready(function() {
        $("#sendMsg").click(function() {
            $.ajax({
                url: "php/contact-insert.php",
                method: "POST",
                data: {
                    fullname: $('#name').val(),
                    email: $('#email').val(),
                    message: $('#message').val()
                },

            });
        });
    });
</script>
</body>
</html>