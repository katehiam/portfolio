<?php

require_once('order.php');
require_once('project.php');

class OrderLine{

	private $iOrderLineId;
	private $iOrderId;
	private $iProjectId;
	private $iQuantity;

	public function __construct(){
		$this->iOrderLineId = 0;
		$this->iOrderId = 0;
		$this->iProjectId = 0;
		$this->iQuantity = 0;
	}

	public function save(){
		$oDatabase = new Database();

		//insert
		$sSQL = "INSERT INTO tborderline (orderId, projectId, quantity)
				VALUES ('".$oDatabase->escape_value($this->iOrderId)."',
						'".$oDatabase->escape_value($this->iProjectId)."',
						'".$oDatabase->escape_value($this->iQuantity)."')";

		$bResult = $oDatabase->query($sSQL);

		if($bResult == true){
			$this->iOrderLineId = $oDatabase->get_insert_id();
		}else{
			die($sSQL." has failed");
		}

		$oDatabase->close();
	}

	public function __set($sProperty,$value){
		switch($sProperty){
			case 'orderId':
				$this->iOrderId = $value;
				break;
			case 'projectId':
				$this->iProjectId = $value;
				break;
			case 'qty':
				$this->iQuantity = $value;
				break;
			default:
				die($sProperty." could not be written to");
		}
	}

}

// --- TESTING --- //

// testing save()
/*
$oOrderLine = new OrderLine();
$oOrderLine->orderId = 2;
$oOrderLine->projectId = 2;
$oOrderLine->qty = 4;
$oOrderLine->save();
echo "<pre>";
print_r($oOrderLine);
echo "</pre>";
*/

?>