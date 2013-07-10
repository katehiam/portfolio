<?php

require_once('customer.php');

class Order{

	private $iOrderId;
	private $iCustomerId;
	private $sOrderDate;

	public function __construct(){
		$this->iOrderId = 0;
		$this->iCustomerId = 0;
		$this->sOrderDate = '';
	}

	public function save(){
		$oDatabase = new Database();

		$sSQL = "INSERT INTO tborder (customerId, orderDate)
				VALUES ('".$oDatabase->escape_value($this->iCustomerId)."',
						'".$oDatabase->escape_value($this->sOrderDate)."')";

		$bResult = $oDatabase->query($sSQL);

		if($bResult == true){
			$this->iOrderId = $oDatabase->get_insert_id();
		}else{
			die($sSQL." has failed");
		}

		$oDatabase->close();
	}

	public function __set($sProperty,$value){
		switch($sProperty){
			case 'customerId':
				$this->iCustomerId = $value;
				break;
			case 'date':
				$this->sOrderDate = $value;
				break;
			default:
				die($sProperty." could not be written to");
		}
	}

}

// --- TESTING --- //

// testing save()
/*
$oOrder = new Order;
$oOrder->customerId = 3;
$oOrder->date = '8-07-2013';
$oOrder->save();
echo "<pre>";
print_r($oOrder);
echo "</pre>";
*/

?>