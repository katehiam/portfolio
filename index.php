<?php
require_once("includes/header.php");
require_once("includes/projectmanager.php");
require_once("includes/form.php");

$oForm = new Form('searchbar');
$oForm->makeInput("search","");
$oForm->makeSubmit("submit","&#128269;");

echo $oForm->html;
if((isset($_POST["submit"])) && (!empty($_POST['search']))){
	echo View::renderProjects(ProjectManager::search($_POST["search"]));
}else{
	echo View::renderProjects(ProjectManager::getProjects());
}

require_once("includes/footer.php");

?>

