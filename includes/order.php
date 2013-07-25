<?php

require_once('orderline.php');
require_once('customer.php');

class Order{

	private $iOrderId;
	private $iCustomerId;
	private $sOrderDate;
	private $iTotalPrice;
	private $aOrderLines;

	public function __construct(){
		$this->iOrderId = 0;
		$this->iCustomerId = 0;
		$this->sOrderDate = '';
		$this->iTotalPrice = 0;
		$this->aOrderLines = array();
	}

	public function load($iOrderId){
		$oDatabase = new Database();

		/* load order details */
		$sSQL = "SELECT id, customerId, orderDate, totalPrice
				FROM tborder
				WHERE id=".$oDatabase->escape_value($iOrderId);
		$oResult = $oDatabase->query($sSQL);
		$aOrder = $oDatabase->fetch_array($oResult);

		$this->iOrderId = $aOrder['id'];
		$this->iCustomerId = $aOrder['customerId'];
		$this->sOrderDate = $aOrder['orderDate'];
		$this->iTotalPrice = $aOrder['totalPrice'];

		/* load orderline details under this order */
		$sSQL = "SELECT id
				FROM tborderline
				WHERE orderId=".$oDatabase->escape_value($iOrderId);
		$oResult = $oDatabase->query($sSQL);
		while($aRow = $oDatabase->fetch_array($oResult)){
			$oOrderLine = new OrderLine();
			$oOrderLine->load($aRow['id']);
			$this->aOrderLines[] = $oOrderLine;
		}

		$oDatabase->close;
	}

	public function save(){
		$oDatabase = new Database();

		$sSQL = "INSERT INTO tborder (customerId, orderDate, totalPrice)
				VALUES ('".$oDatabase->escape_value($this->iCustomerId)."',
						'".$oDatabase->escape_value($this->sOrderDate)."',
						'".$oDatabase->escape_value($this->iTotalPrice)."')";

		$bResult = $oDatabase->query($sSQL);

		if($bResult == true){
			$this->iOrderId = $oDatabase->get_insert_id();
		}else{
			die($sSQL." has failed");
		}

		$oDatabase->close();
	}

	public function __get($sProperty){
		switch($sProperty){
			case 'id':
				return $this->iOrderId;
				break;
			case 'date':
				return $this->sOrderDate;
				break;
			case 'totalPrice':
				return $this->iTotalPrice;
				break;
			case 'orderLines':
				return $this->aOrderLines;
				break;
			default:
				die($sProperty." could not be read from");
		}
	}

	public function __set($sProperty,$value){
		switch($sProperty){
			case 'customerId':
				$this->iCustomerId = $value;
				break;
			case 'date':
				$this->sOrderDate = $value;
				break;
			case 'totalPrice':
				$this->iTotalPrice = $value;
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

// testing load()
/*
$oOrder = new Order;
$oOrder->load('5');
echo "<pre>";
print_r($oOrder);
echo "</pre>";
*/

?>