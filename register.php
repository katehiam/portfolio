<?php
require_once("includes/header.php");
?>

<h1>Register</h1>
<form>
	<fieldset>
		<label>Email</label><span class="error">space for error</span><input type="text" />
		<label>Address</label><textarea></textarea>
		<label>Password</label><input type="password" />
		<label>Confirm Password</label><input type="password" />
		<input type="submit" value="Register" />
	</fieldset>
	<p id="loginregister"><a href="login.php">Or login</a></p>
</form>

<?php
require_once("includes/footer.php");
?>