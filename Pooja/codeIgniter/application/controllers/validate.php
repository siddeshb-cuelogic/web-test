<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Validate {
	
	public function isNotEmpty($subject) {
		if(empty($subject) || $subject == null || $subject == '')
			return false;
		else return true;	
	}
	
	public function isNameValid($name) {
		$name_subject = $name;  
		$name_pattern = '/^[a-zA-Z ]*$/';  
		preg_match($name_pattern, $name_subject, $name_matches);  
		if(!$name_matches[0])  {
			return false;
		}
		else return true;
	}
	
	public function isUsernameValid($username) {
		$name_subject = $username;  
		$name_pattern = '/^[a-zA-Z0-9_.]*$/';  
		preg_match($name_pattern, $name_subject, $name_matches);  
		if(!$name_matches[0])  {
			return false;
		}
		else return true;
	}

}
?>
