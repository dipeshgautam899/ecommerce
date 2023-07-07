<?php include('config/db.php');?>

<?php

session_start();

// Check if the product is already in the cart
if(isset($_SESSION['cart'][$_GET['id']])) {
    $_SESSION['cart'][$_GET['id']]++;
} else {
    $_SESSION['cart'][$_GET['id']] = 1;
}

// Redirect to the shopping cart page
header("Location:/ecommerce/cart.php");
exit;


?>