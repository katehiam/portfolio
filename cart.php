<?php
require_once("includes/header.php");
require_once("includes/customer.php");
require_once("includes/form.php");
require_once("includes/project.php");
require_once("includes/order.php");
require_once("includes/orderline.php");

$oCustomer = new Customer;
$oCustomer->load($_SESSION['currentUser']);

$oCart = $_SESSION['cart'];

// incomplete
$iGrandTotal = View::grandTotal($oCart);

$oForm = new Form('purchase');

if((isset($_POST['submit'])) && (count($oCart->contents) != 0)){

	// create order
	$oOrder = new Order;
	$oOrder->customerId = $oCustomer->id;
	$oOrder->date = date("Y-m-d");
	$oOrder->totalPrice = $iGrandTotal; // incomplete
	$oOrder->save();

	// create orderline
	foreach($oCart->contents as $key=>$value){
		$oOrderLine = new OrderLine;
		$oOrderLine->orderId = $oOrder->id;
		$oOrderLine->projectId = $key;
		$oOrderLine->qty = $value;
		$oOrderLine->save();
	}

	header("Location:clearcart.php");
	exit;
}

$oForm->makeSubmit('submit','Purchase');
?>

<h1>Cart</h1>

<?php
echo View::renderCartOrderList($oCart);
echo View::renderCartAddress($oCustomer);
echo $oForm->html;
?>

<div class="accountFunctions">
	<a href="editdetails.php" class="accountFunctions icon" alt="Edit Details">&#9998;</a>
	<a href="logout.php" class="accountFunctions icon" alt="Logout">&#59201;</a>
	<a href="orders.php" alt="Orders">Orders</a>
</div>


<?php
require_once("includes/footer.php");
?>