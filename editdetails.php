<?php
require_once("includes/header.php");
?>

<h1>Edit Details</h1>
<form action="cart.php" onsubmit="return checkSubmit()">
	<fieldset>
		<label>First Name</label><span class="error" id="spantest"></span>
		<input type="text" id="firstName" onblur="checkName(this.id)" />
		<label>Last Name</label><span class="error"></span>
		<input type="text" id="lastName" onblur="checkName(this.id)" />
		<label>Postal Address</label><span class="error"></span>
		<textarea id="address" onblur="checkRequired(this.id)"></textarea>
		<input type="submit" value="Update" />
	</fieldset>
</form>

<?php
require_once("includes/footer.php");
?>