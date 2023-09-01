
// DELETE THIS FILE
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector(".header");

    function updateHeaderStyles() {
        const headerHeight = header.clientHeight;
        const scrollThresholdVH = headerHeight + 459; // Adjust the threshold in vh as needed

        if (window.pageYOffset > scrollThresholdVH) {
            header.style.backgroundColor = "#317e44";
            header.style.borderRadius = "0 0 50% 50% / 0 0 20px 20px";
            // Add more style properties here if needed
        } else {
            header.style.backgroundColor = "transparent";
            header.style.borderRadius = "0";
            // Reset other style properties as needed
        }
    }

    updateHeaderStyles(); // Update styles initially

    window.addEventListener("scroll", updateHeaderStyles);
});
