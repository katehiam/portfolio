<?php

require_once('project.php');

class ProjectManager{

	static public function getProjects(){
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

	static public function search($sKeywords){
		$oDatabase = new Database();

		$sSQL = "SELECT id,
				MATCH (name, description)
					AGAINST ('".$sKeywords."' IN NATURAL LANGUAGE MODE)relevance
				FROM tbproject
				WHERE MATCH (name, description)
					AGAINST ('".$sKeywords."' IN NATURAL LANGUAGE MODE)
				ORDER BY relevance DESC";
		$oResult = $oDatabase->query($sSQL);
		$aProjects = array();
		while($aRow = $oDatabase->fetch_array($oResult)){
			$oProject = new Project();
			$oProject->load($aRow['id']);
			$aProjects[] = $oProject;
		}

		$oDatabase->close;

		return $aProjects;
	}

}

// --- TESTING --- //

// testing getProjects()
/*
$oPM = new ProjectManager();
echo "<pre>";
print_r($oPM->getProjects());
echo "</pre>";
*/

// testing search()
/*
$oPM = new ProjectManager();
echo "<pre>";
print_r($oPM->search('illustration'));
echo "</pre>";
*/

?>