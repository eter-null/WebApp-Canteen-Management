<?php
include 'php/connect.php'; // Include your database connection code
session_start();
$id = $_SESSION['ID'];
// Assume you have the customer's ID as a parameter, or you can retrieve it from a session
$customer_id = $id;

// Fetch customer information from the database
$sql = "SELECT c_Fname, c_Lname, email, phone_number FROM Customer WHERE c_id = $customer_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $c_Fname = $row['c_Fname'];
    $c_Lname = $row['c_Lname'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
} else {
    // Handle case where no results are found
}

// Close the database connection
$conn->close();
?>
