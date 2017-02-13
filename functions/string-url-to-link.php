<?php
/* Prageeth Sudarshana | Tokyo */

/*
  string url to link
*/

function url_link_auto($string, $target = '', $rel = '' , $class = '') {

	$add .=(!empty($class) ? " class=\"{$class}\"" : '');     //class setting
	$add .=(!empty($target) ? " target=\"{$target}\"" : '');  	//target setting
	$add .=(!empty($rel) ? " rel=\"{$rel}\"" : '');  //rel setting
	
	//replace url to link		
	$text = preg_replace("/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/", '<a href="$1"'.$add.'>$1</a>', $string);
	
	//add www → http://www change 
	$text = preg_replace('/href="(?!https?:\/\/)([^"]+)"/', "href=\"http://\\1\"", $text);

	return $text;

}

?>
