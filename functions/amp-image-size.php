<?php
	/* Prageeth Sudarshana | Tokyo */
  /*
		Amp image size setting
	*/
		
	function amp_img_size($image, $flag) {
		
		$var = parse_url($image);
		
		list($width,$height) = getimagesize($_SERVER['DOCUMENT_ROOT'].$var['path']);
		
		$width  = (!empty($width) ? $width : 500);
		$height = (!empty($height) ? $height : 320);
		
		if (empty($flag)) {
			return " width={$width} height={$height}";	
			
		} else {
			
			return array($width, $height);
			
		}
		
	}

?>
