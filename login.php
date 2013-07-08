<?php
require_once("includes/header.php");
?>
<script type="text/javascript" src="assets/javascript.js"></script>
<h1>Login</h1>
<form action="cart.php" onsubmit="return checkSubmit()">
	<fieldset>
		<label>Email</label><span class="error" id="spantest"></span>
		<input type="text" id="email" onblur="checkEmail(this.id)" />
		<label>Password</label><span class="error"></span>
		<input type="password" id="password" onblur="checkRequired(this.id)" />
		<input type="submit" value="Login" />
	</fieldset>
	<p id="loginregister"><a href="register.php">Or register now</a></p>
</form>

<?php
require_once("includes/footer.php");
?>