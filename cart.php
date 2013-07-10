<?php
require_once("includes/header.php");
require_once("includes/customer.php");
require_once("includes/form.php");
require_once("includes/project.php");

$oCustomer = new Customer;
$oCustomer->load($_SESSION['currentUser']);

$oForm = new Form('purchase');
$oForm->makeSubmit('submit','Purchase');
?>

<h1>Cart</h1>

<?php
echo View::renderCartOrderList($_SESSION['cart']);
echo View::renderCartAddress($oCustomer);
echo $oForm->html;
?>

<div class="accountFunctions">
	<a href="editdetails.php" class="accountFunctions icon" alt="Edit Details">&#9998;</a>
	<a href="logout.php" class="accountFunctions icon" alt="Logout">&#59201;</a>
</div>


<?php
require_once("includes/footer.php");
?>