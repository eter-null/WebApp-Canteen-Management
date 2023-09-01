<?php
include 'connect.php';
session_start();
$id = $_SESSION['ID'];
$customer_id = $id;

$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];

// Fetch the customer's stored password from the database
$sql = "SELECT password FROM Customer WHERE c_id = $customer_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    if ($currentPassword === $storedPassword) {
        // Current password matches, update the new password
        $updateSql = "UPDATE Customer SET password = '$newPassword' WHERE c_id = $customer_id";
        if ($conn->query($updateSql) === TRUE) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        // Current password does not match
        echo 'error';
    }
} else {
    // Handle case where no results are found
}

$conn->close();
?>
