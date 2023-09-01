
// dynamic header js
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header");

    function updateHeaderStyles() {
        const headerHeight = header.clientHeight;
        const scrollThresholdVH = headerHeight + 469; // change val later

        if (window.pageYOffset > scrollThresholdVH) {
            header.style.backgroundColor = "#409457";
            header.style.borderRadius = "0 0 50% 50% / 0 0 20px 20px";
        } else {
            header.style.backgroundColor = "transparent";
            header.style.borderRadius = "0";
        }
    }

    // update styles initially
    updateHeaderStyles();

    // attaching scroll event listener
    window.addEventListener("scroll", updateHeaderStyles);


    // counter js(jquery)
    $(document).ready(function() {
        $(".plus").on("click", function() {
            // increment the value and update the input box within this instance
            var inputBox = $(this).siblings(".input-box");
            var itemCount = parseInt(inputBox.val()) + 1;
            inputBox.val(itemCount);
        });

        $(".minus").on("click", function() {
            // decrement the value and update the input box within this instance
            var inputBox = $(this).siblings(".input-box");
            var itemCount = parseInt(inputBox.val());
            if (itemCount > 0) {
                itemCount--;
                inputBox.val(itemCount);
            }
        });
    });
});
