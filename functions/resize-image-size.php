<?php

  /* Prageeth Sudarshana | Tokyo */

  /*
    Server images resize
  */
  
  function resize_img_size($updir, $max_width, $max_height, $newdir, $img, $quality = 90) {
  			
  	//$updir → uploaded directory
  	//$newdir → new directory
  
  	$resize_file	= $updir;
  	$image_info 	= @getimagesize($resize_file);
  	
  	$width 	= $image_info[0];
  	$height = $image_info[1];
  	
  	if ($height > $max_height) {
  		$width 	= ($max_height / $height) * $width;
  		$height = $max_height;
  	}
  
  	# wider
  	if ($width > $max_width) {
  		$height = ($max_width / $width) * $height;
  		$width 	= $max_width;
  	}					
  
  	switch ($image_info[2]) {
  
  		case 1:
  			$src_image  = imagecreatefromgif($resize_file);
  			break;
  
  		case 2:
  			$src_image  = imagecreatefromjpeg($resize_file);
  			break;
  
  		case 3:
  			$src_image  = imagecreatefrompng($resize_file);
  			break;
  			
  		case 4:
  			$src_image  = imagecreatefromgif($resize_file);
  			break;				
  	}
  
  
  	$dst_image		= @imagecreatetruecolor($width, $height);
  	
  	// preserve transparency
  	if($image_info[2] == 4 or $image_info[2] == 3){
  		imagecolortransparent($dst_image, imagecolorallocatealpha($dst_image, 0, 0, 0, 127));
  		imagealphablending($dst_image, false);
  		imagesavealpha($dst_image, true);
  	}		
  		
  	//	imagecopyresized($dst_image, $src_image, 0, 0, 0, 0, 
  	@imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, 
  					 $width, $height, $image_info[0], $image_info[1]);
  	
  	switch ($image_info[2]) {
  
  		case 1:
  			imagegif($dst_image, $newdir.$img, $quality);
  			break;
  
  		case 2:
  			imagejpeg($dst_image, $newdir.$img, $quality);
  			break;
  
  		case 3:
  			imagepng($dst_image, $newdir.$img, $quality);
  			break;
  			
  		case 4:
  			imagegif($dst_image, $newdir.$img, $quality);
  			break;	
  	}
  				
  }
  
  //Example
  resize_img_size('/home/user/dir/', 800, 600, '/home/user/newdir/', example.jpg);

?>
