<?php
ob_start();
require_once("includes/cart.php");
session_start();
require_once("includes/project.php");

$iProductId = 1;
if(isset($_GET['id'])){
	$iProductId = $_GET['id'];
}
$oCart = $_SESSION['cart'];
$oProject = new Project();
$oProject->load($iProductId);
if($oProject->product){ // only add to cart if it is actually a product
	$oCart->add($iProductId,1);
}

// redirect
header("Location:cart.php");
exit;

?>