<?php

require_once('order.php');

class OrderManager{

	static public function load($iCustomerId){
		$oDatabase = new Database();

		$sSQL = "SELECT id
				FROM tborder
				WHERE customerId=".$oDatabase->escape_value($iCustomerId);
		$oResult = $oDatabase->query($sSQL);
		$aOrders = array();
		while($aRow = $oDatabase->fetch_array($oResult)){
			$oOrder = new Order();
			$oOrder->load($aRow["id"]);
			$aOrders[] = $oOrder;
		}

		$oDatabase->close;

		return $aOrders;
	}

}

// --- TESTING --- //

// testing load()
/*
$oOM = new OrderManager();
echo "<pre>";
print_r($oOM->load(12));
echo "</pre>";
*/

?>