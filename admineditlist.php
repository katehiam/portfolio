<?php
require_once("includes/header.php");
require_once("includes/projectmanager.php");

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

?>

<h1>Choose a Project</h1>

<?php

echo View::renderEditList(ProjectManager::getProjects());

require_once("includes/footer.php");
?>