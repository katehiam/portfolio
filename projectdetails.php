<?php
require_once("includes/header.php");
require_once("includes/project.php");

$iCurrentProjectId = 1;

if(isset($_GET['projectId'])){
	$iCurrentProjectId = $_GET['projectId'];
}

$oCurrentProject = new Project();
$oCurrentProject->load($iCurrentProjectId);

echo View::renderProjectDetails($oCurrentProject);

?>

<?php
require_once("includes/footer.php");
?>