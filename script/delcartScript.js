$(document).ready(function() {
    $(".del-all-btn").click(function() {
        var foodName = $(this).attr("data-foodname"); // Use .attr() to retrieve the attribute
        
        var cartItem = $(this).closest(".cart-item");
        
         
        console.log("Food name:", foodName); // Check if foodName is being retrieved correctly
        console.log("Cart item:", cartItem); // Check if cartItem is the correct element
        

        // Remove the item from the session and database
        $.ajax({
            type: "POST",
            url: "remove_from_cart.php",
            data: { foodName: foodName },
            success: function(response) {
                console.log("Response:", response); // Check the response from the server
                if (response === "success") {
                    // If successful, remove the item from the cart view
                    cartItem.remove();
                } else {
                    alert("An error occurred while removing the item.");
                }
            },
            error: function() {
                console.log("An error occurred while communicating with the server.");
                alert("An error occurred while communicating with the server.");
            }
        });
    });
});
