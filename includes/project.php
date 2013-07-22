<?php

require_once('db.php');

class Project{

	private $iProjectId;
	private $sName;
	private $dDate;
	private $sDesc;
	private $sImage;
	private $iProduct;
	private $iPrice;
	private $iDeleted;

	public function __construct() {
		$this->iProjectId = 0;
		$this->sName = '';
		$this->dDate = '';
		$this->sDesc = '';
		$this->sImage = '';
		$this->iProduct = 0; // 0 = not product. 1 = product
		$this->iDeleted = 0; // 0 = active. 1 = deleted
	}

	// this function will load a project from the db
	// precondition: projectID to load must exist
	public function load($iProjectId){
		$oDatabase = new Database();

		$sSQL = 'SELECT id, name, date, description, image, product, price, deleted
					FROM tbproject
					WHERE id = '.$oDatabase->escape_value($iProjectId);

		$oResult = $oDatabase->query($sSQL);
		$aProject = $oDatabase->fetch_array($oResult);

		// assign array into object values
		$this->iProjectId = $aProject['id'];
		$this->sName = $aProject['name'];
		$this->dDate = $aProject['date'];
		$this->sDesc = $aProject['description'];
		$this->sImage = $aProject['image'];
		$this->iProduct = $aProject['product'];
		$this->iPrice = $aProject['price'];
		$this->iDeleted = $aProject['deleted'];

		$oDatabase->close();

	}

	// this function will save or update a project in the db
	public function save(){
		$oDatabase = new Database();

		if($this->iProjectId == 0){
			//insert
			$sSQL = "INSERT INTO tbproject (name, date, description, image, product, price, deleted)
					VALUES ('".$oDatabase->escape_value($this->sName)."',
							'".$oDatabase->escape_value($this->dDate)."',
							'".$oDatabase->escape_value($this->sDesc)."',
							'".$oDatabase->escape_value($this->sImage)."',
							'".$oDatabase->escape_value($this->iProduct)."',
							'".$oDatabase->escape_value($this->iPrice)."',
							'0')";

			$bResult = $oDatabase->query($sSQL);

			if($bResult==true){
				$this->iProjectId = $oDatabase->get_insert_id();
			}else{
				die($sSQL." has failed");
			}

		}else{
			// update (don't update date)
			$sSQL = "UPDATE tbproject
					SET name='".$oDatabase->escape_value($this->sName)."',
					description='".$oDatabase->escape_value($this->sDesc)."',
					image='".$oDatabase->escape_value($this->sImage)."',
					product='".$oDatabase->escape_value($this->iProduct)."',
					price='".$oDatabase->escape_value($this->iPrice)."',
					deleted='".$oDatabase->escape_value($this->iDeleted)."'
					WHERE id=".$oDatabase->escape_value($this->iProjectId);

			$bResult = $oDatabase->query($sSQL);

			if($bResult==false){
				die($sSQL." has failed");
			}
		}

		$oDatabase->close();
	}

	public function __get($sProperty){
		switch($sProperty){
			case 'id':
				return $this->iProjectId;
				break;
			case 'name':
				return $this->sName;
				break;
			case 'date':
				return $this->dDate;
				break;
			case 'desc':
				return $this->sDesc;
				break;
			case 'image':
				return $this->sImage;
				break;
			case 'product':
				return $this->iProduct;
				break;
			case 'price':
				return $this->iPrice;
				break;
			case 'deleted':
				return $this->iDeleted;
				break;
			default:
				die($sProperty." is not allowed to be read from");
		}
	}

	public function __set($sProperty,$value){
		switch($sProperty){
			case 'name':
				$this->sName = $value;
				break;
			case 'date':
				$this->dDate = $value;
				break;
			case 'desc':
				$this->sDesc = $value;
				break;
			case 'image':
				$this->sImage = $value;
				break;
			case 'product':
				$this->iProduct = $value;
				break;
			case 'price':
				$this->iPrice = $value;
				break;
			case 'deleted':
				$this->iDeleted = $value;
				break;
			default:
				die($sProperty." is not allowed to be written to");
		}
	}

}

// --- TESTING --- //

// testing load()
/*
$oProject = new Project();
$oProject->load(1);
echo "<pre>";
print_r($oProject);
echo "</pre>";
*/

// testing save()
/*
$oProject = new Project();
$oProject->name = 'Test Product';
$oProject->desc = 'this is a test description right here. blah blah.';
$oProject->image = 'testimage.jpg';
$oProject->product = 0;
$oProject->save();
echo "<pre>";
print_r($oProject);
echo "</pre>";
*/

// testing update save()
/*
$oProject = new Project();
$oProject->load(2);
$oProject->name = 'Updated Name';
$oProject->save();
echo "<pre>";
print_r($oProject);
echo "</pre>";
*/

?>