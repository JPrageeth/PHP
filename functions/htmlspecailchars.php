<?php
  /* Prageeth Sudarshana | Tokyo */
  
  //htmlspecialchars
	function htmlEntityArray($array, $style = 'ENT_QUOTES', $encode = 'UTF-8') {	// デフォルトはENT_QUOTES＆EUC-JP
	
		if (is_array($array)) {
	
			foreach ($array as $key => $value) {
				
				if (!is_array($array[$key])) {
					
					if ($style == 'ENT_COMPAT') {
						$array[$key]	= htmlspecialchars($array[$key], ENT_COMPAT, $encode);
					
					} else if ($style == 'ENT_QUOTES') {
						$array[$key]	= htmlspecialchars($array[$key], ENT_QUOTES, $encode);
						
					} else if ($style == 'ENT_NOQUOTES') {
						$array[$key]	= htmlspecialchars($array[$key], ENT_NOQUOTES, $encode);
					}
	
				} else {
					$array[$key]	= htmlEntityArray($array[$key], $style, $encode);
				}
			}
		
		} else {
			
			if ($style == 'ENT_COMPAT') {
				$array	= htmlspecialchars($array, ENT_COMPAT, $encode);
			
			} else if ($style == 'ENT_QUOTES') {
				$array	= htmlspecialchars($array, ENT_QUOTES, $encode);
				
			} else if ($style == 'ENT_NOQUOTES') {
				$array	= htmlspecialchars($array, ENT_NOQUOTES, $encode);
			}
		}
		return $array;
	}

?>
