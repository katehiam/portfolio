<?php
ob_start();
require_once("includes/cart.php");
session_start();
require_once("includes/views.php");
require_once("includes/customer.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<script type="text/javascript" src="assets/javascript.js"></script>
	<title>Kate Hiam - Graphic and Web Designer</title>
	</head>

	<body>
		<div id="container">

			<div id="header">
				<div id="logo">Kate Hiam | Graphic and Web Designer</div>
				<ul id="nav">
					<li><a href="index.php">&#59290;</a></li>
					<li><a href="about.php">&#128100;</a></li>
					<?php
					if(isset($_SESSION['currentUser'])){
						$oTestCustomer = new Customer();
						$oTestCustomer->load($_SESSION['currentUser']);
						if($oTestCustomer->admin){
							?>
							<li><a href="adminmenu.php">&#59197;</a></li>
							<?php
						}else{
							?>
							<li><a href="cart.php">&#59197;</a></li>
							<?php
						}
					}else{
						?>
						<li><a href="login.php">&#59197;</a></li>
						<?php
					}
					?>
				</ul>
			</div>
			<div id="content">