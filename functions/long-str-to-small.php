<?php
	/*
		Sub str setting
	*/
	
	function SUBTXT($txt, $size) {
		mb_internal_encoding("UTF-8");
		
		
		$txt = str_replace(array("\r\n", "\n", "\r"),'', $txt);
		
		$var['size'] = mb_strlen($txt);
		
		if ($var['size'] > $size) {
			return mb_substr($txt, 0, $size).'...';
			
		} else {
			return $txt;	
		}
	}	


?>
