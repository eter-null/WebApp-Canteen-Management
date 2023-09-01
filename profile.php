<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile | Chows</title>
    <link rel="stylesheet" href="stylesheet/header.css">
    <link rel="stylesheet" href="stylesheet/footer.css">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet/profileStyle.css">
    <link rel="stylesheet" href="stylesheet/header.css">
    <!--    <link rel="stylesheet" href="../stylesheet/popup.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


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





<section>
    <form action="">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="card mb-3 card-shadow" style="max-width: 70vw;">
                    <div class="row g-0">
                        <form action="">
                            <div class="card-body">
                                <h1>Profile Overview</h1>
                                <br>
                                <div class="container">
                                    <h2>Profile</h2>
                                    <br>
                                    <?php include 'php/get-customer-info.php'; ?>
                                    <div class="input-container">
                                        <input id="customerID" type="text" required="required" value="<?php echo $customer_id; ?>"/>
                                        <span>ID Number *</span>
                                    </div>
                                    <div class="input-container">
                                        <input id="firstName" type="text" required="required" value="<?php echo $c_Fname; ?>"/>
                                        <span>First Name *</span>
                                    </div>
                                    <div class="input-container">
                                        <input id="lastName" type="text" required="required" value="<?php echo $c_Lname; ?>"/>
                                        <span>Last Name *</span>
                                    </div>
                                    <div class="input-container">
                                        <input id="phoneNumber" type="text" required="required" value="<?php echo $phone_number; ?>"/>
                                        <span>Phone Number *</span>
                                    </div>
                                    <div class="input-container">
                                        <input id="email" type="text" value="<?php echo $email; ?>"/>
                                        <span>Email</span>
                                    </div>
                                    <div class="container d-flex justify-content-center">
                                        <button id="saveProfile" type="button" class="btn btn-success">Save</button>
                                    </div>
                                    <div class="save-message" style="color: green;"></div>
                                </div>
                                <br><br><br>
                                <div class="container">
                                    <h2>Password</h2>
                                    <br>
                                    <div class="input-container">
                                        <input id="currentPassword" type="password" required="required" />
                                        <span>Current Password</span>
                                    </div>
                                    <br>
                                    <div class="input-container">
                                        <input id="newPassword" type="password" required="required" />
                                        <span>Enter New Password</span>
                                    </div>
                                    <div class="error-message" style="color: red;"></div>
                                    <div class="success-message" style="color: green;"></div>
                                    <br>
                                    <div class="container d-flex justify-content-center">
                                        <button id="checkPass" type="button" class="btn btn-success popup-button">Save</button>
                                    </div>


                                </div>

                                <br><br><br>
<!--                                <div class="container">-->
<!--                                    <h2>Payment Method</h2>-->
<!--                                    <br>-->
<!---->
<!--                                    <div class="container">-->
<!--                                        <div class="row">-->
<!--                                            <label class="radiobox-container">bKash-->
<!---->
<!--                                                <input type="radio" name="radio">-->
<!--                                                <span class="checkmark">-->
<!--                                            <img class="pay-icon" src="img/bkash.png" alt="bkash">-->
<!--                                        </span>-->
<!---->
<!--                                            </label>-->
<!--                                            <br><br>-->
<!--                                            <div>-->
<!--                                            <input style="border-color: black" type="text" value="01710121111">-->
<!--                                                <br><br>-->
<!--                                                <button type="button" class="btn btn-warning acc-btn">Change Number</button>-->
<!--                                            </div>-->
<!--                                            <label class="radiobox-container">Cash-->
<!--                                                <input type="radio" checked="checked"name="radio">-->
<!--                                                <span class="checkmark">-->
<!--                                            <i class="fa-regular fa-money-bill-1 fa-2xl pay-icon"></i>-->
<!--                                        </span>-->
<!--                                            </label>-->
<!--                                            <br><br><br>-->
<!--                                        </div>-->
<!--                                        <div class="container d-flex justify-content-center">-->
<!--                                            <button type="button" class="btn btn-success popup-button" data-bs-toggle="modal" data-bs-target="#successModal">Save</button>-->
<!--                                        </div>-->
<!---->
<!---->
<!---->
<!---->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

<!--ajax-->
<script>
    $(document).ready(function() {
        $('#checkPass').click(function() {
            var currentPassword = $('#currentPassword').val();
            var newPassword = $('#newPassword').val();

            // Perform AJAX request to check passwords
            $.ajax({
                type: 'POST',
                url: 'php/check-password.php', // Create this PHP file
                data: { currentPassword: currentPassword, newPassword: newPassword },
                success: function(response) {
                    if (response === 'success') {
                        // Passwords match, proceed with saving
                        $('.error-message').text('');
                        $('.success-message').text('Passwords updated.');
                        // Add your save logic here
                    } else {
                        // Passwords do not match, show error
                        $('.error-message').text('Passwords do not match.');
                        $('.success-message').text('');
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#saveProfile').click(function() {
            var customerID = $('#customerID').val();
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var phoneNumber = $('#phoneNumber').val();
            var email = $('#email').val();

            // Perform AJAX request to update profile
            $.ajax({
                type: 'POST',
                url: 'php/update-profile.php', // Create this PHP file
                data: {
                    customerID: customerID,
                    firstName: firstName,
                    lastName: lastName,
                    phoneNumber: phoneNumber,
                    email: email
                },
                success: function(response) {
                    $('.save-message').text(response);
                }
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>