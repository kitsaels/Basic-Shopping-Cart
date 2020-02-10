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
<ul class="products">
    <?php
        echo $products->listProducts();

        if (isset($_POST['productId'])) {
            $productId = intVal($_POST['productId']);
        }
    ?>
</ul>

</body>
</html>