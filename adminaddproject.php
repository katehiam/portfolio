<?php
require_once("includes/header.php");
require_once("includes/form.php");
require_once("includes/project.php");

// admin verification -----
require_once("includes/customer.php");
if(!isset($_SESSION['currentUser'])){
	header("Location:login.php");
	exit;
}else{
	$oCustomer = new Customer();
	$oCustomer->load($_SESSION['currentUser']);
	if(!$oCustomer->admin){ // if not admin
		header("Location:index.php");
		exit;
	}
}
// ----- end admin verification

$oForm = new Form();

if(isset($_POST['submit'])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;

	$oForm->checkRequired('name');
	$oForm->checkRequired('desc');
	$oForm->checkImageUpload('image');
	if($_POST['product'] == "1"){
		$oForm->checkNumerics('price');
	}

	if($oForm->valid == true){

		$oProject = new Project();

		// rename and move image
		$sNewName = time()."-".$_POST['name'].".jpg";
		$oForm->moveFile("image",$sNewName);

		$oProject->name = $_POST['name'];
		$oProject->date = date("Y-m-d");
		$oProject->desc = $_POST['desc'];
		$oProject->image = $sNewName;
		$oProject->product = $_POST['product'];
		$oProject->price = $_POST['price'];

		$oProject->save();

		// redirect
		$sLocation = 'Location:index.php';
		header($sLocation); // tweak the output_buffering in php.ini
		exit;
	}
}

$oForm->makeInput('name','Name','required');
$oForm->makeTextArea('desc','Description');
$oForm->makeFileUpload('image','Image');
$oForm->makeCheck('product','Product','1');
$oForm->makeInput('price','Price','numeric');
$oForm->makeSubmit('submit','Add');

?>

<h1>Add Project</h1>

<?php

echo $oForm->html;

require_once("includes/footer.php");
?>