<?php
ob_start();
require_once("includes/cart.php");
session_start();

$iProductId = 1;
if(isset($_GET['id'])){
	$iProductId = $_GET['id'];
}
$oCart = $_SESSION['cart'];
$oCart->remove($iProductId,1);

// redirect
header("Location:cart.php");
exit;

?>