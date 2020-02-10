<?php
error_reporting(E_STRICT);
session_start();

class Cart {
    public function __construct() {
        echo("<script>console.log('constructor() called');</script>");
        $_SESSION["Cart"] = $this->getCart();

    }

    function getCart() {
        echo("<script>console.log('getCart() called');</script>");
        if ($_SESSION["Cart"] == "") {
            echo("<script>console.log('null');</script>");

            return $cart = [
                ["id" => 0, "price" => 125.75, "quantity" => 0],
                ["id" => 1, "price" => 190.50, "quantity" => 0],
                ["id" => 2, "price" => 562.131, "quantity" => 0],
                ["id" => 3, "price" => 12.9, "quantity" => 0],
                ["id" => 4, "price" => 18.45, "quantity" => 0],
            ];
        }
        else {
            echo("<script>console.log('not null');</script>");
            echo("<script>console.log('cart is ". $_SESSION["Cart"] . "');</script>");
            return $_SESSION["Cart"];
        }


    }

    function setCart($cart) {
        echo("<script>console.log('setCart() called');</script>");
        $_SESSION["Cart"] = $cart;
    }
// echo("<script>console.log('add executed ". $productId . "');</script>");
    function add($productId) {
        echo("<script>console.log('add() called');</script>");
        $cart = $this->getCart();
        switch ($productId) {
            case 0:
                $cart[0]["quantity"]++;
                break;
            case 1:
                $cart[1]["quantity"]++;
                break;
            case 2:
                $cart[2]["quantity"]++;
                break;
            case 3:
                $cart[3]["quantity"]++;
                break;
            case 4:
                $cart[4]["quantity"]++;
                break;
            default:
                echo "default";
                break;
        }

        $this->setCart($cart);
//        echo("<script>console.log('end of add()');</script>");
//        echo("<script>console.log('". $cart[0]["quantity"] . "');</script>");
//        echo("<script>console.log('". $cart[1]["quantity"] . "');</script>");
    }

    function listItems() {

    }

    function remove() {

    }
}

class Product {

}

class Products {
    public static function listProducts() {
        // ######## please do not alter the following code ########
        $products = [
            ["name" => "Sledgehammer", "price" => 125.75],
            ["name" => "Axe", "price" => 190.50],
            ["name" => "Bandsaw", "price" => 562.131],
            ["name" => "Chisel", "price" => 12.9],
            ["name" => "Hacksaw", "price" => 18.45],
        ];
        // ########################################################

        $html = "";
        $id = 0;
        foreach($products as $product) {
            $html = $html .
                '<li>
                    <div class="name">' . $product["name"] . '</div><div class="price">$' . $product["price"] . '</div>
                    <form method="POST" action="">
                        <input type="hidden" name="productId" value='.$id.' />
                        <input type="submit" name="addButton" id="add" value="Add to Cart" />
                    </form>
                </li>';
            $id++;
        }

        return $html;
    }
}