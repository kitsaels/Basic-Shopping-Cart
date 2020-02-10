<?php
include ("ShoppingCart.php");
$products = new Products();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Title</title>
</head>
<body>
<h1>Products</h1>
<?php
    $products->listProducts();
?>
</body>
</html>