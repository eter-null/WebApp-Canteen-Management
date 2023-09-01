<?php

function food($foodname,$price,$foodimg,$f_id){

    $element = "
    <div class=\"col-md-4 column food-card\">
                    <form action=\"home.php\" method=\"POST\">
                    <img class=\"food-img\" src=\"$foodimg\" alt=\"\">
        
                    <h4 style=\"font-weight: 600\">$foodname</h4>
                    <p style=\"font-weight: 600\">Tk. $price</p>
                   
                    <button class=\"add-to-cart-button\" type=\"submit\" data-bs-toggle=\"modal\" name=\"add\">Add to Cart</button>
                    <input type='hidden' name='f_id' value=$f_id>
                    </form>
                    </div>
    ";
    echo $element;
}
function special($foodname,$price,$foodimg,$f_id){

    $element = "
    <div class=\"col-md-6 column\">
                <div class=\"deal-container\">
                    <div class=\"discount-banner\"> Only Tk. $price!!</div>
                    <form action=\"home.php\" method=\"POST\">
                    <img src=\"$foodimg\" alt=\"Product Image\" class=\"deals-img\">
                </div>
 
                <h4 style=\"font-weight: 600\">$foodname</h4>
                <button class=\"add-to-cart-button\" type=\"submit\" name=\"add\">Add to Cart</button>
                <input type='hidden' name='f_id' value=$f_id>
                </form>
                </div>
    ";
    echo $element;
}
function cartelement($foodimg, $foodname, $price) {
    $quantity = 1;
    $element = "
    <div class=\"cart-item\"  data-foodname=\"$foodname\">
        <button id=\"#foodname\" class=\"del-all-btn\"></button>
        <img src=\"$foodimg\" alt=\"$foodname\" class=\"item-img\">
        <div class=\"item-details\">
            <h5>$foodname</h5>
            <p></p>
        </div>
        <div class=\"item-price-addrem\">
            <span class=\"item-price\">Tk $price</span>
            <div class=\"addrem-container\">
                <div class=\"control minus\">-</div>
                <input class=\"input-box\" type=\"text\" value=$quantity readonly>
                <div class=\"control plus\">+</div>
            </div>
        </div>
    </div>
    ";
    echo $element;
}



    function getCartCount() {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        }
        return 0;
    }
    





?>


