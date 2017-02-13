<?php
  /* Prageeth Sudarshana | Tokyo */
  
  /*
	mail check
  */

function validate_email($email) {

$exp = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";

   if (preg_match($exp,$email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

	  if (checkdnsrr(array_pop(explode("@",$email)),"MX")){
		return true;

	  } else {
		return false;
	  }

   } else {

	  return false;

   }    
}




?>
