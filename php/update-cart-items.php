<?php
// Connect to your database
include "connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodName = $_POST["foodName"];
    $quantity = $_POST["quantity"];

    $sql = "UPDATE cart SET Quantity = $quantity WHERE FoodName = '$foodName'";
    $result = $conn->query($sql);


}

$conn->close();
?>
<?php
