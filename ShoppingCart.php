<?php
error_reporting(E_STRICT);
session_start();

class Cart
{
    public function __construct()
    {
        $_SESSION["Cart"] = $this->getCart();
    }

    function getCart()
    {
        if ($_SESSION["Cart"] == "") {
            return $cart = [
                ["id" => 0, "price" => 125.75, "quantity" => 0],
                ["id" => 1, "price" => 190.50, "quantity" => 0],
                ["id" => 2, "price" => 562.131, "quantity" => 0],
                ["id" => 3, "price" => 12.9, "quantity" => 0],
                ["id" => 4, "price" => 18.45, "quantity" => 0],
            ];
        } else {
            return $_SESSION["Cart"];
        }
    }

    function setCart($cart)
    {
        $_SESSION["Cart"] = $cart;
    }

    function addToCart($productId)
    {
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
    }

    function getName($item)
    {
        $products = new Products();
        $productList = $products->getProducts();

        return $productList[$item["id"]]["name"];
    }

    function getTotal($item)
    {
        $total = $item["quantity"] * $item["price"];
        $formatter = new Formatter();

        return $formatter->formatTotal($total);
    }

    function getOverallTotal()
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION["Cart"]); $i++) {
            if ($_SESSION["Cart"][$i]["quantity"] > 0) {
                $total += $_SESSION["Cart"][$i]["quantity"] * $_SESSION["Cart"][$i]["price"];
            }
        }
        $formatter = new Formatter();

        return $formatter->formatTotal($total);
    }

    function listItems()
    {
        $formatter = new Formatter();
        $html = "";
        $id = 0;
        foreach ($_SESSION["Cart"] as $item) {
            if ($item["quantity"] == 0) {

            } else {
                $html = $html .
                    '<pre>
                        <div class="name">' . $this->getName($item) . '</div><div class="price">Price: $' . $formatter->formatPrice($item) . '</div><div class="quantity">Quantity: ' . $item["quantity"] . '</div><div class="total">Total: $' . $this->getTotal($item) . '</div><form class="removeForm" method="POST"><input class="removeInput" type="hidden" name="removeId" value=' . $id . ' /><input class="removeInput"  type="submit" name="removeButton" value="Remove from Cart" /></form>
                    </pre>';
            }
            echo("<script>console.log('" . $this->getName($item) . "s Id is: " . $id . "');</script>");
            $id++;
        }

        $html = $html .
            '<pre>
                <div class="overallTotal">Overall Total: $' . $this->getOverallTotal() . '</div>
            </pre>';

        return $html;
    }

    function removeFromCart($removeId)
    {
        echo("<script>console.log('remove() called');</script>");
        echo("<script>console.log('removeId is: " . $removeId . "');</script>");
        $cart = $this->getCart();
        switch ($removeId) {
            case 0:
                $cart[0]["quantity"]--;
                break;
            case 1:
                $cart[1]["quantity"]--;
                break;
            case 2:
                $cart[2]["quantity"]--;
                break;
            case 3:
                $cart[3]["quantity"]--;
                break;
            case 4:
                $cart[4]["quantity"]--;
                break;
            default:
                echo "default";
                break;
        }

        $this->setCart($cart);

    }
}

class Products
{
    private $products;

    public function __construct()
    {
        $this->products = $this->getProducts();
    }

    function getProducts()
    {
        return
            // ######## please do not alter the following code ########
            $products = [
                ["name" => "Sledgehammer", "price" => 125.75],
                ["name" => "Axe", "price" => 190.50],
                ["name" => "Bandsaw", "price" => 562.131],
                ["name" => "Chisel", "price" => 12.9],
                ["name" => "Hacksaw", "price" => 18.45],
            ];
        // ########################################################
    }

    public function listProducts()
    {
        $html = "";
        $id = 0;
        $formatter = new Formatter();
        foreach ($this->products as $product) {
            $html = $html .
                '<li>
                    <div class="name">' . $product["name"] . '</div><div class="price">$' . $formatter->formatPrice($product) . '</div>
                    <form class="addForm" method="POST">
                        <input class="addInput"  type="hidden" name="productId" value=' . $id . ' />
                        <input class="addInput"  type="submit" name="addButton" value="Add to Cart" />
                    </form>
                </li>';
            $id++;
        }

        return $html;
    }
}

class Formatter
{
    function formatPrice($item)
    {
        $number = $item["price"];

        return number_format($number, 2);
    }

    function formatTotal($number)
    {

        return number_format($number, 2);
    }
}