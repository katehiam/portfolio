<?php

class Encrypt{
	static public function encode($string){
		$salt = hash('md5', hash('md4', $string));
		$newString = hash('md5', $string.$salt);
		return $newString;
	}
}

?>