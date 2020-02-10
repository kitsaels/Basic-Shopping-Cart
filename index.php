<?php
include ("ShoppingCart.php");
session_start();

$products = new Products();
$cart = new Cart();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<h1>Products</h1>
<div id="products-wrapper">
<ul class="products">
    <?php
        echo $products->listProducts();

        if (isset($_POST['addButton'])) {
            $productId = intVal($_POST['productId']);
            $cart->addToCart($productId);
        }
    ?>
</ul>
</div>
<h1>Cart</h1>
<div id="cart-wrapper">

        <?php
        echo $cart->listItems();

        if (isset($_POST['removeButton'])) {
            $productId = intVal($_POST['productId']);
            $cart->removeFromCart($productId);
        }
        ?>
</div>

</body>
</html>