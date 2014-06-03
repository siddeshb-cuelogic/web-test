<?php
Class Validator
{
 
  private $MIN_LENGTH=6;
  private $MAX_LENGTH=15;

 function containDigit($password)
 {
 	
 	/*
 	* 1 or more Digit
 	* 1 or more Special Characters
 	*/
 	if(preg_match('#[0-9]#', $password) && preg_match('#[\W]{1,}#', $password))
 		return true;
 	else
 	return false;
 }

 function isPasswordValid($password)
 {
  	  	
   if(strlen($password)>=$this->MIN_LENGTH && strlen($password)<=$this->MAX_LENGTH && $this->containDigit($password))
   	return true;
   return false;
 }

 function isEmailValid($email)
 {
 	$email_address = $email;
if (filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
  return true;
 } else {
	return false;
 }
 }



 function verifyEmail($toemail,$getdetails = false){
$email = $toemail;
list($user, $domain) = explode('@', $toemail);

$port = 25; // default smtp port

$sock = fsockopen($domain, $port);
if ($sock) {

fputs($sock, 'HELO mydomain.com');
$reply = fgets($sock); // not interesting

fputs($sock, 'MAIL FROM: user@mydomain.com');
$reply = fgets($sock); // not interesting

fputs($sock, 'RCPT TO: '.$email);
$reply = fgets($sock); // interesting

list($code, $msg) = explode(' ', $reply);

if ($code == '250') {
	echo "ff";exit;
  // you received 250 so the email address is accepted
} else {
	echo "hhh";exit;
 // something went wrong, the email will most likely bounce
}

fclose($sock);

}
}

 
}
?>