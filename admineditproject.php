<?php
require_once("includes/header.php");
require_once("includes/project.php");
require_once("includes/form.php");

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

$iCurrentProject = 1;
if(isset($_GET['id'])){
	$iCurrentProject = $_GET['id'];
}

$oProject = new Project();
$oProject->load($iCurrentProject);

$oForm = new Form();

$aData = array();
$aData['name'] = $oProject->name;
$aData['desc'] = $oProject->desc;
$aData['product'] = $oProject->product;
$aData['price'] = $oProject->price;
$oForm->data = $aData;

if(isset($_POST['submit'])){
	$oForm->data = $_POST;
	$oForm->files = $_FILES;

	$oForm->checkRequired('name');
	$oForm->checkRequired('desc');
	if(!empty($_FILES['image']['name'])){
		$oForm->checkImageUpload('image');
	}
	if($_POST['product'] == "1"){
		$oForm->checkNumerics('price');
	}

	if($oForm->valid == true){
		$oProject->name = $_POST['name'];
		$oProject->date = date("Y-m-d");
		$oProject->desc = $_POST['desc'];
		$oProject->product = $_POST['product'];
		$oProject->price = $_POST['price'];
		$oProject->deleted = $_POST['deleted'];
		
		if(!empty($_FILES['image']['name'])){ // if new image is uploaded
			// rename and move image
			$sNewName = time()."-".$_POST['name'].".jpg";
			$oForm->moveFile("image",$sNewName);
			$oProject->image = $sNewName;
		}

		$oProject->save();

		header('Location:admineditlist.php'); // tweak the output_buffering in php.ini
		exit;
	}
}

$oForm->makeInput('name','Name','required');
$oForm->makeTextArea('desc','Description');
$oForm->makeFileUpload('image','New Image (or leave blank)');
$oForm->makeCheck('product','Product','1');
$oForm->makeInput('price','Price','numeric');
$oForm->makeCheck('deleted','Inactive','1');
$oForm->makeSubmit('submit','Update');

echo View::renderEditProject($oProject,$oForm);

require_once("includes/footer.php");
?>