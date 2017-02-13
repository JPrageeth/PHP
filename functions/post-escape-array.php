<?php
  /* Prageeth Sudarshana | Tokyo */
  
  //Posting data escape unvalueble string
	function postEscapeArray($p) {
	
		if (is_array($p)) {
	
			foreach ($p as $key => $value) {
				
				if (!is_array($p[$key])) {
					$p[$key]	= trim($p[$key]);
					//$p[$key]	= stripslashes($p[$key]);
					$p[$key] = preg_replace('/^[ 　]+/u', '', $p[$key]);
					$p[$key]	= preg_replace("/(\r\n|\n|\r)/", "\n", $p[$key]);
					
	
				} else {
					$p[$key]	= postEscapeArray($p[$key]);
				}
			}
		
		} else {
			
			$p	= trim($p);
			//$p	= stripslashes($p);
			$p	= preg_replace("/(\r\n|\n|\r)/", "\n", $p);
		}
		return $p;
	}	



?>
