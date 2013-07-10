<?php
require_once("includes/header.php");

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

<h1>Admin Functions</h1>

<ul>
	<li><a href="adminaddproject.php">Add Project</a></li>
	<li><a href="admineditproject.php">Edit Project</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>

<?php
require_once("includes/footer.php");
?>