<?php

require "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $query = "INSERT INTO review (Fullname, Email, Message)
            VALUES ('$fullname','$email','$message')";

    mysqli_query($conn, $query);
}

?>


