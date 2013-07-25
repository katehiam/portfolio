<?php
require_once("includes/header.php");
require_once("includes/customer.php");
require_once("includes/form.php");
require_once("includes/ordermanager.php");

echo View::renderOrders(OrderManager::load($_SESSION['currentUser']));

?>

<?php
require_once("includes/footer.php");
?>