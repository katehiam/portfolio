<?php

class View{

	static public function renderProjects($aProjects){

		$sHTML = '';

		$sHTML .= '<div id="portfolio">';

		for($i=0;$i<count($aProjects);$i++){

			$oCurrentProject = $aProjects[$i];

			$sHTML .= '
					<a href="projectdetails.php?projectId='.$oCurrentProject->id.'">
						<img src="assets/images/huskypuppies.jpg" />
						<div class="hoverImg">
							<h2>'.$oCurrentProject->name.'</h2>
							<p>'.$oCurrentProject->desc.'</h2>
						</div>
					</a>
				';
			}

	

		$sHTML .= '</div>';

		return $sHTML;

	}

	static public function renderProjectDetails($oProject){

		$sHTML = '';

		$sHTML .= '<img src="assets/images/'.$oProject->image.'" id="detailsImg">
<div id="detailsContent">
	<h2>'.$oProject->name.'</h2>
	<p>'.$oProject->desc.'</p>
	<span class="icon">
		<a href="assets/images/'.$oProject->image.'">&#59157;</a>
		<a href="cart.php">&#10133;&#59197;</a>
	</span>
</div>';

		return $sHTML;

	}

}

?>