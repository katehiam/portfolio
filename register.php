<?php
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/hasher.php");

$oForm = new Form("register");

if(isset($_POST['submit'])){
	$oForm->data = $_POST;

	$oForm->checkEmail('email');
	$oForm->checkName('firstName');
	$oForm->checkName('lastName');
	$oForm->checkRequired('address');
	$oForm->checkRequired('password');
	$oForm->checkConfirmPassword('password','confirmPassword');

	// check email is unique
	$oTempCustomer = new Customer(); // create a temporary customer that has that email, checks against
	$bEmailExists = $oTempCustomer->loadByEmail($_POST["email"]); // customer exists = true, customer doesnt = false
	if($bEmailExists == true){ // if customer exists 
		$oForm->raiseCustomErrors("email","Already taken"); // raise an error for that control
	}else{ // if email is free to use
		
		if($oForm->valid == true){
			$oCustomer = new Customer();

			$oCustomer->email = $_POST['email'];
			$oCustomer->firstName = $_POST['firstName'];
			$oCustomer->lastName = $_POST['lastName'];
			$oCustomer->address = $_POST['address'];
			$oCustomer->password = Encrypt::encode($_POST['password']);

			$oCustomer->save();

			// redirect
			header("Location:login.php"); // tweak the output_buffering in php.ini
			exit;

		}
	}

}

$oForm->makeInput('email','Email','email');
$oForm->makeInput('firstName','First Name','name');
$oForm->makeInput('lastName','Last Name','name');
$oForm->makeTextArea('address','Address');
$oForm->makePasswordInput('password','Password');
$oForm->makeConfirmPasswordInput('confirmPassword','Confirm Password','confirmPassword');
$oForm->makeSubmit('submit','Register');

?>

<h1>Register</h1>

<!--
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
-->

<?php
echo $oForm->html;
?>

<p id="loginregister"><a href="login.php">Already have an account? Login</a></p>

<?php
require_once("includes/footer.php");
?>