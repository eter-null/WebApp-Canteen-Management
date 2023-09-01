document.addEventListener("DOMContentLoaded", function () {

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
                success: function(response) {
                    // Handle success if needed
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

});
