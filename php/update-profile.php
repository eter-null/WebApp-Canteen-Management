<?php
include 'connect.php'; // Include your database connection code
session_start();
$id = $_SESSION['ID'];
$customer_id = $id;

$newCustomerID = $_POST['customerID'];
$newFirstName = $_POST['firstName'];
$newLastName = $_POST['lastName'];
$newPhoneNumber = $_POST['phoneNumber'];
$newEmail = $_POST['email'];

// Update the customer's profile in the database
$updateSql = "UPDATE Customer SET c_id = '$newCustomerID', c_Fname = '$newFirstName', c_Lname = '$newLastName', phone_number = '$newPhoneNumber', email = '$newEmail' WHERE c_id = $customer_id";

if ($conn->query($updateSql) === TRUE) {
    echo 'Profile updated successfully.';
} else {
    echo 'Error updating profile.';
}

$conn->close();
?>
