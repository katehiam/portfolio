<?php

require_once('project.php');

class ProjectManager{

	public function getAll(){
		$oDatabase = new Database();
		$sSQL = 'SELECT id FROM tbproject';
		$oResult = $oDatabase->query($sSQL);
		$aProjects = array();
		while($aRow = $oDatabase->fetch_array($oResult)){ // create an array containing the Project object on each new row of the array
			$oProject = new Project();
			$oProject->load($aRow['id']);
			$aProjects[] = $oProject; // add new Project object to array
		}

		$oDatabase->close();
		return $aProjects;
	}

}

// --- TESTING --- //

// testing getAll()
/*
$oPM = new ProjectManager();
echo "<pre>";
print_r($oPM->getAll());
echo "</pre>";
*/

?>