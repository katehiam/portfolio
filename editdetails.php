<?php
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/customer.php");

if(!isset($_SESSION['currentUser'])){
	//redirect
	header("Location:login.php"); // tweak the output_buffering in php.ini
	exit;
}

$oCustomer = new Customer();
$oCustomer->load($_SESSION['currentUser']);

$oForm = new Form();

// get data from database to insert into input boxes
$aData = array();
$aData['firstName'] = $oCustomer->firstName;
$aData['lastName'] = $oCustomer->lastName;
$aData['address'] = $oCustomer->address;

$oForm->data = $aData;

if(isset($_POST['submit'])){
	$oForm->checkName('firstName');
	$oForm->checkName('lastName');
	$oForm->checkRequired('address');

	if($oForm->valid == true){
		$oCustomer->firstName = $_POST['firstName'];
		$oCustomer->lastName = $_POST['lastName'];
		$oCustomer->address = $_POST['address'];
		$oCustomer->save();

		//redirect
		header("Location:cart.php"); // tweak the output_buffering in php.ini
		exit;

	}

}

$oForm->makeInput('firstName','First Name');
$oForm->makeInput('lastName','Last Name');
$oForm->makeTextArea('address','Postal Address');
$oForm->makeSubmit('submit','Update');

?>

<h1>Edit Details</h1>

<?php

echo $oForm->html;

require_once("includes/footer.php");
?>