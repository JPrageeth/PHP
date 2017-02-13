<?php
  /* Prageeth Sudarshana | Tokyo */

	/*
		Checking datesetting
	*/
	
	function CHECK_DATE($date) {
		
		if (!preg_match("/^\d{4}\/\d{2}\/\d{2}$/", $date)) {
			return false;
			
		} else {
			preg_match("/^(\d{4})\/(\d{2})\/(\d{2})$/",$date, $reg);
			
			if (checkdate($reg[2], $reg[3], $reg[1]) == false) {
				return false;
				
			} else {
				return true;
				
			}
			
		}
		
	}

?>
