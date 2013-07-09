<?php
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/hasher.php");

$oForm = new Form();

if(isset($_POST['submit'])){
	$oForm->data = $_POST;

	$oTempCustomer = new Customer();

	$bValidEmail = $oTempCustomer->loadByEmail($_POST['email']);

	if($bValidEmail == false){ // if email does not exist
		$oForm->raiseCustomErrors("email","Email does not exist");
	}else{ // if email does exist
		if($oTempCustomer->password == Encrypt::encode($_POST['password'])){
			// redirect
			header("Location:cart.php"); // tweak the output_buffering in php.ini
			exit;

		}else{ // if password is incorrect
			$oForm->raiseCustomErrors("password","Incorrect");
		}
	}

}

$oForm->makeInput('email','Email');
$oForm->makePasswordInput('password','Password');
$oForm->makeSubmit('submit','Login');

?>

<h1>Login</h1>

<!--
<form action="cart.php" onsubmit="return checkSubmit()">
	<fieldset>
		<label>Email</label><span class="error" id="spantest"></span>
		<input type="text" id="email" onblur="checkEmail(this.id)" />
		<label>Password</label><span class="error"></span>
		<input type="password" id="password" onblur="checkRequired(this.id)" />
		<input type="submit" value="Login" />
	</fieldset>
</form>
-->

<?php
echo $oForm->html;
?>

<p id="loginregister"><a href="register.php">Or register now</a></p>

<?php
require_once("includes/footer.php");
?>