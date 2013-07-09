<?php
require_once("includes/header.php");
require_once("includes/projectmanager.php");

echo View::renderProjects(ProjectManager::getProjects());
?>

<!--
<div id="portfolio">
	<div>
		<a href="projectdetails.php">
			<img src="assets/images/huskypuppies.jpg" />
		</a>
		<div class="hoverImg">
			<h2>Husky Puppies Artwork</h2>
			<p>Blah blah</h2>
		</div>
	</div>

	<div>
		<a href="projectdetails.php">
			<img src="assets/images/huskypuppies.jpg" />
		</a>
		<div class="hoverImg">
			<h2>Puppies</h2>
			<p>Blah blah</h2>
		</div>
	</div>

	<div>
		<a href="projectdetails.php">
			<img src="assets/images/huskypuppies.jpg" />
		</a>
		<div class="hoverImg">
			<h2>Puppies</h2>
			<p>Blah blah</h2>
		</div>
	</div>

	<div>
		<a href="projectdetails.php">
			<img src="assets/images/huskypuppies.jpg" />
		</a>
		<div class="hoverImg">
			<h2>Puppies</h2>
			<p>Blah blah</h2>
		</div>
	</div>

</div>
-->

<!--
<div id="hoverImg">
	<ul>
		<li><h2>Husky Puppies Artwork</h2><p>blah blah</p></li>
		<li><h2>Husky Puppies Artwork</h2><p>blah blah</p></li>
		<li><h2>Husky Puppies Artwork</h2><p>blah blah</p></li>
		<li><h2>Husky Puppies Artwork</h2><p>blah blah</p></li>
		<li><h2>Husky Puppies Artwork</h2><p>blah blah</p></li>
		<li><h2>Husky Puppies Artwork</h2><p>blah blah</p></li>
	</ul>
</div> -->

<?php
require_once("includes/footer.php");
?>