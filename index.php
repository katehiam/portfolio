<?php
require_once("includes/header.php");
require_once("includes/projectmanager.php");

echo View::renderProjects(ProjectManager::getProjects());

require_once("includes/footer.php");
?>