<?php

class View{

	static public function renderProjects($aProjects){

		$sHTML = '';

		$sHTML .= '<div id="portfolio">';

		for($i=0;$i<count($aProjects);$i++){

			$oCurrentProject = $aProjects[$i];

			$sHTML .= '
					<a href="projectdetails.php?projectId='.$oCurrentProject->id.'">
						<img src="assets/images/'.$oCurrentProject->image.'" />
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
					<a href="assets/images/'.$oProject->image.'">&#59157;</a>';
		if($oProject->product){
			$sHTML .= '<a href="add.php?id='.$oProject->id.'">&#10133;&#59197;</a>';
		}

		$sHTML .= '</span>
			</div>';

		return $sHTML;

	}

	static public function renderCartOrderList($oCart){

		$sHTML = '';

		$iGrandTotal = 0;
		$iShipping = 3.49;

		if(count($oCart)->contents == 0){
			$sHTML .= '<div id="cart">
				<div class="cartProduct">Your cart is empty</div>';
			$iShipping = 0;
		}

		foreach($oCart->contents as $key=>$value){
			$oProduct = new Project();
			$oProduct->load($key);

			$sHTML .= '<div id="cart">
				<div class="cartProduct">
					<span class="productName">'.htmlentities($oProduct->name).'</span>
					<span class="productQty">'.$value.'</span>
					<span class="productRemove icon"><a href="remove.php?id='.$oProduct->id.'">&#9003;</a></span>
					<span class="productPrice">$'.number_format(($oProduct->price)*$value,2).'</span>
				</div>';

			$iGrandTotal += ($oProduct->price)*$value;

		}

		$sHTML .= '<div class="cartOtherRow">
				<span class="productName">Shipping</span>
				<span class="productPrice">$'.number_format($iShipping,2).'</span>
			</div>

			<div class="cartOtherRow">
				<span class="productName">Total</span>
				<span class="productPrice" id="total">$'.number_format(($iGrandTotal+$iShipping),2).'</span>
			</div>

		</div>';

		return $sHTML;

	}

	static public function renderCartAddress($oCustomer){

		$sHTML = '';

		$sHTML .= '<div id="postalAddress">
			<h2>Postal Address</h2>
			<p>'.$oCustomer->firstName.' '.$oCustomer->lastName.'<br />
			'.nl2br($oCustomer->address).'</p>
		</div>';

		return $sHTML;

	}

	static public function renderEditList($aProjects){

		$sHTML = '';

		$sHTML .= '<ul class="thumbnails">';

		for($i=0;$i<count($aProjects);$i++){
			$oCurrentProject = $aProjects[$i];
			$sHTML .= '<li><a href="admineditproject.php?id='.$oCurrentProject->id.'">
			<div><img class="thumbnails" src="assets/images/'.$oCurrentProject->image.'" /></div>
			'.$oCurrentProject->name.'</a></li>';
		}

		$sHTML .= '</ul>';

		return $sHTML;
	}

	static public function renderEditProject($oProject,$oForm){
		
		$sHTML = '';

		$sHTML .= '<h1>Edit '.$oProject->name.'</h1>';

		$sHTML .= $oForm->html;

		return $sHTML;
	}

}

?>