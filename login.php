<?php
require_once("includes/header.php");
?>

<h1>Login</h1>
<form action="cart.php">
	<fieldset>
		<label>Email</label><span class="error">space for error</span><input type="text" />
		<label>Password</label><input type="password" />
		<input type="submit" value="Login" />
	</fieldset>
	<p id="loginregister"><a href="register.php">Or register now</a></p>
</form>

<?php
require_once("includes/footer.php");
?>