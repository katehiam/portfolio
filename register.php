<?php
require_once("includes/header.php");
?>

<h1>Register</h1>
<form id="register">
	<fieldset>
		<label>Email</label><span class="error"></span>
		<input type="text" id="email" onblur="checkEmail(this.id)" />
		<label>First Name</label><span class="error"></span>
		<input type="text" id="firstName" onblur="checkName(this.id)" />
		<label>Last Name</label><span class="error"></span>
		<input type="text" id="lastName" onblur="checkName(this.id)" />
		<label>Address</label><span class="error"></span>
		<textarea id="address" onblur="checkRequired(this.id)"></textarea>
		<label>Password</label><span class="error"></span>
		<input type="password" id="password" onblur="checkRequired(this.id)" />
		<label>Confirm Password</label><span class="error"></span>
		<input type="password" id="confirmPassword" onblur="checkConfirmPassword(this.id)" />
		<input type="submit" value="Register" />
	</fieldset>
	<p id="loginregister"><a href="login.php">Already have an account? Login</a></p>
</form>

<?php
require_once("includes/footer.php");
?>