<?php
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");

$oForm = new Form();

// if the user is logged on
if(isset($_SESSION['currentUser'])){
	$oCustomer = new Customer();
	$oCustomer->load($_SESSION['currentUser']);

	// get data from database to insert into input boxes
	$aData = array();
	$aData['name'] = $oCustomer->firstName.' '.$oCustomer->lastName;
	$aData['contactEmail'] = $oCustomer->email;
		
	$oForm->data = $aData;
}

if(isset($_POST['submit'])){
	$oForm->data = $_POST;

	$oForm->checkRequired('name');
	$oForm->checkEmail('contactEmail');
	$oForm->checkRequired('message');

	if($oForm->valid == true){

		// code to send email here

		// redirect
		header("Location:index.php");
		exit;
	}
}

$oForm->makeInput('name','Your Name','required');
$oForm->makeInput('company','Company');
$oForm->makeInput('contactEmail','Contact Email','email');
$oForm->makeTextArea('message','Message');
$oForm->makeSubmit('submit','Send');

?>

<h1>Email Me</h1>

<?php

echo $oForm->html;

require_once("includes/footer.php");
?>