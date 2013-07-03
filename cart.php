<?php
require_once("includes/header.php");
?>

<h1>Cart</h1>
<div id="cart">
	<div class="cartProduct">
		<span class="productName">Item 1</span>
		<span class="productQty">x1</span>
		<span class="productRemove icon"><a href="#">&#9003;</a></span>
		<span class="productPrice">$49.99</span>
	</div>

	<div class="cartProduct">
		<span class="productName">Item 2</span>
		<span class="productQty">x1</span>
		<span class="productRemove icon"><a href="#">&#9003;</a></span>
		<span class="productPrice">$13.99</span>
	</div>

	<div class="cartOtherRow">
		<span class="productName">Shipping</span>
		<span class="productPrice">$3.49</span>
	</div>

	<div class="cartOtherRow">
		<span class="productName">Total</span>
		<span class="productPrice" id="total">$47.47</span>
	</div>

</div>

<form><fieldset><input type="submit" value="Purchase" id="purchase" /></fieldset></form>

<div id="postalAddress">
	<h2>Postal Address</h2>
	<p>Tony Higgens<br />
	12 Watercress Rd<br />
	Remuera<br />
	Auckland 1345</p>
	<a href="editdetails.php">Edit Details</a>
</div>

<a href="#">Logout</a>

<?php
require_once("includes/footer.php");
?>