<?php

require_once('db.php');

class Customer{

	private $iCustomerId;
	private $sFirstName;
	private $sLastName;
	private $sEmail;
	private $sAddress;
	private $sPassword;
	private $iAdmin;

	public function __construct(){
		$this->iCustomerId = 0;
		$this->sFirstName = '';
		$this->sLastName = '';
		$this->sEmail = '';
		$this->sAddress = '';
		$this->sPassword = '';
	}

	public function load($iCustomerId){
		$oDatabase = new Database();

		$sSQL = "SELECT id, firstName, lastName, email, address, password, admin
				FROM tbcustomer
				WHERE id = ".$oDatabase->escape_value($iCustomerId);

		$oResult = $oDatabase->query($sSQL);
		$aCustomer = $oDatabase->fetch_array($oResult);

		$this->iCustomerId = $aCustomer['id'];
		$this->sFirstName = $aCustomer['firstName'];
		$this->sLastName = $aCustomer['lastName'];
		$this->sEmail = $aCustomer['email'];
		$this->sAddress = $aCustomer['address'];
		$this->sPassword = $aCustomer['password'];
		$this->iAdmin = $aCustomer['admin'];

		$oDatabase->close();
	}

	public function loadByEmail($sEmail){
		$oDatabase = new Database();

		$sSQL = "SELECT id, email
				FROM tbcustomer
				WHERE email = '".$oDatabase->escape_value($sEmail)."'";
		$bResult = $oDatabase->query($sSQL);
		$aArray = $oDatabase->fetch_array($bResult);

		$oDatabase->close();

		if($aArray == false){
			return false;
		}else{
			$this->load($aArray['id']);
			return true;
		}

	}

	public function save(){
		$oDatabase = new Database();

		if($this->iCustomerId == 0){
			// insert
			$sSQL = "INSERT INTO tbcustomer (firstName, lastName, email, address, password)
					VALUES ('".$oDatabase->escape_value($this->sFirstName)."',
							'".$oDatabase->escape_value($this->sLastName)."',
							'".$oDatabase->escape_value($this->sEmail)."',
							'".$oDatabase->escape_value($this->sAddress)."',
							'".$oDatabase->escape_value($this->sPassword)."')";

			$bResult = $oDatabase->query($sSQL);
			if($bResult==true){ // if it was inserted with no errors
				$this->iCustomerId = $oDatabase->get_insert_id();
			}else{
				die($sSQL." has failed");
			}

		}else{
			// update
			$sSQL = "UPDATE tbcustomer
					SET firstName = '".$oDatabase->escape_value($this->sFirstName)."',
					lastName = '".$oDatabase->escape_value($this->sLastName)."',
					address = '".$oDatabase->escape_value($this->sAddress)."'
					WHERE id = ".$oDatabase->escape_value($this->iCustomerId);

			$bResult = $oDatabase->query($sSQL);
			if($bResult==false){ // if errors occurred
				die($sSQL." has failed");
			}
		}
		$oDatabase->close();

	}

	public function __get($sProperty){
		switch($sProperty){
			case 'id':
				return $this->iCustomerId;
				break;
			case 'firstName':
				return $this->sFirstName;
				break;
			case 'lastName':
				return $this->sLastName;
				break;
			case 'email':
				return $this->sEmail;
				break;
			case 'address':
				return $this->sAddress;
				break;
			case 'password':
				return $this->sPassword;
				break;
			case 'admin':
				if($this->iAdmin == 0){
					return false; // if not admin, return false
				}else{
					return true; // if admin, return true
				}
				break;
			default:
				die($sProperty." is not allowed to be read from");
		}
	}

	public function __set($sProperty,$value){
		switch($sProperty){
			case 'firstName':
				$this->sFirstName = $value;
				break;
			case 'lastName':
				$this->sLastName = $value;
				break;
			case 'email':
				$this->sEmail = $value;
				break;
			case 'address':
				$this->sAddress = $value;
				break;
			case 'password':
				$this->sPassword = $value;
				break;
			default:
				die($sProperty." is not allowed to be written to");
		}
	}

}

// --- TESTING --- //

// testing load()
/*
$oCustomer = new Customer();
$oCustomer->load(1);
echo "<pre>";
print_r($oCustomer);
echo "</pre>";
*/

// testing save()
/*
$oCustomer = new Customer();
$oCustomer->firstName = 'Save';
$oCustomer->lastName = 'Test';
$oCustomer->email = 'save@test.test';
$oCustomer->address = '62 waterlane test st';
$oCustomer->password = '12345';
$oCustomer->save();
echo "<pre>";
print_r($oCustomer);
echo "</pre>";
*/

// testing update save()
/*
$oCustomer = new Customer();
$oCustomer->load(3);
$oCustomer->firstName = 'Update';
$oCustomer->save();
echo "<pre>";
print_r($oCustomer);
echo "</pre>";
*/

?>