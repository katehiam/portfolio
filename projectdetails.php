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

<!--
<img src="assets/images/huskypuppies.jpg" id="detailsImg">
<div id="detailsContent">
	<h2>Husky Puppies Artwork</h2>
	<p>This was a personal project for me, created with pencil and rendered in Illustrator and Photoshop.</p>
	<span class="icon">
		<a href="assets/images/huskypuppies.jpg">&#59157;</a>
		<a href="cart.php">&#10133;&#59197;</a>
	</span>
</div>
-->

<?php
require_once("includes/footer.php");
?>