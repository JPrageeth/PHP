<?php
  /* Prageeth Sudarshana | Tokyo */

  /*
		Images Setting
	*/
	
	function IMGRESIZE($image, $maxwidth, $maxheight) {
		
		list($width,$height) = getimagesize($image);
	
		if ($width > $maxwidth) {
		
			$newheight = $maxwidth/$width * $height;
		
			if($newheight > $maxheight){
				$maxwidth = ($maxheight * $maxwidth)/$newheight;
				$newheight = $maxheight;
			}
		
			return " width=\"{$maxwidth}\" height=\"{$newheight}\"";
		
		} else {
	
			return " width=\"{$maxwidth}\" height=\"{$newheight}\"";
	
		}		
					
	}

?>
