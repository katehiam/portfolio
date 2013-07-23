<?php
ob_start();
require_once("includes/cart.php");
session_start();

unset($_SESSION["cart"]);
$oCart = new Cart();
$_SESSION['cart'] = $oCart;
// redirect
header("Location:orderComplete.php");
exit;
?>