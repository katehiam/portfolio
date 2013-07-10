<?php

class Cart{
	private $aContents;

	public function __construct(){
		$this->aContents = array();
	}

	public function add($iProductId,$iQty){

		// if product is not in cart, add it to array
		if(!isset($this->aContents[$iProductId])){
			$this->aContents[$iProductId] = $iQty;
		}else{ // else if product already exists in cart just add to qty
			$this->aContents[$iProductId] += $iQty;
		}

	}

	public function remove($iProductId,$iQty){

		$this->aContents[$iProductId] -= $iQty;

		if($this->aContents[$iProductId] <= 0){
			unset($this->aContents[$iProductId]);
		}

	}

	public function __get($sProperty){
		switch($sProperty){
			case 'contents':
				return $this->aContents;
				break;
			default:
				die($sProperty.' could not be read from');
		}
	}

}

// --- TESTING --- //

// testing add() and remove()
/*
$oCart = new Cart();
$oCart->add(1,1);
$oCart->add(2,2);
$oCart->remove(2,1);
echo "<pre>";
print_r($oCart);
echo "</pre>";
*/

?>