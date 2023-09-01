document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".item");

    items.forEach(item => {
        item.addEventListener("click", () => {
            const itemId = item.getAttribute("data-id");
            addItemToCart(itemId);
        });
    });

    function addItemToCart(itemId) {
        // Use AJAX to send the itemId to the server
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "add_to_cart.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                updateCart();
            }
        };
        xhr.send("item_id=" + itemId);
    }

    function updateCart() {
        const cartItemsContainer = document.querySelector(".cart-items");
        // Use AJAX to get the cart contents from the server
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "get_cart_contents.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                cartItemsContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    // Initial cart update
    updateCart();
});
