<?php
error_reporting(E_STRICT);

class Cart {
    function add() {

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

        foreach($products as $product) {
            $html = $html . '<li><div class="name">' . $product["name"] . '</div><div class="price">$' . $product["price"] . '</div></li>';
        }

        return $html;
    }
}